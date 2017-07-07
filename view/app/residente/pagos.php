<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/PagosResidenteController.php");

        require_once (FOLDER_PROJECT . "/controller/LoginVerify.php");
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
                                        <h4 class="title">Consultar Soporte de pagos</h4>
                                        <p class="category">Pagos realizados</p>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="btn-group pull-right">
                                                <a class="btn btn-primary" href="nuevoPago.php?id=<?php echo $r['id_pagos'] ?>">
                                                    <span>Nuevo Pago  </span>
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>No. Pago</th>
                                            <th>No. Apartamento</th>
                                            <th>Tipo de Pago</th>
                                            <th>Fecha</th>
                                            <th>Valor</th>
                                            <th>Estado</th>
                                            <th>Comprobante</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                                <?php $pago = new PagosResidenteController() ?>
                                                <?php foreach ($pago->listar() as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['id_pagos']; ?></td>
                                                        <td><?php echo $r['id_apartamento']; ?></td>
                                                        <td><?php echo $r['tipo_pago']; ?></td>
                                                        <td><?php echo $r['fecha']; ?></td>
                                                        <td><?php echo $r['valor']; ?></td>

                                                        <td class="text-primary"><?php echo $r['estado']; ?></td>
                                                        <td class="text-primary">
                                                            <a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $r['cedula'] ?>">

                                                                <i class="fa fa-pencil"></i>
                                                            </a>

                                                            <a class="btn btn-primary" href="bloquearUsuario.php?id=<?php echo $r['cedula'] ?>&es=<?php echo $r['estado'] ?>">

                                                                <i class="fa fa-lock"></i>
                                                            </a>
                                                            <a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $r['cedula'] ?>">

                                                                <i class="material-icons">local_movies</i>

                                                            </a>

                                                            <a  class="btn btn-primary" href="eliminarUsuario.php?id=<?php echo $r['cedula'] ?>">

                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
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