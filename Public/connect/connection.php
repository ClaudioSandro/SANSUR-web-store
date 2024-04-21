<?php
$host = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$base_de_datos = "sansur"; 


$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if (!$conexion ->connect_error) {
    die('Error de conexión: ' . $conexion ->connect_error);
}
else {
  echo "<h2>Conectado</h2>" ;
}
?>