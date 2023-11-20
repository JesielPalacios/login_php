<?php
$varCorreo = $_POST['correo'];
$varContrasena = $_POST['contrasena'];

session_start();

$_SESSION['correo'] = $varCorreo;

include('base_de_datos.php');

$consulta = "select * from cliente where correo='$varCorreo' and contrasena='$varContrasena'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
  header('location:inicio.php');
} else {
?>
  <?php
  include('login.php');
  ?>

  <script>
    // import Swal from 'sweetalert2/dist/sweetalert2.js'
    // import 'sweetalert2/src/sweetalert2.scss'

    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "error",
      title: "Credenciales incorrectas."
    });
  </script>
<?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
