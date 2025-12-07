<?php
include("database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al eliminar producto: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: index.php");
    exit;
}
?>
