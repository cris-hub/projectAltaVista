<?php
ob_start();

session_start();
       
if($_SESSION['ac'!='activo']){
            header('location: ../../../index.php');
            session_destroy();
            exit();
        }
 if (isset($_POST['exit'])) {
        header('location: ../../../view/index.php');
        session_destroy();
        }
?>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/VehiculoController.php");
        
        require_once (FOLDER_PROJECT . "/controller/LoginVerify.php");
        
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
                                        <h4 class="title">Tabla Vehiculos</h4>
                                        <p class="category">Estos son los vehiculos registrados en el sistema</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th># Registro del vehiculo</th>
                                            <th>Cedula del propietario</th>
                                            <th>Tipo de vehiculo</th>
                                            <th>Marca</th>
                                            <th>Placa</th>
                                           <th></th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($resultado as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['id_vehiculo']; ?></td>
                                                        <td><?php echo $r['id_usuarios']; ?></td>
                                                        <td><?php echo $r['tipo_vehiculo']; ?></td>
                                                        <td><?php echo $r['marca']; ?></td>
                                                        <td><?php echo $r['placa']; ?></td>

                                                        <td class="text-primary">
                                                           <a  class="btn btn-primary" href="eliminarVehiculo.php?id=<?php echo $r['id_vehiculo']?>">
                                                                
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

    <?php   
        include(FOLDER_VIEW . "/template/scriptsModels.php");?>

</html>

<?php 

ob_end_flush();
?>