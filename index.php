<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST-UACH</title>
    <link rel="stylesheet" href="./build/css/app.css">
</head>

<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "24282213Mys.";
$dbname = "st-uach";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["username"];
  $password = $_POST["password"];

  // Consultar base de datos para verificar credenciales
  $sql = "SELECT * FROM usuarios WHERE id = '$id' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Autenticación exitosa, mostrar mensaje de sesión exitosa
    $mensaje = "¡Sesión iniciada con éxito!";
    $tipo_mensaje = "success";
    
    exit;
  } else {
    // Autenticación fallida, mostrar mensaje de sesión errónea
    $mensaje = "Nombre de usuario o contraseña incorrectos";
    $tipo_mensaje = "error";
  }
}

// Cerrar conexión a la base de datos
$conn->close();
?>

<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($mensaje)) { ?>
      <div class="alert <?php echo $tipo_mensaje; ?>">
        <?php echo $mensaje; ?>
      </div>
    <?php } ?>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Iniciar Sesión" class="btn">
      </div>
    </form>
  </body>

</html>