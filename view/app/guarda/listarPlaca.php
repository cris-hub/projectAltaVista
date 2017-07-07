<!doctype html>
<?php
ob_start();

session_start();
       
//if($_SESSION['ac'!='activo']){
//            header('location: ../../../index.php');
//            session_destroy();
//            exit();
//        }
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
       
        require_once (FOLDER_PROJECT . "/model/Vehiculo.php");
        $placa= $_POST['vehiculo'];
        $vh = new Vehiculo();
        $result = $vh->consultarExtra($placa);
       
        
        
        ?>
    </head>

    <body>

        <div class="wrapper">
            <?php include(FOLDER_VIEW . "/template/sidebarguarda.php"); ?>

            <div class="main-panel">

                <?php include(FOLDER_VIEW . "/template/navbar.php"); ?>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title">Tabla Usuarios</h4>
                                        <p class="category">Estos son los usuarios del sistema</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Placa</th>
                                            <th>Fecha solicitud</th>
                                            <th>Estado</th>
                                            <th># Parqueadero</th>
                                            
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['placa']; ?></td>
                                                        <td><?php echo $r['fecha_solicitud']; ?></td>
                                                        <td><?php echo $r['estado']; ?></td>
                                                        <td><?php echo $r['id_parqueadero']; ?></td>
                                                    
                                                        
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
