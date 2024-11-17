// Editar producto
$(".tablaProductos").on("click", ".btnEditarProducto", function () {
    var idProducto = $(this).attr("idProducto"); 
    var datos = new FormData();
    datos.append("idProducto", idProducto);
  
    $.ajax({
      url: "ajax/productos.ajax.php",
      method: "POST", 
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        if (respuesta) {
          $("#editarDescripcion").val(respuesta["descripcion"]);
          $("#editarCodigo").val(respuesta["codigo"]);
          $("#editarLote").val(respuesta["lote"]); 
          $("#editarPrecioCompra").val(respuesta["precio_compra"]);
          $("#editarPrecioVenta").val(respuesta["precio_venta"]);
          $("#idCategoria").val(respuesta["id_categoria"]);
          $("#idLaboratorio").val(respuesta["id_laboratorio"]);
          $("#idProveedor").val(respuesta["id_proveedor"]);
          if(respuesta["imagen"] != "") {
            $("#imagenActual").val(respuesta["imagen"]);
          }
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se encontró el producto.",
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: "error", 
          title: "Error en la solicitud",
          text: "No se pudo completar la operación. Inténtalo de nuevo.",
        });
      },
    });
});
