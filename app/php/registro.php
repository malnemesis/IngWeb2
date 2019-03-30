<?php 

require_once "conexion.php";

extract($_POST);

$registro = $con->query("INSERT INTO registro 
VALUES ('', '50', '$nombre', '$apellidos', '$correo', '$direccion', '$nacionalidad', '$cedula', '$idcurso')");

$idregistro = mysqli_insert_id($con);
 
for ($i=0;$i<count($talleres);$i++){
    $prefactura = $con->query("INSERT INTO prefactura VALUES('', '$idregistro', '$talleres[$i]')");
}

if ($prefactura == true) {
    header("location:../../registro.php");
}