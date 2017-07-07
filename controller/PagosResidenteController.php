<?php

require_once(FOLDER_PROJECT . "/config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");

class PagosResidenteController {

    public $model;

    public function __CONSTRUCT() {
        $this->model = new Pago();
    }

    public function listar() {

        $resultado = $this->model->mostrarPagos();



        return $resultado;
    }

    public function guardar() {

        $pagos = new Pago();

        $pagos('id_apartamento', $_REQUEST['id_apartamento']);
        $pagos('tipo_pago', $_REQUEST['tipo_pago']);
        $pagos('referencia', $_REQUEST['referencia']);
        $pagos('valor', $_REQUEST['valor']);
        $pagos('fecha', $_REQUEST['fecha']);
        $pagos('estado', $_REQUEST['estado']);


        if (!empty($_FILES['url_documento']['name'])) {
            $url_documento = date('ymdhis') . '-' . strtolower($_FILES['url_documento']['name']);
            move_uploaded_file($_FILES['url_documento']['tmp_name'], 'uploads/' . $url_documento);

            $pagos->__SET('url_documento', $url_documento);
        }

        $this->model->Registrar($pagos);

        header('Location: ../view/app/residente/pagos.php');
    }

}
