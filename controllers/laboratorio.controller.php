<?php
class ControladorLaboratorio
{
    // Crear o insertar laboratorios
    public static function ctrCrearLaboratorio()
    {
        if (isset($_POST["nuevoLaboratorio"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoLaboratorio"])) {
                $tabla = "laboratorios";
                $datos = array(
                    "laboratorio" => $_POST["nuevoLaboratorio"],
                    "descripcion" => $_POST["descripcionLaboratorio"]
                );
                $respuesta = ModeloLaboratorio::mdlIngresarLaboratorio($tabla, $datos);
                if ($respuesta == "OK") {
                    echo '<script>
                        swal({
                        type: "success",
                        title: "El laboratorio ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "laboratorio";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El laboratorio no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "laboratorio";
                            }
                        })
                </script>';
            }
        }
    }

    // Mostrar laboratorios
    public static function ctrMostrarLaboratorio($item, $valor)
    {
        $tabla = "laboratorios";
        $respuesta = ModeloLaboratorio::mdlMostrarLaboratorio($tabla, $item, $valor);
        return $respuesta;
    }

    // Editar laboratorios
    public static function ctrEditarLaboratorio()
    {
        if (isset($_POST["editarLaboratorio"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLaboratorio"])) {
                $tabla = "laboratorios";
                $datos = array(
                    "id" => $_POST["idLaboratorio"],
                    "laboratorio" => $_POST["editarLaboratorio"],
                    "descripcion" => $_POST["editarDescripcion"]
                );
                $respuesta = ModeloLaboratorio::mdlEditarLaboratorio($tabla, $datos);
                if ($respuesta == "OK") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡El laboratorio ha sido actualizado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "laboratorio";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El laboratorio no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "laboratorio";
                        }
                    })
                </script>';
            }
        }
    }

    // Eliminar laboratorios
    public static function ctrEliminarLaboratorio()
    {
        if (isset($_GET["idLaboratorio"])) {
            $tabla = "laboratorios";
            $datos = $_GET["idLaboratorio"];

            $respuesta = ModeloLaboratorio::mdlEliminarLaboratorio($tabla, $datos);

            if ($respuesta == "OK") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El laboratorio ha sido eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "laboratorio";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al eliminar el laboratorio",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "laboratorio";
                        }
                    });
                </script>';
            }
        }
    }
}
