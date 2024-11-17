// Editar laboratorio
$(".tablas").on("click", ".btnEditarLaboratorio", function () {
    var idLaboratorio = $(this).attr("idLaboratorio"); // Asegúrate de que el botón tiene este atributo
    var datos = new FormData();
    datos.append("idLaboratorio", idLaboratorio);
  
    $.ajax({
      url: "ajax/laboratorio.ajax.php", // Cambié la URL para que apunte al archivo adecuado
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        // Verificar si la respuesta tiene datos
        if (respuesta) {
          $("#editarLaboratorio").val(respuesta["laboratorio"]); // Asigna el nombre del laboratorio al input
          $("#idLaboratorio").val(respuesta["id"]); // Asigna el ID del laboratorio al input oculto
          $("#editarDescripcion").val(respuesta["descripcion"]); // Asigna la descripción del laboratorio al input
        } else {
          // Si no se recibió respuesta válida
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se encontró el laboratorio.",
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Manejo de errores en la solicitud
        Swal.fire({
          icon: "error",
          title: "Error en la solicitud",
          text: "No se pudo completar la operación. Inténtalo de nuevo.",
        });
      },
    });
  });
  