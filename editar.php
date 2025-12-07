<?php
include("database.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', categoria='$categoria' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$sql = "SELECT * FROM productos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Herramienta IA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Editar herramienta IA</h2>
    <form action="editar.php?id=<?php echo $id; ?>" method="POST">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

      <label>Descripción:</label>
      <textarea name="descripcion" required><?php echo htmlspecialchars($row['descripcion']); ?></textarea>

      <label>Precio:</label>
      <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>" required>

      <label>URL de Imagen:</label>
      <input type="text" name="imagen" value="<?php echo htmlspecialchars($row['imagen']); ?>" required>

      <label>Categoría:</label>
      <input type="text" name="categoria" value="<?php echo htmlspecialchars($row['categoria']); ?>" required>

      <button type="submit" class="btn-editar">Guardar cambios</button>
    </form>
    <a href="index.php" class="btn-volver">⬅ Volver al catálogo</a>
  </div>
</body>
</html>
