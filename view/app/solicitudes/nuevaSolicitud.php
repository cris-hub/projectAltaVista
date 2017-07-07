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
        require_once(FOLDER_PROJECT . "/model/Vehiculo.php");
        require_once(FOLDER_PROJECT . "/model/Parqueadero.php");
        
        $_SESSION['cedula'];
        $id = $_SESSION['cedula'];
        $esta = 'Desocupado';
        $veh = new Vehiculo();
        $pa= new Parqueadero();
        $resultado = $veh->consultarId($id);
        $parking = $pa->consultarId($esta);
        $fech= date('Y-m-d');
          
        
        
        
    
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
                                        <h4 class="title">Solicitar parqueadero</h4>
                                        <p class="category">Solicitar un espacio en el parqueadero del condominio</p>
                                    </div>
                                    <div class="card-content">
                                <form  action="insertarSolicitud.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Vehiculo del residente</label>
                                                         <select class="form-control"  name="vehiculo" >
                                                            <?php foreach ($resultado as $ap=>$cl):?>
                                                            <option name="apar" value="<?php echo $cl['id_vehiculo'] ?>" >Cedula:<?php echo $cl['id_usuarios'] ?> - Placa:<?php echo $cl['placa'] ?></option>
                                                            
                                                            <?php endforeach; ?>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Parqueaderos disponibles</label>
                                                        <select class="form-control"  name="parqueadero" >
                                                            <?php foreach ($parking as $p=>$pal):?>
                                                            <option name="disp" value="<?php echo $pal['id_parqueadero'] ?>" ># Parqueadero:<?php echo $pal['id_parqueadero'] ?> - Estado:<?php echo $pal['estado'] ?></option>
                                                            
                                                            <?php endforeach; ?>
                                                          
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha de solicitud</label>
                                                        <input type="text" name="rial" id="rial" class="form-control" value="<?php echo $fech?>" disabled=""/>
                                                        <input type="hidden" name="fecha" id="fecha" class="form-control" value="<?php echo $fech?>" />
                                                    </div>

                                                </div>
                                                 


                                                <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Solicitar Parqueadero"/>
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
