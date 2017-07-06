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

    public function registrar($cedula, $nombre, $apellido,$fecha, $correo, $estado, $contrasena) {

        try {
            $insert = 'INSERT INTO usuarioS VALUES(:ce, :nom, :ap, :fe, :co, :es, :con)';
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
            echo "No se pudo ejecutar la inserción". $exc->getTraceAsString();
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

    //---- FUNÇÃO DE EXCLUSÃO DE DADOS---- //

    public function eliminar($id) {

        $delete = 'delete from usuario where id="' . $id . '"';

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($delete);
    }

    //---- FUNÇÃO DE EDIÇÃO DE DADOS---- //

    public function actualzizar($nome, $email, $senha, $id) {

        $update = 'update usuario set nome="' . $nome . '", email="' . $email . '" , senha="' . $senha . '" where id="' . $id . '"';

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Linha = mysqli_num_rows($Acesso->result);

        $this->Result = $Acesso->result;
    }

}

?>