<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        include_once ("./editarPagoController.php");
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
                                        <form  action="modificarPagos.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <label class="control-label">No Pago</label>
                                                    <input type="text" name="c" id="c" class="form-control" value="<?php echo $resultado['id_pagos'] ?>" disabled />
                                                    <input type="hidden" name="id_pagos" id="id_pagos" class="form-control" value="<?php echo $resultado['id_pagos'] ?>" />

                                                </div>
                                                <div class="col-md-6">

                                                    <label class="control-label">No. Apartamento</label>
                                                    <input type="email" name="id_apartamento" id="id_apartamento" class="form-control"  value="<?php echo $result[0][4] ?>" />

                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Referencia</label>
                                                        <input type="text" name="referencia" id="referencia" class="form-control"  value="<?php echo $result[0][1] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha Registro</label>
                                                        <input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo $result[0][2] ?>"  />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Valor</label>
                                                        <input type="text" name="valor" id="valor" class="form-control"   />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Estado</label>
                                                        <input type="password" name="estado" id="estado"  class="form-control"  value="<?php echo $result[0][6] ?>"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comprobante</label>
                                                        <input type="text" name="url_documento" id="url_documento" maxlength="10" minlength="1" class="form-control"   value="<?php echo $result[0][3] ?>"  >
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="submit" name="registrar"  class="btn btn-primary pull-right" value="Actualizar datos del residente"/>

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