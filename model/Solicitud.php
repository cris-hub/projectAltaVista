<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoVehiculo
 *
 * @author Ruben
 */
class Solicitud {

    private $pdo;
    private $idSolicitud;
    private $idVehiculo;
    private $idParqueadero;
    private $fecha_solicitud;
  

   public function __CONSTRUCT() {
        require_once(FOLDER_PROJECT . '/config/Conexion.php');
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function registrar( $idv, $idp,$fe, $es) {

        try {
            $insert = 'INSERT INTO solicitudes (id_vehiculo, id_parqueadero, fecha_solicitud, estado)  VALUES( :nom, :ap, :fe, :es)';
            $into = $this->conexion->prepare($insert);

            $into->bindParam(':nom', $idv);
            $into->bindParam(':ap', $idp);
            $into->bindParam(':fe', $fe);
            $into->bindParam(':es', $es);
            
           


            $into->execute();
            
            echo "Inserción exitosa";
        } catch (Exception $exc) {
            echo "No se pudo ejecutar la inserción". $exc->getTraceAsString();
        }
            
        
    }

    public function consultar() {

        try {
            $result = array();

            $consula = $this->conexion->query("SELECT * FROM solicitudes");

            while ($filas = $consula->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $filas;
            }
            return $this->result;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }
    
    public function consultarId($id) {

        try {
            
            $sql='SELECT * FROM solicitudes  WHERE id_vehiculo = :ids';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ids', $id);
            $consula->execute();
            $resul= $consula->fetchAll();
            return $resul;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }
    
    public function consultarRoles($id) {

        try {
            
            $sql='SELECT * FROM usuarios_has_roles WHERE usuarios_cc = :ced';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->execute();
            $resul= $consula->fetchAll();
            return $resul;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }
    
       public function cambiarEstado($id,$con) {

        try {
            
            $sql='UPDATE solicitudes SET estado = :con WHERE id_solicitude = :ced ';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->bindParam(':con', $con);
            $consula->execute();
           echo "Cambio exitoso";
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }
    
    
    //---- FUNÇÃO DE EXCLUSÃO DE DADOS---- //

    public function eliminar($id) {

        try {
            $delete = 'DELETE FROM usuarios WHERE cedula = :ced';
            $result = $this->conexion->prepare($delete);
            $result->bindParam(':ced', $id);
            $result->execute();
            echo "Eliminación exitosa";
        } catch (Exception $exc) {
            echo "No se pudo eliminar el usuario". $exc->getTraceAsString();
        }
    
    }

   public function bloquear($cedula,$est) {

        try {
            
            $update = 'UPDATE usuarios SET estado = :es WHERE cedula = :ced';

            $up = $this->conexion->prepare($update);


            $up->bindParam(':ced', $cedula);
            $up->bindParam(':es',$est);
            $up->execute();


            echo "Bloqueo exitoso";
        } catch (Exception $exc) {
            echo "Bloqueo fallido". $exc->getTraceAsString();
        }
        }
        
    public function actualizar($cedula, $nombre, $apellido,$fecha, $correo, $contrasena) {

        try {
            $update = 'UPDATE usuarios set nombre = :nom, apellido = :ap, fechaNacimiento = :fe, correo = :co, contraseña = :con WHERE cedula = :ced';

            $up = $this->conexion->prepare($update);


            $up->bindParam(':ced', $cedula);
            $up->bindParam(':nom', $nombre);
            $up->bindParam(':ap', $apellido);
            $up->bindParam(':fe', $fecha);
            $up->bindParam(':co', $correo);
            $up->bindParam(':con', $contrasena);



            $up->execute();


            echo "Actualización exitosa";
        } catch (Exception $exc) {
            echo "Actualización fallida". $exc->getTraceAsString();
        }
        }

    public function estado($cedula, $est) {

        try {

            $update = 'UPDATE pagos SET estado = :es WHERE id_pagos = :ced';

            $up = $this->conexion->prepare($update);


            $up->bindParam(':ced', $cedula);
            $up->bindParam(':es', $est);
            $up->execute();


            echo "Bloqueo exitoso";
        } catch (Exception $exc) {
            echo "Bloqueo fallido" . $exc->getTraceAsString();
        }
    }
     

}
