<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Projecten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-gray-800 text-white py-4 sticky top-0">
        <div class="container mx-auto flex items-center justify-between">
            <a class="text-2xl font-bold" href="index.php">Paris Angelopoulos</a>
            <button class="block lg:hidden focus:outline-none">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="hidden lg:flex">
                <ul class="flex space-x-4">
                    <li class="nav-item">
                        <a class="nav-link" href="projecten.php">Projecten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8 flex-grow">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $conn = require_once('database.php');

            $stmt = $conn->query("SELECT * FROM projecten");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="card shadow-lg bg-white rounded-lg overflow-hidden cursor-pointer"
                     data-project-name="<?= htmlspecialchars($row["project_naam"]) ?>"
                     data-project-description="<?= htmlspecialchars($row["beschrijving"]) ?>">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="w-full h-40 object-cover" alt="Project Afbeelding">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($row["project_naam"]) ?></h3>
                        <p class="text-gray-700"><?= htmlspecialchars($row["beschrijving"]) ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <div class="modal fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <div class="modal-content bg-white w-11/12 md:max-w-md rounded-lg overflow-hidden shadow-lg">
            <button class="modal-close absolute top-0 right-0 p-4 text-gray-700 hover:text-gray-900 focus:outline-none">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
            <div class="modal-body p-4">
                <h2 class="text-2xl font-bold mb-3" id="modalProjectName"></h2>
                <p class="text-gray-700" id="modalProjectDescription"></p>
            </div>
        </div>
    </div>

<footer class="bg-gray-800 text-white text-center py-3">
    <div class="container mx-auto flex justify-center items-center">
        <p>&copy; <?= date("Y") ?> Mijn Portfolio. Alle rechten 
            <a href="projecten-beheren.php" class="hover:underline">voorbehouden.</a>
        </p>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            const modal = document.querySelector('.modal');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    const projectName = card.getAttribute('data-project-name');
                    const projectDescription = card.getAttribute('data-project-description');

                    const modalProjectName = document.getElementById('modalProjectName');
                    const modalProjectDescription = document.getElementById('modalProjectDescription');

                    modalProjectName.innerText = projectName;
                    modalProjectDescription.innerText = projectDescription;

                    modal.classList.remove('hidden');
                });
            });

            const modalClose = document.querySelector('.modal-close');
            modalClose.addEventListener('click', function () {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
