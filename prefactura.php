<?php
include 'app/include/head.php'; 
require 'app/php/conexion.php';
$idregistro = $_GET['idregistro'];
?>

<?php include 'app/include/nav.php'; ?>

<?php 
        $sel = $con->query("SELECT * FROM registro WHERE idregistro='$idregistro'");
        $row = mysqli_num_rows($sel);
        while($f= $sel->fetch_assoc()){  
            $idregistro=$f['idregistro'];
            $nombre=$f['nombre'];
            $apellidos=$f['apellidos'];
            $correo=$f['correo'];
            $direccion=$f['direccion'];
            $nacionalidad=$f['nacionalidad'];
            $cedula=$f['cedula'];
            $idcurso=$f['idcurso'];
        }
?>

<div class="container">
    <h3>Pre - Factura</h3>
    <div class="form-group ">
        <label>Nombre y Apellidos:</label>
        <div class="text-info">
            <?php echo $nombre." ".$apellidos;?>
        </div>
        <input type="hidden" name="idregistro" value="<?php echo $idregistro;?>">
    </div>
    <div class="form-group">
        <label>Correo: </label>
        <div class="text-info">
            <?php echo $correo;?>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label" for="direccion">Dirección: </label>
        <div class="text-info">
            <?php echo $direccion;?>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label" for="nacionalidad">Nacionalidad: </label>
        <div class="text-info">
            <?php echo $nacionalidad;?>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label" for="cedula">Cédula: </label>
        <div class="text-info">
            <?php echo $cedula;?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-bordered table-responsive">
                <table class="table">
                    <label class="control-label">Inscripción al Evento: </label>
                    <?php
                                $sel = $con->query("SELECT * FROM registro WHERE idregistro='$idregistro' ");
                                ?>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
							 $row = mysqli_num_rows($sel);
                             while($f= $sel->fetch_assoc()){  
                                $nombrec=$f['idregistro'];
                                $inscripcion=$f['inscripcion'];
                        ?>
                        <tr>
                            <td class="text-center text-primary"><?php echo $idregistro?></td>
                            <td></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <th class="text-center">Total</th>
                            <th class="text-center">$.<?php echo number_format($inscripcion,2);?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-bordered table-responsive">
                <table class="table">
                    <label class="control-label">Curso: </label><br />
                    <?php
                                                $sel = $con->query("SELECT
                                                cursos.nombrecurso,
                                                cursos.valorcurso
                                                FROM
                                                registro
                                                INNER JOIN cursos ON registro.idcurso = cursos.idcurso
                                                WHERE idregistro = '$idregistro'");
                                            ?>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
							                    $row = mysqli_num_rows($sel);
                                                while($f= $sel->fetch_assoc()){  
                                                $nombrecurso=$f['nombrecurso'];
                                                $valorcurso=$f['valorcurso'];
                                            ?>
                        <tr>
                            <td class="text-center text-primary"> <?php echo $nombrecurso?></td>
                            <td></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <th class="text-center">Total </th>
                            <th class="text-center">$.<?php echo $valorcurso;?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-bordered table-responsive">
                <table class="table ">
                    <label class="control-label">Talleres: </label><br />
                    <?php
                                                $sel = $con->query("SELECT
                                                talleres.valor,
                                                talleres.nombre
                                                FROM
                                                prefactura
                                                INNER JOIN talleres ON prefactura.idtaller = talleres.idtaller
                                                WHERE idregistro = '$idregistro'");
                                            ?>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                                                $row = mysqli_num_rows($sel);
                                                $valor_total = 0;
                                                $valor = 0;
                                                while($f= $sel->fetch_assoc()){  
                                                $nombre=$f['nombre'];
                                                $valor_total = $valor += $f['valor'];
                                                
                                            ?>
                        <tr>
                          
                            <td class="text-center text-primary">
                                <?php echo $nombre?>
                            </td>
                            <td></td>
                        </tr>
                        <?php
                                                    }
                                             ?>
                        <tr>
                            <th class="text-center">Total </th>
                            <th class="text-center">$.
                                <?php echo number_format($valor_total,2);?>
                            </th>
                        </tr>

                        <tr>
                            <th class=" text-danger text-center">TOTAL GENERAL</th>
                            <?php $total_general = $inscripcion + $valorcurso + $valor_total;?>
                            <th class="text-center text-danger">$.
                                <?php echo number_format($total_general,2);?>
                            </th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>