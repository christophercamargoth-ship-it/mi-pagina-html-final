<?php
// Archivo: procesar_compra.php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recibir los datos
    $id_producto = $_POST['id_producto'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $precio = (double)$_POST['precio']; // Aseguramos que sea un número
    $cantidad = 1;
    $total = $precio * $cantidad;

    // 2. Sentencia Preparada: Usar '?' para los valores
    $sql = "INSERT INTO compras (id_producto, nombre_cliente, email_cliente, cantidad, total)
            VALUES (?, ?, ?, ?, ?)";

    // 3. Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // 4. Vincular los parámetros: i=integer, s=string, d=double/float
        $stmt->bind_param("issid", $id_producto, $nombre_cliente, $email_cliente, $cantidad, $total);
        
        // 5. Ejecutar
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: confirmacion.html");
            exit;
        } else {
            echo "Error al registrar la compra: " . $stmt->error;
        }
    } else {
         echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
}
?>