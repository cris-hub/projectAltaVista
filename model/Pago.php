<?php

class Pago {

    private $conexion;
    private $idPago;
    private $idApartamento;
    private $tipoPago;
    private $referencia;
    private $valor;
    private $fecha;
    private $estado;
    private $url_documento;

   public function __CONSTRUCT() {
        require_once(FOLDER_PROJECT . '/config/Conexion.php');
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function registrar( $idap, $ti,$re, $va, $fe, $es) {

        try {
            $insert = 'INSERT INTO pagos (id_apartamento, tipo_pago, referencia, valor, fecha, estado)  VALUES( :nom, :ap, :fe, :co, :es, :con)';
            $into = $this->conexion->prepare($insert);

            $into->bindParam(':nom', $idap);
            $into->bindParam(':ap', $ti);
            $into->bindParam(':fe', $re);
            $into->bindParam(':co', $va);
            $into->bindParam(':es', $fe);
            $into->bindParam(':con', $es);
           


            $into->execute();
            
            echo "Inserción exitosa";
        } catch (Exception $exc) {
            echo "No se pudo ejecutar la inserción". $exc->getTraceAsString();
        }
            
        
    }

    public function consultar() {

        try {
            $result = array();

            $consula = $this->conexion->query("SELECT * FROM pagos");

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
            
            $sql='SELECT * FROM pagos  WHERE id_apartamento = :ids';
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
    
       public function login($id,$con) {

        try {
            
            $sql='SELECT * FROM usuarios WHERE cedula = :ced and contraseña = :con';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->bindParam(':con', $con);
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


