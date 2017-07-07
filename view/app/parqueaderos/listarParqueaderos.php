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
        require_once (FOLDER_PROJECT . "/controller/ParqueaderosController.php");
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
                                            <th># Parqueadero</th>
                                            <th># Estado</th>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($resultado as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['id_parqueadero']; ?></td>
                                                        <td><?php echo $r['estado']; ?></td>
                                                       


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
