<?php
// Initialize variables for user feedback
$success = $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'database.php'; // Ensure this points to your actual database connection file

    $taskName = trim($_POST['Task_title']);
    $taskDescription = trim($_POST['taskDescription']);
    $dueDate = trim($_POST['dueDate']);

    $sql = "INSERT INTO tasks (Task_title, Task_description, Task_deadline) VALUES (?, ?, ?)";

    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $taskName, $taskDescription, $dueDate);
        if($stmt->execute()) {
            $success = "Task added successfully. (y)";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Error!! preparing the statement: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <title>Ajouter une Task</title>
</head>
<body>
    <h1>Votre Application de Gestion des Tâches</h1>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="tasks.php">Liste des Tâches</a></li>
            <li><a href="add_task.php">Ajout de Tâche</a></li>
            <li><a href="task-detail.php">Détail de Tâche</a></li> 
        </ul>
    </nav>

    <main>
        <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
        <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

        <form action="add_task.php" method="POST">
            <label for="Task_title">Nom de la tâche:</label>
            <input type="text" id="Task_title" name="Task_title" required><br>

            <label for="taskDescription">Description de la tâche:</label>
            <textarea id="taskDescription" name="taskDescription" rows="4" required></textarea><br>

            <label for="dueDate">Date d'échéance:</label>
            <input type="date" id="dueDate" name="dueDate" required><br>

            <input type="submit" value="Ajouter la tâche">
        </form>
    </main>

    <footer>
        <!-- Footer -->
    </footer>
</body>
</html>