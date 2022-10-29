<?php
    include('../utils/conn.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM contractors WHERE ID = $id"; 

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: ../index.php?page=contractor_form');
        exit;
    } else {
        echo "Error deleting record";
    }
?>