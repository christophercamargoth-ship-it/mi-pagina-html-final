<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, categoria)
            VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al agregar producto: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Herramienta IA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Agregar nueva herramienta IA</h2>
    <form action="agregar.php" method="POST">
      <label>Nombre:</label>
      <input type="text" name="nombre" required>

      <label>Descripción:</label>
      <textarea name="descripcion" required></textarea>

      <label>Precio:</label>
      <input type="number" step="0.01" name="precio" required>

      <label>URL de Imagen:</label>
      <input type="text" name="imagen" placeholder="https://..." required>

      <label>Categoría:</label>
      <input type="text" name="categoria" required>

      <button type="submit" class="btn-agregar">Agregar herramienta</button>
    </form>
    <a href="index.php" class="btn-volver">⬅ Volver al catálogo</a>
  </div>
</body>
</html>
