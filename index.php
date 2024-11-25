

<?php
  require './includes/funciones.php';
  require './includes/config/database.php';

  $db = conectarDB();
  
  incluirTemplate('header');
  
  $username = '';
  $password = '';
  


  $errores = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_VALIDATE_INT);
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if (!$username) {
      $errores[] = "Matricula incorrecta";
    }

    if (!$password) {
      $errores[] = "Contraseña incorrecta";
    }


    if (empty($errores)) {
      
      $query = "SELECT * FROM USUARIOS WHERE matricula = '$username'";
      $resultado = mysqli_query($db, $query);
      
      if ($resultado ->num_rows) {
        $usuario = mysqli_fetch_assoc($resultado);

        $auth = password_verify($password, $usuario['contra']);
        
        if ($auth) {
          session_start();
          
          $_SESSION["matricula"] = $usuario["matricula"];
          $_SESSION["nombre"] = $usuario["nombre_completo"];
          $_SESSION["rol"] = $usuario['rol_id'];
          $_SESSION["login"] = true;
          
          var_dump($_SESSION);
          if ($_SESSION["rol"] === "1") {
            header("Location: /alumno");
          }

          if ($_SESSION["rol"] === "2") {
            header("Location: /tutor");
          }

          if ($_SESSION["rol"] === "3") {
            header("Location: /admin");
          }

        } else {
          $errores[] = "El password es incorrecto";
        }
      } else {
        $errores[] = "El usuario no existe";
      }
    }
  }

  
?>

<body>
  <div class="container">
    <h2>Iniciar Sesión</h2>

    <?php foreach($errores as $error):?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form action="./index.php" method="POST">
      <fieldset>
        <legend>Iniciar sesión</legend>
        <div class="form-group">
          <label for="username">Matricula:</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Matricula sin a" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Iniciar Sesión" class="btn">
        </div>
      </fieldset>
    </form>
  </div>
  <?php
  incluirTemplate('footer');
  ?>
</body>

</html>