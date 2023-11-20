<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login PHP</title>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="contenedor">
    <h1>Inicio de sesión</h1>

    <form action="validacion.php" method="post">
      <div class="campo">
        <label for="correo">Correo electrónico</label>
        <input type="email" name="correo" placeholder="Correo aquí">
      </div>
      <div class="campo">
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" placeholder="Contraseña aquí">
      </div>
      <button>Iniciar sesión</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>