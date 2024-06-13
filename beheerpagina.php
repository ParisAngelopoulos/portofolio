<?php
session_start();
require_once('database.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: projecten-beheren.php");
    exit;
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

function getProjects($conn) {
    $stmt = $conn->query("SELECT * FROM projecten");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addProject($conn, $projectNaam, $beschrijving, $image) {
    $stmt = $conn->prepare("INSERT INTO projecten (project_naam, beschrijving, image) VALUES (:project_naam, :beschrijving, :image)");
    return $stmt->execute(['project_naam' => $projectNaam, 'beschrijving' => $beschrijving, 'image' => $image]);
}

function editProject($conn, $projectId, $projectNaam, $beschrijving) {
    $stmt = $conn->prepare("UPDATE projecten SET project_naam = :project_naam, beschrijving = :beschrijving WHERE id = :id");
    return $stmt->execute(['project_naam' => $projectNaam, 'beschrijving' => $beschrijving, 'id' => $projectId]);
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
    <title>Projecten Beheren</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Beheerpagina - Projecten</h1>
            <form method="post">
                <a href="Index.php" class="bg-black text-white py-2 px-4 rounded-md shadow-sm hover:bg-black transition duration-300">Home</a>
                <button type="submit" name="logout" class="bg-red-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-600 transition duration-300">Uitloggen</button>
            </form>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold mb-2 text-gray-800">Nieuw project toevoegen</h2>
            <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
                <input type="text" name="project_naam" placeholder="Project Naam" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                <textarea name="beschrijving" placeholder="Beschrijving" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500"></textarea>
                <input type="file" name="image" accept="image/*" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                <button type="submit" name="toevoegen" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md shadow-sm hover:bg-blue-600 transition duration-300">Toevoegen</button>
            </form>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-4 text-gray-800">Bestaande projecten</h2>
            <ul class="space-y-4">
                <?php foreach (getProjects($conn) as $project) : ?>
                    <li class="p-4 bg-white rounded-md shadow-md">
                        <h3 class="text-lg font-bold text-gray-800"><?= htmlspecialchars($project['project_naam']) ?></h3>
                        <p class="text-gray-700"><?= htmlspecialchars($project['beschrijving']) ?></p>
                        <div class="mt-2">
                            <a href="bewerken.php?id=<?= $project['id'] ?>" class="text-blue-500 hover:text-blue-700 transition duration-300">Bewerken</a>
                            <a href="?verwijderen&id=<?= $project['id'] ?>" class="text-red-500 hover:text-red-700 ml-4 transition duration-300">Verwijderen</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>
