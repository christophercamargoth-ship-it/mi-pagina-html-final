<?php
// Archivo: procesar_contacto.php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recibir los datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // 2. Sentencia Preparada: Usar '?' para los valores
    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES (?, ?, ?)";

    // 3. Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // 4. Vincular los parámetros: s=string
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        // 5. Ejecutar
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: confirmacion.html");
            exit;
        } else {
            echo "Error al enviar mensaje: " . $stmt->error;
        }
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
}
?>