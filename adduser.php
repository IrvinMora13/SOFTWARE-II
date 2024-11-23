

<?php
  require './includes/funciones.php';
  require './includes/config/database.php';

  $db = conectarDB();
  
  incluirTemplate('header');
  
  $username = '';
  $password = '';
  $nombre = '';


  $errores = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_VALIDATE_INT);
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $nombre = $_POST['nombre'];
    $rol = $_POST['rol_id'];


    if (!$username) {
      $errores[] = "Matricula incorrecta";
    }

    if (!$password) {
      $errores[] = "Contraseña incorrecta";
    }


    if (empty($errores)) {
      
      $query = "INSERT INTO usuarios (matricula, contra, nombre_completo, rol_id) VALUES ('$username', '$password_hash', '$nombre', '$rol')";
      $resultado = mysqli_query($db, $query);

    }
  }

  
?>

<body>
  <div class="container">
    <h2>Add User</h2>

    <?php foreach($errores as $error):?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form action="./adduser.php" method="POST">
      <fieldset>
        <legend>Add User</legend>
        <div class="form-group">
          <label for="username">Matricula:</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Matricula sin a" required>
        </div>
        <div class="form-group">
          <label for="nombre">nombre:</label>
          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
          <label for="rol_id">rol_id:</label>
          <input type="number" id="rol_id" name="rol_id" class="form-control" placeholder="rol_id" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn">
        </div>
      </fieldset>
    </form>
  </div>
  <?php
  incluirTemplate('footer');
  ?>
</body>

</html>