<?php
//invocar al archivo
require_once "controllers/plantilla.controlador.php";
require_once "controllers/categoria.controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/laboratorio.controller.php";

// models
require_once "models/categorias.model.php";
require_once "models/productos.model.php";
require_once "models/laboratorio.model.php";

//instancia al controlador
$plantilla = new PlantillaControlador();
$plantilla->plantilla();
