<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for task</title>
</head>
<body>
    

<?php
if ($_SERVER("REQUEST_METHOD") == "post") {
    include 'config.php';
    $taskId = $_POST('taskId');

   Try {
    $conn =new PDO("mysql:host=$host; database=$dbname" $DB_USER, $DB_PASSWORD");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPT,PDO::ERRMODE_EXCEPTION);
        $stm= $conn->prepare("SELECT * FROM tasks WHERE id = :taskId);
        $stm->bindParam(':taskId',$taskId , PDO::PARAM_INT);
        $stm->execute();
   }

?>
</body>
</html>