<?php
// ARCHIVO: guardar.php - CORREGIDO Y SEGURO (CON SENTENCIAS PREPARADAS)
require_once("database.php"); 

$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$precio = $_POST['precio'] ?? 0.00;
$ruta = '';

// Lógica para subir la imagen (Debe coincidir con agregar.php)
if (isset($_FILES['imagen']) && $_FILES['imagen']['name']) {
    $imagen = $_FILES['imagen']['name'];
    $ruta = "imagenes/" . basename($imagen);
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
        die("Error al subir la imagen. Verifica la carpeta 'imagenes'.");
    }
}

// Sentencia Preparada para INSERT (SEGURIDAD CRÍTICA)
$sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Vincula los parámetros: s=string, d=double/float
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $ruta);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: index.php#admin-catalogo");
        exit();
    } else {
        echo "Error al guardar el producto: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}
?>