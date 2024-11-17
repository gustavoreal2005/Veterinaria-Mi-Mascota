<?php
require_once "../controllers/laboratorio.controller.php";
require_once "../models/laboratorio.model.php";

class AjaxLaboratorio {
    public $idLaboratorio;

    public function ajaxEditarLaboratorio() {
        $item = "id";
        $valor = $this->idLaboratorio;

        // Llama al controlador para obtener el laboratorio con el id especificado
        $respuesta = ControladorLaboratorio::ctrMostrarLaboratorio($item, $valor);

        // Devuelve la respuesta en formato JSON
        echo json_encode($respuesta);
    }
}

// Procesa la petición AJAX si se envía un idLaboratorio
if (isset($_POST["idLaboratorio"])) {
    $editar = new AjaxLaboratorio();
    $editar->idLaboratorio = $_POST["idLaboratorio"];
    $editar->ajaxEditarLaboratorio();
}
