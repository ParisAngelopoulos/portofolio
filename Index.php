<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <main class="flex-1">
        <section class="container mx-auto px-4 pt-24">
            <div class="flex flex-col lg:flex-row items-center">
                <!-- Tekstgedeelte -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h1 class="text-4xl font-bold mb-6">Welkom bij Mijn Portfolio</h1>
                    <p class="text-xl mb-6">Hi, mijn naam is Paris Angelopoulos. Ik ben een software developer gespecialiseerd in web development. Momenteel studeer ik aan het Technova College in Ede en werk ik hard aan mijn diploma.</p>
                    <p class="text-xl mb-8">Ontdek mijn projecten en neem contact op voor meer informatie.</p>
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start">
                        <a href="projecten.php" class="bg-gray-800 text-white py-4 px-6 border border-gray-800 rounded-md hover:bg-white hover:text-black mr-4 mb-2 sm:mb-0">Bekijk mijn projecten</a>
                        <a href="contact.php" class="bg-white text-gray-800 py-4 px-6 border border-gray-800 rounded-md hover:bg-gray-800 hover:text-white">Neem contact op</a>
                    </div>
                </div>
                <!-- Afbeelding -->
                <div class="lg:w-1/2 flex justify-center mt-8 lg:mt-0">
                    <div class="w-96 h-96 sm:w-96 sm:h-96 rounded-full shadow-lg overflow-hidden">
                        <img src="fotos/Paris-V2.png" alt="Welkom bij Mijn Portfolio" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>
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
