<?php
session_start();
require_once('database.php');

// Check of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header("Location: projecten-beheren.php");
    exit;
}

// Uitloggen
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Functies
function getProjects($conn) {
    $stmt = $conn->query("SELECT * FROM projecten");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addProject($conn, $projectNaam, $beschrijving, $image) {
    $stmt = $conn->prepare("INSERT INTO projecten (project_naam, beschrijving, image) VALUES (:project_naam, :beschrijving, :image)");
    return $stmt->execute(['project_naam' => $projectNaam, 'beschrijving' => $beschrijving, 'image' => $image]);
}

function deleteProject($conn, $projectId) {
    $stmt = $conn->prepare("DELETE FROM projecten WHERE id = :id");
    return $stmt->execute(['id' => $projectId]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toevoegen'])) {
    $projectNaam = $_POST['project_naam'];
    $beschrijving = $_POST['beschrijving'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    addProject($conn, $projectNaam, $beschrijving, $image);
}

if (isset($_GET['verwijderen']) && isset($_GET['id'])) {
    deleteProject($conn, $_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheerpagina - Projecten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Beheerpagina - Projecten</h1>
            <form method="post">
                <a href="index.php" class="bg-gray-700 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition duration-300">Home</a>
                <button type="submit" name="logout" class="bg-red-500 px-4 py-2 rounded-lg shadow hover:bg-red-600 transition duration-300">Uitloggen</button>
            </form>
        </div>

        <!-- Project toevoegen -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-bold mb-4">Nieuw project toevoegen</h2>
            <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
                <input type="text" name="project_naam" placeholder="Project Naam" required class="w-full p-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <textarea name="beschrijving" placeholder="Beschrijving" required class="w-full p-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <input type="file" name="image" accept="image/*" required class="w-full bg-gray-700 text-white p-3 rounded-lg cursor-pointer">
                <button type="submit" name="toevoegen" class="w-full bg-blue-500 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-300">Toevoegen</button>
            </form>
        </div>

        <!-- Lijst met projecten -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Bestaande projecten</h2>
            <ul class="space-y-4">
                <?php foreach (getProjects($conn) as $project) : ?>
                    <li class="p-4 bg-gray-700 rounded-lg shadow-lg flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold"><?= htmlspecialchars($project['project_naam']) ?></h3>
                        </div>
                        <div class="flex space-x-4">
                            <a href="bewerken.php?id=<?= $project['id'] ?>" class="bg-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-300">Bewerken</a>
                            <a href="?verwijderen&id=<?= $project['id'] ?>" class="bg-red-500 px-4 py-2 rounded-lg shadow hover:bg-red-600 transition duration-300">Verwijderen</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
