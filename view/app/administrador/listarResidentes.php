<!doctype html>
<html lang="en">

    <head>
        <?php
        include_once ("../../../config/context.php");
        include(FOLDER_VIEW . "/template/head.php");
        require_once (FOLDER_PROJECT . "/controller/usuarioController.php");
        require_once (FOLDER_PROJECT . "/controller/LoginVerify.php");
        
        ?>
    </head>

    <body>

        <div class="wrapper">
            <?php include(FOLDER_VIEW . "/template/sidebarsecretaria.php"); ?>

            <div class="main-panel">

                <?php include(FOLDER_VIEW . "/template/navbar.php"); ?>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title">Tabla Usuarios</h4>
                                        <p class="category">Estos son los usuarios del sistema</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Estado</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($resultado as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r['cedula']; ?></td>
                                                        <td><?php echo $r['nombre']; ?></td>
                                                        <td><?php echo $r['apellido']; ?></td>
                                                        <td><?php echo $r['correo']; ?></td>
                                                        <td><?php echo $r['fechaNacimiento']; ?></td>

                                                        <td class="text-primary"><?php echo $r['estado']; ?></td>
                                                        <td class="text-primary">
                                                           <a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $r['cedula']?>">
                                                                
                                                                <i class="fa fa-pencil"></i>
                                                                </a>
                                                           
                                                            <a class="btn btn-primary" href="bloquearUsuario.php?id=<?php echo $r['cedula']?>&es=<?php echo $r['estado']?>">
                                                                
                                                                <i class="fa fa-lock"></i>
                                                                </a>
                                                          <a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $r['cedula']?>">
                                                                
                                                                <i class="material-icons">local_movies</i>
                                                                
                                                                </a>
                                                            
                                                            <a  class="btn btn-primary" href="eliminarUsuario.php?id=<?php echo $r['cedula']?>">
                                                                
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

    <?php   
        include(FOLDER_VIEW . "/template/scriptsModels.php");?>

</html>