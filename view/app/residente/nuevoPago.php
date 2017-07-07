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
            <?php include(FOLDER_VIEW . "/template/sidebarresidente.php"); ?>

            <div class="main-panel">

                <?php include(FOLDER_VIEW . "/template/navbar.php"); ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title">Nuevo Registro de pago</h4>
                                        <p class="category">Registra un nuevo pago ¡Antes de los 15 de cada mes!</p>
                                    </div>
                                    <div class="card-content">
                                <form  action="insertarPago.php"  enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Tipo de pago</label>
                                                        <select name="tipo" class="form-control">
                                                            <option value="Cheque">Cheque</option>
                                                            <option value="Efectivo">Efectivo</option>
                                                            <option value="Tarjeta">Tarjeta de credito</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Referencia de pago</label>
                                                        <input type="text" name="referencia" id="referencia" class="form-control" />
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Valor</label>
                                                        <input type="text" name="valor" id="valor" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha</label>
                                                        <input type="text" name="fecha" id="fecha" class="form-control" />
                                                    </div>

                                                </div>


                                                 <div class="col-md-6">

                                                    
                                                        <label for="img" class="control-label">comprobante</label>
                                                        <input type="file" name="img" id="img" class="" accept="image/*" />
                                            

                                                </div>

                                                <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Registrar automovil"/>
                                            </div>
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
