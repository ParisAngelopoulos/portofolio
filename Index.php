<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <main class="flex-1">
        <section class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-center">
                <div class="lg:w-1/2">
                    <h1 class="text-4xl font-bold mb-4 mt-8 lg:mt-0">Welkom bij Mijn Portfolio</h1>
                    <p class="text-xl mb-10">Hi mijn naam is Paris Angelopoulos ben een software developer gespecialiseerd in web development. Zit momenteel op het Technova in Ede en ben mijn best aan het doen om mijn diploma te halen.</p>
                    <p class="text-xl mb-10">Ontdek mijn projecten en neem contact op voor meer informatie.</p>
                    <a href="projecten.php" class="bg-gray-800 text-white border py-4 px-5 border-gray-800 rounded-md hover:bg-white hover:text-black mr-4">Bekijk mijn projecten</a>
                    <a href="contact.php" class="bg-white text-gray-800 border py-4 px-5 border-gray-800 rounded-md hover:bg-gray-800 hover:text-white">Neem contact op</a>
                </div>
                <div class="lg:w-1/2 mt-6 lg:mt-10">
                    <div class="shadow-lg rounded-full">
                        <img src="fotos/Paris-V2.png" alt="Welkom bij Mijn Portfolio">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white text-center py-3">
        <div class="container mx-auto">
            <p>&copy; <?= date("Y") ?> Mijn Portfolio. Alle rechten voorbehouden.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>