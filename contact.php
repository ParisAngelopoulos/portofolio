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
    <?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<div class="bg-green-500 text-white p-4 rounded mb-4">✅ Je bericht is succesvol verzonden!</div>';
    } elseif ($_GET['status'] == 'error') {
        echo '<div class="bg-red-500 text-white p-4 rounded mb-4">❌ Fout bij verzenden: ' . htmlspecialchars($_GET['message']) . '</div>';
    }
}
?>


    <main class="container mx-auto mt-8 flex-grow">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4">Schrijf je e-mail</h1>
            <form action="send_email.php" method="post">
                <div class="mb-4 relative">
                    <input type="text" id="naam" name="naam" class="peer w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400" placeholder=" " required>
                    <label for="naam" class="absolute left-4 top-3 text-gray-400 text-sm peer-placeholder-shown:top-6 peer-placeholder-shown:text-base transition-all">Naam</label>
                </div>
                <div class="mb-4 relative">
                    <input type="email" id="email" name="email" class="peer w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400" placeholder=" " required>
                    <label for="email" class="absolute left-4 top-3 text-gray-400 text-sm peer-placeholder-shown:top-6 peer-placeholder-shown:text-base transition-all">E-mailadres</label>
                </div>
                <div class="mb-4 relative">
                    <input type="text" id="onderwerp" name="onderwerp" class="peer w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400" placeholder=" " required>
                    <label for="onderwerp" class="absolute left-4 top-3 text-gray-400 text-sm peer-placeholder-shown:top-6 peer-placeholder-shown:text-base transition-all">Onderwerp</label>
                </div>
                <div class="mb-4 relative">
                    <textarea id="bericht" name="bericht" rows="6" class="peer w-full px-4 py-3 rounded-lg border-gray-300 focus:outline-none focus:border-gray-400" placeholder=" " required></textarea>
                    <label for="bericht" class="absolute left-4 top-3 text-gray-400 text-sm peer-placeholder-shown:top-6 peer-placeholder-shown:text-base transition-all">Typ hier je bericht...</label>
                </div>
                <button type="submit" class="w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-blue-500 transition duration-300">Verstuur e-mail</button>
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
