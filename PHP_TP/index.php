<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <title>Gestion des Tâches</title>
</head>
<body>
    <header>
        <h1>Votre Application de Gestion des Tâches</h1>
        <p>Organisez votre travail plus efficacement avec notre application.</p>
        <nav class="navbar">
            <ul>
                <li class="navItem"><a href="index.php">Accueil</a></li>
                <li class="navItem"><a href="tasks.php">Liste des Tâches</a></li>
                <li class="navItem"><a href="add_task.php">Ajouter une Tâche</a></li>
                <li class="navItem"><a href="more_detail.html">Plus de Détails</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Toutes les Tâches</h2>
        <div>
                <?php
                include 'config.php';
                $query = "SELECT * FROM tasks";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>ID</th><th>Titre</th><th>Échéance</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["ID"]."</td><td>".$row["Task_title"]."</td><td>".$row["Task_deadline"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Aucun résultat";
                }
                $conn->close();
                ?>
        </div>
    </section>
    <footer>
        <p> Droit d'auteur ... </p>
    </footer>
</body>
</html>
