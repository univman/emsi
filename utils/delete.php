<?php
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost", "root", "", "db_emsi");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM contractors WHERE ID = $id"; 

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: ../index.php?page=contractors');
        exit;
    } else {
        echo "Error deleting record";
    }
?>