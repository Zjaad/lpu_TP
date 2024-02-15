<?php
include 'database.php'; 

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <title>Tasks</title>
</head>
<body>
<header>
    <h1>Gestion des Tâches</h1>
    <nav class="navbar">
        <ul>
            <li ><a href="index.php">Home</a></li>
            <li ><a href="tasks.php">Liste des Tâches</a></li>
            <li ><a href="add_task.php">Ajout de Tâche</a></li>
            <li ><a href="task-detail.php">Détail de Tâche</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Liste des Tâches</h2>

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Date d'échéance</th>
            <th>Action</th> 
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Task_title']) ?></td>
                    <td><?= htmlspecialchars($row['Task_description']) ?></td>
                    <td><?= htmlspecialchars($row['Task_deadline']) ?></td>
                    <td>
                        <form action="delete_task.php" method="POST">
                            <input type="hidden" name="task_id" value="<?= $row['ID'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">There are no tasks in the database.</td>
            </tr>
        <?php endif; ?>
        <?php $conn->close(); ?>
        </tbody>
    </table>
</main>

</body>
</html>
