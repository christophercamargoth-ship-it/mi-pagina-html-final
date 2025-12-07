<?php
// Archivo: procesar_alumnos.php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recibir los datos (ya no se sanean aquí)
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    // 2. Sentencia Preparada: Usar '?' para los valores
    $sql = "INSERT INTO alumnos (nombre, apellido, email, carrera, semestre) 
            VALUES (?, ?, ?, ?, ?)";

    // 3. Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // 4. Vincular los parámetros: 's' para string (cadena de texto)
        // La conexión asegura que los datos sean tratados como texto
        $stmt->bind_param("sssss", $nombre, $apellido, $email, $carrera, $semestre);

        // 5. Ejecutar
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: confirmacion.html"); // Redirige al mensaje de éxito
            exit;
        } else {
            echo "Error al registrar al alumno: " . $stmt->error;
        }
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    // Si acceden directamente, los devolvemos al índice
    header("Location: index.php");
    exit;
}
?>