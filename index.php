

<?php

  require './db/config/db.php';
  require './scripts/funciones.php'; 
  incluirComponent('head');

  $servername = "localhost";
  $username = "root";
  $password = "24282213Mys.";
  $dbname = "st-uach";

  $conn = conectDB($servername, $username, $password,$dbname);

  //Arreglo de errores

  $errores = [];

  //Validar envio de formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["username"];
    $password = $_POST["password"];

     

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ? AND password = ?");
    $stmt->bind_param("ss", $id, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
        echo "Rol: " . $row["rol"] . "<br>";

      }
    } else {
      echo "No se encontraron resultados";
    }
  }

?>

<body>
  <div class="container">
    <h2>Iniciar Sesión</h2>
    <form action="./index.php" method="POST">
      <fieldset>
        <legend>Iniciar sesion</legend>
        <div class="form-group">
          <label for="username">Matricula:</label>
          <input type="number" maxlength="6" id="username" name="username" class="form-control" placeholder="Matricula sin a" required>
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
</body>

</html>