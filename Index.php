<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-900 text-gray-300">
       <!-- Navbar -->
       <nav class="bg-gray-800 text-white py-4 fixed w-full z-10 shadow-md">
        <div class="container mx-auto flex items-center justify-between px-6">
            <a class="text-2xl font-bold hover:text-gray-400" href="#home">Paris Angelopoulos</a>
            <div class="hidden md:flex space-x-6">
                <a class="hover:text-gray-400" href="#projecten">Projecten</a>
                <a class="hover:text-gray-400" href="#cv">CV</a>
                <a class="hover:text-gray-400" href="#contact">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Home Sectie -->
    <section id="home" class="container mx-auto px-6 pt-32 text-center">
        <h1 class="text-5xl font-bold text-white mb-4">Welkom bij Mijn Portfolio</h1>
        <p class="text-xl text-gray-400">Ik ben Paris Angelopoulos, een software developer gespecialiseerd in web development.</p>
        <div class="mt-6">
            <img src="fotos/Paris-V2.png" alt="Paris Angelopoulos" class="w-48 h-48 rounded-full mx-auto shadow-lg">
        </div>
    </section>  

    <!-- Projecten Sectie -->
    <section id="projecten" class="container mx-auto px-6 py-24">
        <h2 class="text-4xl font-bold text-center text-white mb-8">Mijn Projecten</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            function truncateText($text, $wordLimit = 14) {
                $words = explode(' ', $text);
                if (count($words) > $wordLimit) {
                    $words = array_slice($words, 0, $wordLimit);
                    return implode(' ', $words) . '...';
                }
                return $text;
            }
            $conn = require_once('database.php');
            $stmt = $conn->query("SELECT * FROM projecten");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                 <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 cursor-pointer"
                    data-project-name="<?= htmlspecialchars($row["project_naam"]) ?>"
                    data-project-description="<?= htmlspecialchars($row["beschrijving"]) ?>">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="w-full h-40 object-cover rounded-lg" alt="Project afbeelding">
                    <div class="p-4">
                    <h3 class="text-xl font-semibold text-white mt-4"> <?= htmlspecialchars($row['project_naam']) ?> </h3>
                    <p class="text-gray-400 text-sm mt-2"> <?= htmlspecialchars(truncateText($row['beschrijving'])) ?> </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Modal (Pop-up) -->
    <div id="project-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 max-h-[80vh] overflow-y-auto">
            <h3 id="modal-project-name" class="text-xl font-bold text-gray-900 mb-4"></h3>
            <p id="modal-project-description" class="text-gray-700 mb-4"></p>
            <button id="close-modal" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Sluit</button>
        </div>
    </div>
    <main class="container mx-auto mt-12 flex-grow px-6">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Over Mij</h1>
        
        <section id="cv" class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-l-4 border-blue-500 pl-3">Wat Ik Doe</h2>
            <p class="text-lg text-gray-600 leading-relaxed">Hallo! Mijn naam is Paris Angelopoulos en ik ben een software developer met een passie voor web development. Momenteel studeer ik aan het Technova College in Ede en werk ik hard aan het behalen van mijn diploma. Ik ben altijd bezig met het verbeteren van mijn vaardigheden en zoek voortdurend naar nieuwe uitdagingen.</p>
        </section>
        
        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-l-4 border-blue-500 pl-3">Mijn Kennis en Vaardigheden</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Frontend Development</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li>HTML, CSS, JavaScript</li>
                        <li>TailwindCSS</li>
                        <li>Responsive Design</li>
                    </ul>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Backend Development</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>API Integraties</li>
                    </ul>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Versiebeheer en Tools</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li>Git & GitHub</li>
                        <li>VSCode</li>
                    </ul>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Soft Skills</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li>Teamwerk</li>
                        <li>Probleemoplossend denken</li>
                        <li>Communicatie</li>
                        <li>Zelfdiscipline</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-l-4 border-blue-500 pl-3">Huidige Projecten</h2>
            <p class="text-lg text-gray-600 leading-relaxed">Momenteel werk ik aan verschillende projecten waarbij ik mijn vaardigheden in zowel frontend als backend development toepas. Deze projecten helpen me om mijn kennis te verdiepen en uit te breiden, en ik ben altijd op zoek naar nieuwe mogelijkheden om mijn portfolio uit te breiden.</p>
        </section>
    </div>
</main>

<!-- Contact -->
<section id="contact" class="container mx-auto px-6 py-16 text-center  rounded-lg shadow-xl mt-12">
    <h2 class="text-4xl font-bold text-white mb-6">Neem contact op</h2>
    <p class="text-lg text-gray-200 mb-6">Heb je een vraag of wil je samenwerken? Neem gerust contact op!</p>
    <div class="flex justify-center space-x-6">
        <a href="mailto:parisangelopoulos@gmail.com" class="text-white bg-gray-800 px-4 py-2 rounded-lg hover:bg-gray-700 transition">Email</a>
        <a href="https://github.com/parisangelopoulos" target="_blank" class="text-white bg-gray-800 px-4 py-2 rounded-lg hover:bg-gray-700 transition">GitHub</a>
        <a href="https://linkedin.com/in/parisangelopoulos" target="_blank" class="text-white bg-gray-800 px-4 py-2 rounded-lg hover:bg-gray-700 transition">LinkedIn</a>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <div class="container mx-auto">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Mijn Portfolio. Alle rechten voorbehouden.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');
            menuToggle.addEventListener('click', function () {
                menu.classList.toggle('hidden');
                menu.classList.toggle('flex');
                menu.classList.toggle('flex-col');
            });

            const modal = document.getElementById('project-modal');
            const closeModalButton = document.getElementById('close-modal');
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    const projectName = card.getAttribute('data-project-name');
                    const projectDescription = card.getAttribute('data-project-description');
                    document.getElementById('modal-project-name').textContent = projectName;
                    document.getElementById('modal-project-description').innerHTML = projectDescription.replace(/\n/g, '<br>');
                    modal.classList.remove('hidden');
                });
            });

            closeModalButton.addEventListener('click', function () {
                modal.classList.add('hidden');
            });
        });
    </script>
</body>

</html>