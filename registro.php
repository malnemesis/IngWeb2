<?php 
include 'app/include/head.php'; 
require 'app/php/conexion.php';
?>

<?php include 'app/include/nav.php'; ?>

<div class="container mt-2">
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
                <?php
                    $talleres = $con->query("SELECT * FROM talleres");
                    $row_cnt = $talleres->num_rows;  
                ?>
                <h1 class="card-text text-center"><?php echo $row_cnt; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="py-4 text-center">
        <h2>REGISTRO</h2>
        <p class="lead">Recuerde que solo puede escoger <strong>solo un CURSO</strong> y <strong>varios
                TALLERES</strong>
        </p>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">

            <form action="app/php/registro.php" method="POST">

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <input type="email" class="form-control" name="correo" placeholder="Correo" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="col-md-3 mb-4">
                        <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" required>
                    </div>
                    <div class="col-md-3 mb-4">
                        <input type="numer" class="form-control" name="cedula" placeholder="Cedula" required>
                    </div>
                </div>

                <hr class="mb-2">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cursos">CURSOS</label>
                        <select class="custom-select d-block w-100" name="idcurso" required>
                            <option value="">Escoger...</option>
                            <?php
                            $cursos = $con->query("SELECT * FROM cursos");
                            while($c=$cursos->fetch_object()):   
                        ?>
                            <option value="<?php echo $c->idcurso; ?>"><?php echo $c->nombrecurso; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <small class="text-muted">Puede escoger solo un CURSO</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="talleres">TALLERES</label>
                        <select class="custom-select d-block w-100" name="talleres[]" multiple required>
                            <option value="">Escoger...</option>
                            <?php
                            $talleres = $con->query("SELECT * FROM talleres");
                            while($t=$talleres->fetch_object()):   
                        ?>
                            <option value="<?php echo $t->idtaller; ?>"><?php echo $t->nombre; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <small class="text-muted">Puede escoger varios TALLERES</small>
                    </div>

                </div>

                <hr class="mb-2">

                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="submit">REGISTRAR</button>
                </div>

            </form>

        </div>
    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Nacionalidad</th>
                        <th>Cedula</th>
                    </tr>
                </thead>
                <?php
                    $registro = $con->query("SELECT * FROM registro");
                    while($r=$registro->fetch_object()):   
                ?>
                <tbody>
                    <tr>
                        <td><a class="btn btn-info" title="EDITAR"
                                href="editar.php?idregistro=<?php echo $r->idregistro; ?>"><i
                                    class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-success" title="PRE-FACT"
                                href="prefactura.php?idregistro=<?php echo $r->idregistro; ?>"><i
                                    class="fa fa-file"></i></a></td>

                        <td><?php echo $r->idregistro; ?></td>
                        <td><?php echo $r->nombre; ?></td>
                        <td><?php echo $r->apellidos; ?></td>
                        <td><?php echo $r->correo; ?></td>
                        <td><?php echo $r->direccion; ?></td>
                        <td><?php echo $r->nacionalidad; ?></td>
                        <td><?php echo $r->cedula; ?></td>
                    </tr>
                </tbody>
                <?php endwhile; ?>
            </table>
        </div>
    </div>