<!doctype html>
<?php
ob_start();
session_start();
       
if($_SESSION['cedula']=='' &&   $_SESSION['contrasena']=='' && $_SESSION['rol']=''){
            header('location: ../../../index.php');
            session_destroy();
        }
 if (isset($_POST['exit'])) {
        $_SESSION['cedula']='';
        $_SESSION['contrasena']='';
        $_SESSION['rol']='';
        header('location: ../../../view/index.php');
        session_destroy();
        }
?>
<html lang="en">

    <head>
        <?php
        
         $_SESSION['cedula'];
         $_SESSION['contrasena'];
         $_SESSION['rol'];
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/PlacaController.php");
        
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
                                        <h4 class="title">Consultar por placa</h4>
                                        <p class="category">Consulta los parqueaderos por placa del vehiculo</p>
                                    </div>
                                    <div class="card-content">
                                        <form  action="listarPlaca.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Cedula</label>
                                                         <select class="form-control"  name="vehiculo" >
                                                            <?php print_r($resultado);
                                                            foreach ($resultado as $ap=>$cl):?>
                                                            <option name="apar" value="<?php echo $cl['placa'] ?>" >Numero placa:<?php echo $cl['placa'] ?> - Propietario:<?php echo $cl['id_usuarios'] ?></option>
                                                            
                                                            <?php endforeach; ?>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                            </div>



                                            <input type="submit" name="registrar"  class="btn btn-primary" value="Buscar por placa"/>

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