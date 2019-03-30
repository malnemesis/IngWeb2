<?php 
include 'app/include/head.php'; 
require 'app/php/conexion.php';

$idregistro = $_GET['idregistro'];

?>

<?php include 'app/include/nav.php'; ?>

<div class="container mt-5">
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">CURSOS</h4>
                <?php
                    $cursos = $con->query("SELECT * FROM cursos");
                    $row_cnt = $cursos->num_rows;  
                ?>
                <h1 class="card-text text-center"><?php echo $row_cnt; ?></h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">TALLERES</h4>
                <h1 class="card-text text-center">3</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="py-5 text-center">
        <h2>EDITAR REGISTRO</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">

        <?php
                $registro = $con->query("SELECT * FROM registro WHERE idregistro='$idregistro'");
                $row = mysqli_num_rows($registro);
                while($r = $registro->fetch_assoc()){
                    foreach ($r as $col) {
                        $idregistro = $r['idregistro'];
                        $nombre = $r['nombre'];
                        $apellidos = $r['apellidos'];
                        $correo = $r['correo'];
                        $direccion = $r['direccion'];
                        $nacionalidad = $r['nacionalidad'];
                        $cedula = $r['cedula'];
                        $idcurso = $r['idcurso'];
                    }
                }
        ?>

            <form action="app/php/editar.php" method="POST">

                <div class="row">
                    <div class="col-md-4 mb-5">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
                        <input class="form-control" type="hidden" name="idregistro" value="<?php echo $idregistro; ?>">
                        <input class="form-control" type="hidden" name="idcurso" value="<?php echo $idcurso; ?>">
                    </div>
                    <div class="col-md-4 mb-5">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>" required>
                    </div>
                    <div class="col-md-4 mb-5">
                        <input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $correo; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php echo $direccion; ?>" required>
                    </div>
                    <div class="col-md-3 mb-5">
                        <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $nacionalidad; ?>" required>
                    </div>
                    <div class="col-md-3 mb-5">
                        <input type="numer" class="form-control" name="cedula" placeholder="Cedula" value="<?php echo $cedula; ?>" required>
                    </div>
                </div>

                <hr class="mb-5">

                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="submit">EDITAR</button>
                </div>

            </form>

        </div>
    </div>