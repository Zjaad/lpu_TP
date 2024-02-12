
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Accueil</a></li>
                <li><a href="tasks.php">Liste des Tâches</a></li>
                <li><a href="add_task.php">Ajout de Tâche</a></li>
                <li><a href="task-detail.php">Détail de Tâche</a></li>
    </ul>

<div>
    <h2>select task</h2>
    <textarea id="task_select" name="task_select" ></textarea>

    <?php
        include 'config.php'; 

        $task_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Task ID not specified, please select a task or entre its ID number');

        $query = "SELECT * FROM tasks WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row) {
            echo "<h2>".$row["Task_title"]."</h2>";
            echo "<p>".$row["Task_description"]."</p>";
            echo "<p>Deadline: ".$row["Task_deadline"]."</p>";
        } else {
            echo "Task not found.";
        }
        $conn->close();
    ?>
 
 </div>
</body>

<footer></footer>
</html>