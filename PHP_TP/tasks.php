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
                    <li class="navItem"><a href="index.php">Home</a></li>
                    <li class="navItem"><a href="tasks.php">Liste des Tâches</a></li>
                    <li class="navItem"><a href="add_task.php">Ajout de Tâche</a></li>
                    <li class="navItem"><a href="detail-tache.html">Détail de Tâche</a></li>
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
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['Task_title']) ?></td>
                            <td><?= htmlspecialchars($row['Task_description']) ?></td>
                            <td><?= htmlspecialchars($row['Task_deadline']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">There are no tasks in the database.</td>
                    </tr>
                <?php endif; ?>
                <?php $conn->close(); ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>