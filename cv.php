<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over Mij - CV</title>
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

    <!-- Hoofdinhoud -->
    <main class="container mx-auto mt-8 flex-grow px-4">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Over Mij</h1>
            
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Wat Ik Doe</h2>
                <p class="text-xl">Hallo! Mijn naam is Paris Angelopoulos en ik ben een software developer met een passie voor web development. Momenteel studeer ik aan het Technova College in Ede en werk ik hard aan het behalen van mijn diploma. Ik ben altijd bezig met het verbeteren van mijn vaardigheden en zoek voortdurend naar nieuwe uitdagingen.</p>
            </section>
            
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Mijn Kennis en Vaardigheden</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-medium">Frontend Development</h3>
                        <ul class="list-disc pl-5">
                            <li>HTML, CSS, JavaScript</li>
                            <li>TailwindCSS</li>
                            <li>Responsive Design</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium">Backend Development</h3>
                        <ul class="list-disc pl-5">
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>API Integraties</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium">Versiebeheer en Tools</h3>
                        <ul class="list-disc pl-5">
                            <li>Git & GitHub</li>
                            <li>VSCode</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium">Soft Skills</h3>
                        <ul class="list-disc pl-5">
                            <li>Teamwerk</li>
                            <li>Probleemoplossend denken</li>
                            <li>Communicatie</li>
                            <li>Zelfdiscipline</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-4">Huidige Projecten</h2>
                <p class="text-xl">Momenteel werk ik aan verschillende projecten waarbij ik mijn vaardigheden in zowel frontend als backend development toepas. Deze projecten helpen me om mijn kennis te verdiepen en uit te breiden, en ik ben altijd op zoek naar nieuwe mogelijkheden om mijn portfolio uit te breiden.</p>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <div class="container mx-auto">
            <p>&copy; <?= date("Y") ?> Mijn Portfolio. Alle rechten voorbehouden.</p>
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
        });
    </script>
</body>

</html>
