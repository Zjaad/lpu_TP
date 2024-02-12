
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style1.css">

    
    <title>gestion des taches</title>
</head>
<body>
    <header>
        <h1>Votre Application de Gestion des Tâches</h1>
        <p>Organisez votre travail plus efficacement avec notre application</p>
        <nav class="navbar">
            <ul>
                <li class="navItem"><a href="index.php">Accueil</a></li>
                <li class="navItem"><a href="tasks.php">Liste des Tâches</a></li>
                <li class="navItem"><a href="add_task.php">Ajout de Tâche</a></li>
                <li class="navItem"><a href="more_detail.html">Détail de Tâche</a></li>
            </ul>
        </nav>
      <!--  <h4>
            article1
        </h4>
        <p>
            articles text
        </p>-->
    </header>
    <section>
        <H2> All tasks <h2> 
        <div>
                <?php
                include 'config.php'; 
                $query = "SELECT * FROM tasks";
                $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>ID</th><th>Title</th><th>Deadline</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["ID"]."</td><td>".$row["Task_title"]."</td><td>".$row["Task_deadline"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
        </div>
    </section>
    


    <footer>
        <p> copyright ...  </p>
    </footer>
</body>
</html>