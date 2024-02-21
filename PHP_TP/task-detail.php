
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
    <form action="task-detail.php" method="GET">
        <input type="text" name="search" placeholder="recherc tasks...">
        <button type="submit">Search</button>
    </form>
</div>

<div>
    <h1>Task Details</h1>
        <?php if(isset($task)): ?>
        <h2><?php echo $task['Task_title']; ?></h2>
        <p>Description: <?php echo $task['Task_description']; ?></p>
        <p>Deadline: <?php echo $task['Task_deadline']; ?></p>
        <?php else: ?>
        <p>No task found.</p>
        <?php endif; ?>
    <?php
        include 'database.php';
        if(isset($_GET['id'])) {
           
            $task_id = $_GET['id'];
            $query = "SELECT * FROM tasks WHERE ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $task_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $task = $result->fetch_assoc();
        }
        ?>
   
    
</div>
</body>

<footer></footer>
</html>