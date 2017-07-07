<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/ApartamentosController.php");
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
                                        <h4 class="title">Nuevo Residente</h4>
                                        <p class="category">Registra un nuevo residente, para solicitar parqueaderos</p>
                                    </div>
                                    <div class="card-content">
                                        <form  action="insertarUsuario.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Cedula</label>
                                                        <input type="text" name="cedula" id="cedula" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Correo electronico</label>
                                                        <input type="email" name="email" id="email" class="form-control" />
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre</label>
                                                        <input type="text" name="nombres" id="nombres" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellidos</label>
                                                        <input type="text" name="apellidos" id="apellidos" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                        <label class="control-label">Apartamento</label>
                                                        <select class="form-control"  name="apartamentos" >
                                                            <?php foreach ($apartachos as $ap=>$cl):?>
                                                            <option name="apar" value="<?php echo $cl['id_apartamentos'] ?>" >Numero apartamento:<?php echo $cl['id_apartamentos'] ?> - Torre:<?php echo $cl['torre'] ?></option>
                                                            
                                                            <?php endforeach; ?>
                                                          
                                                        </select>
                                                        
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                        <label class="control-label">¿Es propietario?</label>
                                                        <select name="propietario" class="form-control">
                                                            <option value="SI" >Si</option>
                                                            <option value="NO" >No</option>
                                                        </select>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                        <label class="control-label">¿Es residente?</label>
                                                        <select name="residente" class="form-control">
                                                            <option value="SI" >Si</option>
                                                            <option value="NO" >No</option>
                                                        </select>
                                                   
                                                   
                                                </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Contraseña</label>
                                                        <input type="password" name="contrasena" id="contrasena"  class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha de nacimiento</label>
                                                        <input type="text" name="fecha" id="fecha" maxlength="10" minlength="1" placeholder="Fecha de nacimiento: DD/MM/AAAA" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Registrar residente"/>

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