<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/PagosResidenteController.php");
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
                                        <h4 class="title">Nuevo Residente</h4>
                                        <p class="category">Registra un nuevo residente, para solicitar parqueaderos</p>
                                    </div>
                                    <div class="card-content">
                                        <form  action="../../../controller/PagosResidenteController.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Referencia</label>
                                                        <input type="text" name="referencia" id="referencia" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apartamento</label>
                                                        <input type="text" name="id_apartamento" id="id_apartamento" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Tipo Pago</label>
                                                        <select name="tipo_pago" class="form-control">

                                                            <option> Efectivo</option>
                                                            <option> Tarjeta Credito</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Estado</label>
                                                        <input type="text" name="estado" id="estado" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha</label>
                                                        <input type="text" name="fecha" id="fecha" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Subir Comprobante</label>
                                                        <input type="file" name="apellidos" id="apellidos" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Guardar"/>

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