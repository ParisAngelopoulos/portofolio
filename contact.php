<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white py-4 sticky top-0 z-10">
        <div class="container mx-auto flex items-center justify-between px-4">
            <a class="text-2xl font-bold" href="#home">Paris Angelopoulos</a>
            <button id="menu-toggle" class="block lg:hidden focus:outline-none">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div id="menu" class="hidden lg:flex flex-col lg:flex-row absolute lg:relative top-full left-0 w-full lg:w-auto bg-gray-800 lg:bg-transparent p-4 lg:p-0 shadow-lg lg:shadow-none">
                <ul class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="#projecten">Projecten</a></li>
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="#cv">CV</a></li>
                    <li><a class="block text-white py-2 px-4 hover:bg-gray-700 rounded" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Sectie -->
    <section id="contact" class="container mx-auto mt-8 flex-grow px-4">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold mb-6">Neem contact op</h1>
            <div class="flex justify-center space-x-6">
                <a href="mailto:paris@example.com" class="text-gray-800 hover:text-blue-500 transition duration-300">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0l-4-4m4 4l-4 4M4 12a8 8 0 1016 0 8 8 0 10-16 0z" />
                    </svg>
                    <p>Email</p>
                </a>
                <a href="https://github.com/parisangelopoulos" target="_blank" class="text-gray-800 hover:text-gray-600 transition duration-300">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.113.793-.26.793-.577v-2.157c-3.338.725-4.042-1.61-4.042-1.61-.546-1.387-1.334-1.756-1.334-1.756-1.09-.745.083-.73.083-.73 1.204.085 1.839 1.236 1.839 1.236 1.07 1.835 2.807 1.305 3.492.998.108-.775.42-1.305.762-1.604-2.665-.302-5.466-1.332-5.466-5.93 0-1.31.467-2.38 1.236-3.22-.124-.303-.535-1.524.117-3.176 0 0 1.008-.323 3.301 1.23a11.47 11.47 0 013.003-.404c1.018.005 2.042.137 3.003.404 2.293-1.553 3.299-1.23 3.299-1.23.653 1.652.242 2.873.118 3.176.77.84 1.235 1.91 1.235 3.22 0 4.61-2.805 5.625-5.475 5.92.43.372.814 1.102.814 2.222v3.293c0 .319.192.694.8.577C20.565 21.796 24 17.299 24 12 24 5.373 18.627 0 12 0z" clip-rule="evenodd"/>
                    </svg>
                    <p>GitHub</p>
                </a>
                <a href="https://linkedin.com/in/parisangelopoulos" target="_blank" class="text-gray-800 hover:text-blue-700 transition duration-300">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452H16.89v-5.569c0-1.327-.027-3.036-1.852-3.036-1.854 0-2.141 1.445-2.141 2.941v5.664H9.338V9h3.396v1.561h.05c.472-.892 1.623-1.832 3.34-1.832 3.57 0 4.237 2.349 4.237 5.402v6.321zM5.337 7.433c-1.088 0-1.969-.882-1.969-1.969s.881-1.968 1.969-1.968c1.088 0 1.969.881 1.969 1.968 0 1.087-.881 1.969-1.969 1.969zM6.89 20.452H3.783V9h3.107v11.452zM22.225 0H1.771C.792 0 0 .775 0 1.728v20.543C0 23.225.792 24 1.771 24h20.453C23.208 24 24 23.225 24 22.271V1.728C24 .775 23.208 0 22.225 0z"/>
                    </svg>
                    <p>LinkedIn</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <div class="container mx-auto">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Mijn Portfolio. Alle rechten voorbehouden.</p>
        </div>
    </footer>
</body>
</html>
