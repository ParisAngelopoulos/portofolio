<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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

    <main class="container mx-auto mt-8 flex-grow">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4">Neem contact op</h1>
            <form action="send_email.php" method="post">
                <div class="mb-4">
                    <input type="text" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400"
                        id="naam" name="naam" placeholder="Naam" required>
                </div>
                <div class="mb-4">
                    <input type="email" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400"
                        id="email" name="email" placeholder="E-mailadres" required>
                </div>
                <div class="mb-4">
                    <input type="text" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400"
                        id="onderwerp" name="onderwerp" placeholder="Onderwerp" required>
                </div>
                <div class="mb-4">
                    <textarea class="w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400"
                        id="bericht" name="bericht" rows="6" placeholder="Typ hier je bericht..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-gray-700 transition duration-300">Verstuur</button>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-3">
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
