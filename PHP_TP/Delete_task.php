<?php
include 'database.php';

if(isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM tasks WHERE ID = ?";

    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $task_id);

        if($stmt->execute()) {
            header("Location: tasks.php");
            echo "deleted successfully";
            exit();
            
        } else {
            echo "Error executing delete statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
} else {
    echo "Error: Task ID not specified.";
}

$conn->close();
?>
