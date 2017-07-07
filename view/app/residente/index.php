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
                                <div class="card card-profile">
                                    <div class="card-avatar">
                                        <a href="">
                                            <img class="img" src="../../resources/img/faces/marc.jpg" />
                                        </a>
                                    </div>

                                    <div class="content">
                                        <h6 class="category text-gray">Residente</h6>
                                        <h4 class="card-title">Alexander Ramirez</h4>
                                        <div class="col-md-12">
                                            <label >Apartamento: Apartamento 301</label>

                                        </div>
                                        <div class="col-md-12">
                                            <label >Aparto: Cerezos B</label>

                                        </div>
                                        <div class="col-md-12">
                                            <label >Correo electronico: alex@gmail.com</label>

                                        </div>
                                        <div class="col-md-12">
                                            <label >Estado de pago: Pago al día</label>

                                        </div>
                                        <div class="col-md-12">
                                            <label >Ultimo registro de pago: 12/05/17</label>

                                        </div>

                                        <div class="col-md-12">
                                            <label >Estado: Estado Activo</label>

                                        </div>
                                    </div>


                                    <a href="" class="btn btn-primary btn-round"><i class="fa fa-camera-retro"></i> Cambiar foto</a>
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