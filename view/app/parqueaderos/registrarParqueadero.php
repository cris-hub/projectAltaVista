<?php
ob_start();

session_start();
//
//if($_SESSION['ac']!='activo'){
//            header('location: ../../index.php');
//            session_destroy();
//
//        }
if (isset($_POST['exit'])) {
    header('location: ../../../view/index.php');
    session_destroy();
}
?>
<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
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
                                        <h4 class="title">Nuevo registro de parqueadero</h4>
                                        <p class="category">Registra los parquedearos disponibles en el condominio</p>
                                    </div>
                                    <div class="card-content">
                                        <form  action="insertarParqueadero.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"># Parqueadero</label>
                                                        <input type="number" name="id" id="id" class="form-control" required="" />

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Estado</label>
                                                        <input type="text" name="referencia" id="referencia" class="form-control" value="Desocupado" disabled/>
                                                    </div>
                                                </div>

                                            </div>




                                            <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Registrar parqueadero"/>

                                        </form>
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
