<div class="sidebar" data-color="purple" data-image= "<?php echo RESOURCES; ?>/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <center>
            <img src="<?php echo RESOURCES; ?>/img/logo.png" alt="">
        </center>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">

            <li class="active">
                <a href="<?php echo VIEW ?>/app/administrador/listarResidentes.php">
                    <i class="material-icons">person</i>
                    <p>Mi perfil</p>
                </a>
            </li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">face</i>
                    <span class="notification">Administrador</span>
                    <p class="hidden-lg hidden-md">usuarios</p>
                </a>
               
            </li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">account_circle</i>
                    <span class="notification">Registrar Usuarios</span>
                    <p class="hidden-lg hidden-md">usuarios</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a  href="<?php echo VIEW ?>/app/administrador/nuevoUsuario.php">Nuevo Residente</a></li>
                    <li><a href="<?php echo VIEW ?>/app/administrador/listarResidentes.php">Ver Residentes</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">motorcycle</i>
                    <span class="notification">Registrar Vehiculos</span>
                    <p class="hidden-lg hidden-md">usuarios</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo VIEW ?>/app/vehiculos/nuevoVehiculo.php">Nuevo Vehiculo</a></li>
                    <li><a href="<?php echo VIEW ?>/app/vehiculos/listarVehiculo.php">Ver Vehiculos</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">directions_car</i>
                    <span class="notification">Verificar Parquederos</span>
                    <p class="hidden-lg hidden-md">Notifications</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo VIEW ?>/app/parqueaderos/registrarParqueadero.php">Registrar Parqueadero</a></li>
                    <li><a href="<?php echo VIEW ?>/app/parqueaderos/listarParqueaderos.php">Ver Paqueaderos</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">local_movies</i>
                    <span class="notification">Parquederos disponibles</span>
                    <p class="hidden-lg hidden-md">parqueaderos</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo VIEW ?>/app/solicitudes/listarSolicitudA.php">Asignar parqueaderos</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">attach_money</i>
                    <span class="notification">Verificar Pagos</span>
                    <p class="hidden-lg hidden-md">pagos</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo VIEW ?>/app/pagos/listarPago.php">Ver pagos</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">description</i>
                    <span class="notification">Reportes de apartamentos en mora</span>
                    <p class="hidden-lg hidden-md">parqueaderos</p>
                </a>
                 <ul class="dropdown-menu">
                    <li><a href="<?php echo VIEW ?>/app/reportes/usuariosenmoraexcel.php">Generar reporte de usuarios en mora</a></li>
                        
                        
                        
                </ul> 
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">report_problem</i>
                    <span class="notification">Reportes de parqueadero</span>
                    <p class="hidden-lg hidden-md">parqueaderos</p>
                </a>
                <ul class="dropdown-menu">
                        <li><a href="<?php echo VIEW ?>/app/reportes/parqueaderosexcel.php">Generar reporte de parqueadero</a></li>
                        
                        
                        
                </ul>
            </li>



        </ul>
    </div>
</div>