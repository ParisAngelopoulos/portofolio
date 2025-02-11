<?php
session_start();
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT id, username, password FROM users WHERE username = :username LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedHash = $row['password'];

        if (password_verify($password, $storedHash)) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: beheerpagina.php");
            exit;
        } else {
            $error = "Foutief wachtwoord. Probeer het opnieuw.";
        }
    } else {
        $error = "Gebruiker niet gevonden. Neem contact op met de beheerder.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - Projectbeheer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex flex-col min-h-screen items-center justify-center text-white">
    <div class="w-full max-w-md p-8 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Inloggen</h1>
        
        <?php if (isset($error)) : ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form id="loginForm" class="space-y-4" method="post" action="">
            <div>
                <label for="username" class="block text-sm font-medium">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required 
                       class="mt-1 w-full p-3 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Wachtwoord:</label>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                       class="mt-1 w-full p-3 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" name="login" 
                    class="w-full bg-blue-500 p-3 rounded-lg shadow hover:bg-blue-600 transition duration-300">
                Inloggen
            </button>
        </form>
    </div>
</body>
</html>
