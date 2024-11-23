

<?php
  require './includes/funciones.php';
  require './includes/config/database.php';

  conectarDB();

  incluirTemplate('header');
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
  <?php
  incluirTemplate('footer');
  ?>
</body>

</html>