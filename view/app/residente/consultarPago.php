<?php
ob_start();

session_start();
       
if($_SESSION['ac']=!'activo'){
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
        require_once (FOLDER_PROJECT . "/controller/PagoController.php");
       
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
                                        <h4 class="title">Tabla Usuarios</h4>
                                        <p class="category">Estos son los usuarios del sistema</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th># Pago</th>
                                            <th># Apartamento</th>
                                            <th>Tipo de pago</th>
                                            <th>Referencia</th>
                                            <th>Valor</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Documento</th>
                                           </thead>
                                            <tbody>
                                                <?php foreach ($resultado as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['id_pagos']; ?></td>
                                                        <td><?php echo $r['id_apartamento']; ?></td>
                                                        <td><?php echo $r['tipo_pago']; ?></td>
                                                        <td><?php echo $r['referencia']; ?></td>
                                                        <td><?php echo $r['valor']; ?></td>

                                                        <td class="text-primary"><?php echo $r['fecha']; ?></td>
                                                       
                                                            <td><?php echo $r['estado']; ?></td>
                                                            <td><?php echo $r['url_documento']; ?></td>
                                                           

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