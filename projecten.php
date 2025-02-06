<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Projecten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white py-4 sticky top-0 z-10">
        <div class="container mx-auto flex items-center justify-between px-4">
            <a class="text-2xl font-bold" href="index.php">Paris Angelopoulos</a>
            <button id="menu-toggle" class="block lg:hidden focus:outline-none">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div id="menu" class="hidden lg:flex flex-col lg:flex-row absolute lg:relative top-full left-0 w-full lg:w-auto bg-gray-800 lg:bg-transparent p-4 lg:p-0 shadow-lg lg:shadow-none">
                <ul class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="projecten.php">Projecten</a></li>
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="cv.php">CV</a></li>
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8 flex-grow px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php
// Functie om de beschrijving te truncaten
function truncateText($text, $wordLimit = 14) {
    $words = explode(' ', $text);
    if (count($words) > $wordLimit) {
        $words = array_slice($words, 0, $wordLimit);
        return implode(' ', $words) . '...';
    }
    return $text;
}

// Je database query en project loop
$conn = require_once('database.php');
$stmt = $conn->query("SELECT * FROM projecten");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="card shadow-lg bg-white rounded-lg overflow-hidden cursor-pointer transform transition duration-300 hover:scale-105"
         data-project-name="<?= htmlspecialchars($row["project_naam"]) ?>"
         data-project-description="<?= htmlspecialchars($row["beschrijving"]) ?>">
        <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="w-full h-40 object-cover" alt="Project Afbeelding">
        <div class="p-4">
            <h3 class="text-lg font-bold mb-2 text-gray-900"><?= htmlspecialchars($row["project_naam"]) ?></h3>
            <p class="text-gray-700 text-sm md:text-base">
                <?= htmlspecialchars(truncateText($row["beschrijving"])) ?>
            </p>
        </div>
    </div>
<?php
}
?>

        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-3 mt-8">
        <div class="container mx-auto flex justify-center items-center px-4">
            <p class="text-sm md:text-base">&copy; <?= date("Y") ?> Mijn Portfolio. Alle rechten 
                <a href="projecten-beheren.php" class="hover:underline">voorbehouden.</a>
            </p>
        </div>
    </footer>
<!-- Modal (Pop-up) -->
<div id="project-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
<div class="bg-white p-6 rounded-lg w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 max-h-[80vh] overflow-y-auto">

        <h3 id="modal-project-name" class="text-xl font-bold text-gray-900 mb-4"></h3>
        <p id="modal-project-description" class="text-gray-700 mb-4"></p>
        <button id="close-modal" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Sluit</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', function () {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
            menu.classList.toggle('flex-col');
        });

// Modal logic
const modal = document.getElementById('project-modal');
const closeModalButton = document.getElementById('close-modal');

const cards = document.querySelectorAll('.card');

cards.forEach(card => {
    card.addEventListener('click', function () {
        const projectName = card.getAttribute('data-project-name');
        const projectDescription = card.getAttribute('data-project-description');

        // Update modal content
        document.getElementById('modal-project-name').textContent = projectName;
        // Gebruik nl2br om line breaks zichtbaar te maken
        document.getElementById('modal-project-description').innerHTML = projectDescription.replace(/\n/g, '<br>');
        
        // Show modal
        modal.classList.remove('hidden');
    });
});

// Close modal
closeModalButton.addEventListener('click', function () {
    modal.classList.add('hidden');
});


    });
</script>

</body>
</html>
