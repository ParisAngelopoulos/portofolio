<?php
require_once('database.php');

if (!isset($_GET['id'])) {
    die("Geen project geselecteerd.");
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM projecten WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    die("Project niet gevonden.");
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($project['project_naam']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS -->
</head>
<body class="bg-gray-900 text-white">

    <div class="container mx-auto px-6 py-24">
        <div class="max-w-3xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center mb-6"><?= htmlspecialchars($project['project_naam']) ?></h1>
            <img src="data:image/jpeg;base64,<?= base64_encode($project['image']) ?>" 
                 class="w-full max-w-xl mx-auto h-64 object-cover rounded-lg shadow-md mb-6" 
                 alt="Project afbeelding">
            <p class="text-gray-300 text-lg leading-relaxed text-center"><?= nl2br(htmlspecialchars($project['beschrijving'])) ?></p>
            <div class="flex justify-center mt-6">
                <a href="index.php" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-300 shadow-md">
                    Terug naar projecten
                </a>
            </div>
        </div>
    </div>

</body>
</html>
