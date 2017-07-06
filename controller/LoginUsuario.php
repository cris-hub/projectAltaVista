<?php


require_once("../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");
require_once(FOLDER_PROJECT . "/controller/LoginVerify.php");

$login = new Login();
$id=$_POST['ced'];
$con= $_POST['con'];



$us= new Usuario();
$login = $us->login($id, $con);
$rol = $us->consultarRoles($id);

if ($login!= null && $rol!=null) {
    

foreach ($login as $value) {
    
   $value['cedula'];
   $value['contraseña'];
}
foreach ($rol as $role) {
    $role['usuarios_cc'];
    $role['roles_idroles'];
}

if ($value['cedula']==$id && $value['contraseña']==$con && $role['roles_idroles']==1) {
   
    $login->ce=$value['cedula'];
    $login->con=$value['contraseña'];
    $login->ro=$role['roles_idroles'];
    header("location: ../view/app/administrador/listarResidentes.php");
    
}elseif($value['cedula']==$id && $value['contraseña']==$con && $role['roles_idroles']==2){
     
    $login->ce=$value['cedula'];
    $login->con=$value['contraseña'];
    $login->ro=$role['roles_idroles'];
    header("location: ../view/app/secretaria/listarResidentes.php");
    
}else{
    
    echo "<script>alert('El usuario y contraseña estan mal'); window.location.href='../view/index.php';</script>";    
}


} else {
    
    echo "<script>alert('El usuario y contrasena estan mal'); window.location.href='../view/index.php';</script>";
}