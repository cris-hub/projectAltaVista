<?php

class Pago {

    private $conexion;
    //--------------
    private $id_pagos;
    private $id_apartamento;
    private $tipo_pago;
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

    public function registrar($pago) {
        try {
            $sql = "INSERT INTO PAGOS (id_apartamento, tipo_pago, referencia, valor, fecha, estado, url_documento)
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->conexion->prepare($sql)->execute(
                    array(
                        $pago->id_apartamento,
                        $pago->tipo_pago,
                        $pago->referencia,
                        $pago->valor,
                        $pago->fecha,
                        $pago->estado,
                        $pago->url_documento
                    )
            );
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function actualizar($pago) {
        try {
            $sql = "UPDATE pagos SET
                    id_apartamento    = ?,
                    tipo_pago  = ?,
                    referencia           = ?,
                    valor           = ?,
                    fecha  = ?,
                    estado  = ?,
                    url_documento  = ?
                    WHERE id_pago = ?";
            $this->conexion->prepare($sql)->execute(
                    array(
                        $pago->id_apartamento,
                        $pago->tipo_pago,
                        $pago->referencia,
                        $pago->valor,
                        $pago->fecha,
                        $pago->estado,
                        $pago->url_documento,
                        $pago->id_pagos
                    )
            );
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function mostrarPagos() {

        try {
            $result = array();

            $consula = $this->conexion->query("SELECT * FROM PAGOS");

            while ($filas = $consula->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $filas;
            }
            return $this->result;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function mostrarPago($id) {

        try {
            $sql = "SELECT * FROM pagos WHERE id_pagos = ?";


            $r = $this->conexion->prepare($sql);
            $r->execute(array($id));
            return $r->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo die($exc->getMessage());
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
