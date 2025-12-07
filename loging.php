<?php
include("database.php");  // Conexión a la base de datos
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']); // En tu SQL las contraseñas están en MD5

    // Consulta para verificar usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Guardar datos en la sesión
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['rol'] = $user['rol'];

        // Si es admin → redirige al panel de compras
        if ($user['rol'] == 'admin') {
            header("Location: ver_compras_admin.php");
        } else {
            header("Location: index.php"); // Si más adelante tienes usuarios normales
        }
        exit;
    } else {
        $error = "⚠️ Usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión - Administrador</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      text-align: left;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="password"] {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn-login {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .btn-login:hover {
      background-color: #0056b3;
    }

    .error {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
    }

    a {
      color: #007bff;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Iniciar Sesión</h2>

  <?php
  if (isset($error)) {
      echo "<p class='error'>$error</p>";
  }
  ?>

  <form action="login.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="btn-login">Entrar</button>
  </form>

  <a href="index.php">⬅ Volver al catálogo</a>
</div>

</body>
</html>
