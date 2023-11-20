<?php

$conexion = mysqli_connect('localhost', 'root', '', 'tienda_mery');

function valorDePropiedad($consulta, $fila, $campo)
{
  $i = 0;
  while ($resultados = mysqli_fetch_array($consulta)) {
    if ($i == $fila) {
      $resultado = $resultados[$campo];
    }
    $i++;
  }
  return $resultado;
};

?>
