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
                <label for="username" class="block text-sm font-medium text-gray-700">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required class="mt-1 px-4 py-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord:</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="mt-1 px-4 py-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <button type="submit" name="login" class="w-full bg-gray-800 text-white rounded-lg px-4 py-2 hover:bg-gray-800">Inloggen</button>
        </form>
    </div>
</body>

</html>


<?php

// require_once('database.php');


// $username = 'testuser';
// $password = 'examplepassword';


// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':username', $username);
// $stmt->bindParam(':password', $hashedPassword);

// if ($stmt->execute()) {
//     echo "User successfully created with hashed password.";
// } else {
//     echo "Error creating user.";
// }
?>
