<?php
$conn = require_once('database.php');

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $project = getProjectById($conn, $projectId);

    function getProjectById($conn, $projectId) {
        $stmt = $conn->prepare("SELECT * FROM projecten WHERE id = :id");
        $stmt->execute(['id' => $projectId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bewerken'])) {

        editProject($conn, $projectId, $_POST['project_naam'], $_POST['beschrijving']);
    }

    function editProject($conn, $projectId, $projectNaam, $beschrijving) {
        $stmt = $conn->prepare("UPDATE projecten SET project_naam = :project_naam, beschrijving = :beschrijving WHERE id = :id");
        return $stmt->execute(['project_naam' => $projectNaam, 'beschrijving' => $beschrijving, 'id' => $projectId]);
    }
} else {
    header("Location: beheer.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Project Bewerken</h1>

        <form action="" method="post" class="space-y-4">
            <input type="text" name="project_naam" value="<?= htmlspecialchars($project['project_naam']) ?>" placeholder="Project Naam" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
            <textarea name="beschrijving" placeholder="Beschrijving" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500"><?= htmlspecialchars($project['beschrijving']) ?></textarea>
            <button type="submit" name="bewerken" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md shadow-sm hover:bg-blue-600 transition duration-300">Bewerken</button>
        </form>
    </div>
</body>

</html>
