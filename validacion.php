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
  $nombreUsuarioDB = valorDePropiedad($resultado, 0, "nombre");
?>
  <?php
  include('login.php');
  ?>

  <script type="text/javascript">
    localStorage.usuario = JSON.stringify({
      nombre: '<?php echo $nombreUsuarioDB; ?>',
      correo: '<?php echo $varCorreo; ?>'
    })

    form = document.getElementById("myForm");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
      elements[i].readOnly = true;
    }
    // document.getElementById("myForm").reset();
    form.reset();


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
      icon: "success",
      title: "Bienvenid@! " + JSON.parse(localStorage.usuario).nombre + "."
    })

    setInterval(() => {
      window.location.href = 'inicio.php'
    }, 3000);
  </script>
<?php

} else {
?>
  <?php
  include('login.php');
  ?>

  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: "bottom-end",
      showConfirmButton: false,
      timer: 5000,
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
