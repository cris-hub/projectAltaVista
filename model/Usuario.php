<?php

require_once(FOLDER_PROJECT . '/config/context.php');

class Usuario {

    private $conexion;
    //--------------
    private $cedula;
    private $nombre;
    private $apellido;
    private $correo;
    private $estado;
    private $contraseña;

    public function __CONSTRUCT() {
        require_once(FOLDER_PROJECT . '/config/Conexion.php');
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function registrar($cedula, $nombre, $apellido, $fecha, $correo, $estado, $contrasena) {

        try {
            $insert = 'INSERT INTO usuarios VALUES(:ce, :nom, :ap, :fe, :co, :es, :con)';
            $into = $this->conexion->prepare($insert);


            $into->bindParam(':ce', $cedula);
            $into->bindParam(':nom', $nombre);
            $into->bindParam(':ap', $apellido);
            $into->bindParam(':fe', $fecha);
            $into->bindParam(':co', $correo);
            $into->bindParam(':es', $estado);
            $into->bindParam(':con', $contrasena);


            $into->execute();

            echo "Inserción exitosa";
        } catch (Exception $exc) {
            echo "No se pudo ejecutar la inserción" . $exc->getTraceAsString();
        }
    }

    public function consultar() {

        try {
            $result = array();

            $consula = $this->conexion->query("SELECT * FROM USUARIOS");

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

            $sql = 'SELECT * FROM usuarios WHERE cedula = :ced';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->execute();
            $resul = $consula->fetchAll();
            return $resul;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }

    public function consultarRoles($id) {

        try {

            $sql = 'SELECT * FROM usuarios_has_roles WHERE usuarios_cc = :ced';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->execute();
            $resul = $consula->fetchAll();
            return $resul;
        } catch (Exception $e) {

            echo $e->getTraceAsString();
            echo $e->getMessage();
        }
    }

    public function login($id, $con) {

        try {

            $sql = 'SELECT * FROM usuarios WHERE cedula = :ced and contraseña = :con';
            $consula = $this->conexion->prepare($sql);
            $consula->bindParam(':ced', $id);
            $consula->bindParam(':con', $con);
            $consula->execute();
            $resul = $consula->fetchAll();
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
            echo "No se pudo eliminar el usuario" . $exc->getTraceAsString();
        }
    }

    public function bloquear($cedula, $est) {

        try {

            $update = 'UPDATE usuarios SET estado = :es WHERE cedula = :ced';

            $up = $this->conexion->prepare($update);


            $up->bindParam(':ced', $cedula);
            $up->bindParam(':es', $est);
            $up->execute();


            echo "Bloqueo exitoso";
        } catch (Exception $exc) {
            echo "Bloqueo fallido" . $exc->getTraceAsString();
        }
    }

    public function actualizar($cedula, $nombre, $apellido, $fecha, $correo, $contrasena) {

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
            echo "Actualización fallida" . $exc->getTraceAsString();
        }
    }

}

?>