//Buscador Avanzado, carga los modelos disponibles segun marca seleccionada
$(document).ready(function() {
    cargaselectmodelo();
    $('#marca').change(function() {
      cargaselectmodelo();
    });
})
  
function cargaselectmodelo() {
    $.ajax({
      type: "POST",
      url: "funciones/busquedaAvanzadaModelo.php",
      data: "marca=" + $('#marca').val(),
      success: function(r) {
        $('#modelo').html(r);
      }
    });
}

//Validaciones / Sanitizaciones de Inputs
function soloNumeros(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " 0123456789"; //caracteres permitidos
  especiales = "8-37-39-46"; //teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

  tecla_especial = false
  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
}

function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz"; //caracteres permitidos
  especiales = "8-37-39-46"; //teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

  tecla_especial = false
  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
}