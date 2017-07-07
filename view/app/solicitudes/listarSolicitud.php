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
        $_SESSION['cedula'];
        $id = $_SESSION['cedula'];
        $veh = new Vehiculo();
        $resultado = $veh->consultarId($id);
        foreach ($resultado as $value=>$tr) {
            $tr['id_vehiculo'];
        }
        $resp =  $tr['id_vehiculo'];
        ?>
    </head>

    <body>

        <div class="wrapper">
<?php include(FOLDER_VIEW . "/template/sidebarresidente.php"); ?>

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
                                            </thead>
                                            <tbody>
                                            <?php $solid = $solicitud->consultarId($resp);
                                            foreach ($solid as $r=>$a): ?>
                                                    <tr>
                                                        <td><?php echo $a['id_solicitude']; ?></td>
                                                        <td><?php echo $a['id_vehiculo']; ?></td>
                                                        <td><?php echo $a['id_parqueadero']; ?></td>
                                                        <td><?php echo $a['fecha_solicitud']; ?></td>
                                                        <td><?php echo $a['estado']; ?></td>
                                                       


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
