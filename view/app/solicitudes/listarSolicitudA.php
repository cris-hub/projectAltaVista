<?php
ob_start();

session_start();

if ($_SESSION['ac'] = !'activo') {
    header('location: ../../../index.php');
    session_destroy();
    exit();
}
if (isset($_POST['exit'])) {
    header('location: ../../../view/index.php');
    session_destroy();
}
?>
<!doctype html>
<html lang="en">

    <head>
        <?php
        $docu = $_SESSION['cedula'];
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once(FOLDER_PROJECT . "/model/Vehiculo.php");
        require_once(FOLDER_PROJECT . "/controller/SolicitudController.php");
        require_once(FOLDER_PROJECT . "/controller/PagoAdminController.php");
        require_once(FOLDER_PROJECT . "/model/Vehiculo.php");
        require_once(FOLDER_PROJECT . "/model/Parqueadero.php");
        $veh = new Vehiculo();
        $par= new Parqueadero();
        
       
        ?>
    </head>

    <body>

        <div class="wrapper">
<?php include(FOLDER_VIEW . "/template/sidebar.php"); ?>

            <div class="main-panel">

<?php include(FOLDER_VIEW . "/template/navbar.php"); ?>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title">Tabla Parqueaderos</h4>
                                        <p class="category">Estos son los parqueaderos registrados en el sistema</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th># Solicitud</th>
                                            <th># Vehiculo</th>
                                            <th># Parqueadero</th>
                                            <th>Fecha Solicitud</th>
                                            <th>Estado de la solicitud</th>
                                            <th>Estado de pago</th>
                                            <th>Estado del parqueadero</th>
                                            <th>Asignar parqueadero</th>
                                            </thead>
                                            <tbody>
                                            <?php $solid = $solicitud->consultar();
                                            foreach ($solid as $r=>$a): ?>
                                                    <tr>
                                                        <td><?php echo $a['id_solicitude']; ?></td>
                                                        <td><?php echo $a['id_vehiculo']; ?></td>
                                                        <td><?php echo $a['id_parqueadero']; ?></td>
                                                        <td><?php echo $a['fecha_solicitud']; ?></td>
                                                        <td><?php echo $a['estado']; ?></td>
                                                        
                                             <?php    $pok = $a['id_solicitude'];
                                             $plk=$a['id_parqueadero'];
                                                       $po=$a['estado'];
                                                $vh= $veh->consultarUsuarioVehiculo($a['id_vehiculo']);
                                                        foreach ($vh as $value => $a) {
                                                            $a['id_usuarios'];}
                                                            $apo=$a['id_usuarios'];  
                                                            $resl= $usuariohas->consultarId($apo);
                                                        foreach ($resl as $valu => $l) {
                                                            $l['apartamentos_id_apartamentos'];
                                                            
                                                        }$ap=$l['apartamentos_id_apartamentos'];
                                                        ?>
                                                        <?php $resultado = $pago->consultarId($ap);
                                                        foreach ($resultado as $val => $op ):?>
                                                        <td><?php echo $op['estado']; ?></td>
                                                        <?php 
                                                       
                                                        endforeach;  $id=$op['estado']; ?>
                                                        <?php $ep = $par->consultarEstado($plk);
                                                        foreach ($ep as $va => $o ):?>
                                                        <td><?php echo $o['estado']; ?></td>
                                                        <?php endforeach; ?>
                                                        <td>
                                                            
                                            <a  class="btn btn-primary" href="asignarParqueadero.php?id=<?php echo $id ?>&po=<?php echo $po ?>&par=<?php echo $plk ?>&pla=<?php echo $pok ?>">

                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                       


                                                    </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php include(FOLDER_VIEW . "/template/footer.php"); ?>

            </div>
        </div>

    </body>

<?php include(FOLDER_VIEW . "/template/scriptsModels.php"); ?>

</html>
<?php
ob_end_flush();
?>
