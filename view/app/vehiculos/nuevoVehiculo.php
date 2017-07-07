<?php
ob_start();

session_start();

//if($_SESSION['ac']!='activo'){
//            header('location: ../../../index.php');
//            session_destroy();
//            exit();
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
        require_once (FOLDER_PROJECT . "/controller/UsuarioController.php");
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
                                        <h4 class="title">Nuevo Vehiculo</h4>
                                        <p class="category">Registra un nuevo vehiculo, para solicitar parqueaderos</p>
                                    </div>
                                    <div class="card-content">
                                        <form  action="insertarVehiculo.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Marca</label>
                                                        <input type="text" name="marca" id="marca" maxlength="10" class="form-control" required="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Placa</label>
                                                        <input type="text" name="placa" id="placa" class="form-control" maxlength="9" required="" />
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Tipo de vehiculo</label>
                                                        <select name="tipo" class="form-control">
                                                            <option value="Coche">Coche</option>
                                                            <option value="Moto">Moto</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apartamento</label>
                                                        <select class="form-control"  name="user" >
                                                            <?php foreach ($resultado as $ap => $cl): ?>
                                                                <option name="apar" value="<?php echo $cl['cedula'] ?>" >Cedula:<?php echo $cl['cedula'] ?> - Nombre:<?php echo $cl['nombre'] ?><?php echo $cl['apellido'] ?></option>

                                                            <?php endforeach; ?>

                                                        </select>
                                                    </div>

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