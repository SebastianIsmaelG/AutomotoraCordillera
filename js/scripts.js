
$(document).ready(function() {
    cargaselectmodelo();
    $('#marca').change(function() {
      cargaselectmodelo();
    });
})
  
function cargaselectmodelo() {
    $.ajax({
      type: "POST",
      url: "paginas_funciones/select_busqueda_avanzada1.php",
      data: "marca=" + $('#marca').val(),
      success: function(r) {
        $('#modelo').html(r);
      }
    });
}

//Alert de confirmacion de formulario
document.addEventListener("DOMContentLoaded", function () {
  const params = new URLSearchParams(window.location.search);
  if (params.get("success") === "1") {  // Verifica el valor del parámetro
      alert("✅ Cotización enviada con éxito!");
      history.replaceState({}, document.title, window.location.pathname); // Limpia la URL
  }
});

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