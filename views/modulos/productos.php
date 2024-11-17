<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Categoria</th>
              <th>Laboratorio</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Lote</th>
              <th>Precio Mayor</th>
              <th>Precio Compra</th>
              <th>Precio Venta</th>
              <th>Imagen</th>
              <th>Fecha</th>
              <th>Calcular</th>
              <th>Cantidad</th>
              <th>Acciones</th>
            </tr> 
        </thead>
        <tbody>
            <?php
              // $item = null;
              // $valor = null;
              // $orden = "id  ";
              // // Obtener las categorías de la base de datos
              // $categorias = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
              // // Iterar sobre las categorías obtenidas
              // foreach ($categorias as $key => $value) {
              //   print_r($value);
              //   echo '<tr>
              //   <td>' . ($key + 1) . '</td> <!-- Índice de la categoría -->
              //   <td class="text-uppercase">' . $value["id_categoria"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["id_laboratorio"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["codigo"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["nombre"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["lote"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["precioMayor"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["PrecioCompra"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["PrecioVenta"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["imagen"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["Fecha"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["Calcular"] . '</td> <!-- Nombre de la categoría -->
              //   <td class="text-uppercase">' . $value["cantidad"] . '</td> <!-- Nombre de la categoría -->
              //   <td>
              //   <div class="btn-group">
              //           <!-- Botón para editar la categoría -->
              //           <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria">
              //               <i class="fa fa-pencil"></i>
              //           </button>
              //           <!-- Botón para eliminar la categoría -->
              //           <a href="index.php?ruta=categoria&idCategoria=' . $value["id"] . '" class="btn btn-danger btnEliminarCategoria"><i class="fa fa-times"></i></a>
              //       </div>
              //   </td>
              //   </tr>';
                    
               
              // }
            ?>
        </tbody>      
       </table>
      </div>
    </div>
  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control" id="nuevaCategoria" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategoria::ctrMostrarCategoria($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR LABORATORIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <select class="form-control" id="nuevoLaboratorio" name="nuevoLaboratorio" required>
                  
                  <option value="">Selecionar laboratorio</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $laboratorios = ControladorLaboratorio::ctrMostrarLaboratorio($item, $valor);

                  foreach ($laboratorios as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["laboratorio"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required autocomplete="off">

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA PRECIO VENTA -->

            <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA PRECIO POR MAYOR -->

            <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioMayor" name="nuevoPrecioMayor" step="any" min="0" placeholder="Precio por mayor" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editarCategoria" readonly required>
                  
                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR LABORATORIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <select class="form-control input-lg" name="editarLaboratorio" readonly required>
                  
                  <option id="editarLaboratorio"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA PRECIO VENTA -->

            <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA PRECIO POR MAYOR -->

            <div class="form-group row">

                <div class="col-xs-12">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioMayor" name="editarPrecioMayor" step="any" min="0" required>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>

<?php
  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();
?>      
