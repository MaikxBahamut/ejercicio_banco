<?php

include "validaciones.php"; //internamente esto copia el codigo de validaciones.php y lo pega como si estuviese en este archivo

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$correoConfirmacion = $_POST["correoConfirmacion"];
$dni = $_POST["dni"];
$contrasenha = $_POST["contrasenha"];
$direccion = $_POST["direccion"];

$personaRandom = new Persona(); 

$personaRandom -> setNombre($nombre);
$personaRandom -> setApellidos($apellidos);
$personaRandom -> setCorreo($correo,$correoConfirmacion);
$personaRandom -> setdni ($dni);
$personaRandom -> setContrasena($contrasenha);
$personaRandom -> setDireccion($direccion);

var_dump($personaRandom);
echo "<br>";

if ($personaRandom -> getNombre()) {
    echo "funciona";
}

?>