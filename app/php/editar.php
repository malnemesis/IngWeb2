<?php

require_once "conexion.php";

extract($_POST);

$actualizar = $con->query("UPDATE registro SET inscripcion='50', nombre='$nombre', apellidos='$apellidos', correo='$correo', direccion='$direccion', 
nacionalidad='$nacionalidad', cedula='$cedula', idcurso='$idcurso' WHERE idregistro='$idregistro'");

if ($actualizar == true) {
    header("location:../../registro.php");
}