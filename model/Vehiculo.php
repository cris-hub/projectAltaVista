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
class Vehiculo {

    private $pdo;
    private $idVehiculo;
    private $idUsuario;
    private $idTipoVehiculo;
    private $marca;
    private $placa;

    public function __CONSTRUCT() {
        require_once(FOLDER_PROJECT . '/config/Conexion.php');
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function registrar($id, $idusuario, $tipo ,$marca, $placa) {

        try {
            $insert = 'INSERT INTO vehiculos VALUES(:id, :idu, :tip, :mar, :pla)';
            $into = $this->conexion->prepare($insert);


            $into->bindParam(':id', $id);
            $into->bindParam(':idu', $idusuario);
            $into->bindParam(':tip', $tipo);
            $into->bindParam(':mar', $marca);
            $into->bindParam(':pla', $placa);
          


            $into->execute();
            
            echo "Inserción exitosa";
        } catch (Exception $exc) {
            echo "No se pudo ejecutar la inserción". $exc->getTraceAsString();
        }
            
        
    }

    public function consultar() {

        try {
            $result = array();

            $consula = $this->conexion->query("SELECT * FROM vehiculos");

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
            
            $sql='SELECT * FROM vehiculos WHERE id_usuarios = :ced';
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
    
    //---- FUNÇÃO DE EXCLUSÃO DE DADOS---- //

    public function eliminar($id) {

        try {
            $delete = 'DELETE FROM vehiculos WHERE id_vehiculo = :v';
            $result = $this->conexion->prepare($delete);
            $result->bindParam(':v', $id);
            $result->execute();
            echo "Eliminación exitosa";
        } catch (Exception $exc) {
            echo "No se pudo eliminar el usuario". $exc->getTraceAsString();
        }
    
    }
     
    public function consultarExtra($placa){
            
            
        try {
            
            $sql='SELECT v.placa, s.fecha_solicitud, p.estado, p.id_parqueadero  FROM vehiculos as v join solicitudes as s on v.id_vehiculo = s.id_vehiculo join parqueaderos as p on s.id_parqueadero= p.id_parqueadero WHERE v.placa = :p LIMIT 0, 1000';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':p', $placa);
            $consula->execute();
            $resul= $consula->fetchAll();
            return $resul;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
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

        
       
}
