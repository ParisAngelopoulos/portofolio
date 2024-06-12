<?php
session_start();

require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $password = isset($_POST['password']) ? $_POST['password'] : ''; // Ongemacht wachtwoord

    $sql = "SELECT id, username, password FROM users LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedHash = $row['password']; // Gehashte wachtwoord opgehaald uit de database

        if (password_verify($password, $storedHash)) {
            $_SESSION['user_id'] = $row['id']; // Sla de gebruikers-ID op in de sessie
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
    <title>Projecten Beheren</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Projecten Beheren</h1>
        <form id="loginForm" class="space-y-4" method="post" action="">
            <?php if (isset($error)) : ?>
                <div class="text-red-500"><?= $error ?></div>
            <?php endif; ?>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord:</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="mt-1 px-4 py-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <button type="submit" name="login" class="w-full bg-gray-800 text-white rounded-lg px-4 py-2 hover:bg-gray-800">Inloggen</button>
        </form>
    </div>
</body>

</html>
