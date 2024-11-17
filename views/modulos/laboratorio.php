<div class="page-wrapper">
    <div class="content-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">ADMINISTRAR LABORATORIOS</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                Administrar Laboratorios
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLaboratorio">
                        Agregar laboratorio
                    </button>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dt-responsive tablas">
                        <thead>
                            <tr>

                                <th style="width:10px">#</th>
                                <th>Nombre Laboratorio</th>
                                <th>Descripción</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            // Obtener los laboratorios de la base de datos
                            $laboratorios = ControladorLaboratorio::ctrMostrarLaboratorio($item, $valor);
                            // Iterar sobre los laboratorios obtenidos
                            foreach ($laboratorios as $key => $value) {
                                // Mostrar cada fila con los datos de id, nombre y descripción
                                echo '<tr>
            <td>' . ($key + 1) . '</td> <!-- Índice del laboratorio -->
            <td class="text-uppercase">' . $value["laboratorio"] . '</td> <!-- Nombre del laboratorio -->
            <td>' . $value["descripcion"] . '</td> <!-- Descripción del laboratorio -->
            <td>
                <div class="btn-group">
                    <!-- Botón para editar el laboratorio -->
                    <button class="btn btn-warning btnEditarLaboratorio" idLaboratorio="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarLaboratorio">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <!-- Botón para eliminar el laboratorio -->
                    <a href="index.php?ruta=laboratorio&idLaboratorio=' . $value["id"] . '" class="btn btn-danger btnEliminarLaboratorio"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- MODAL AGREGAR LABORATORIO -->
    <div id="modalAgregarLaboratorio" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="post">
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar laboratorio</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoLaboratorio" placeholder="Ingresar laboratorio" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <textarea class="form-control input-lg" name="descripcionLaboratorio" placeholder="Ingresar descripción" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar laboratorio</button>
                    </div>
                    <?php
                    $crearLaboratorio = new ControladorLaboratorio();
                    $crearLaboratorio->ctrCrearLaboratorio();
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL EDITAR LABORATORIO -->
    <div id="modalEditarLaboratorio" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="post">
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar laboratorio</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarLaboratorio" id="editarLaboratorio" placeholder="Editar laboratorio" required>
                                    <input type="hidden" name="idLaboratorio" id="idLaboratorio" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <textarea class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" placeholder="Editar descripción" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                    <?php
                    $editarLaboratorio = new ControladorLaboratorio();
                    $editarLaboratorio->ctrEditarLaboratorio();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$eliminarLaboratorio = new ControladorLaboratorio();
$eliminarLaboratorio->ctrEliminarLaboratorio();
?>
