/**Buscador Avanzado, carga los modelos disponibles segun marca seleccionada
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


<div class="mb-3">
  <label for="modelo" class="form-label">Modelo:</label>
  <div id="modelo" name="modelo"></div>
</div>
*/

//nouiSlider Año
let defaultMinYear = 2005;
let defaultMaxYear = new Date().getFullYear();

let minYearElement = document.getElementById("minYear");
let maxYearElement = document.getElementById("maxYear");

let minyear = minYearElement ? parseInt(minYearElement.textContent) || defaultMinYear : defaultMinYear;
let maxyear = maxYearElement ? parseInt(maxYearElement.textContent) || defaultMaxYear : defaultMaxYear;

var sliderYear = document.getElementById("yrRange");
noUiSlider.create(sliderYear, {
  start: [minyear, maxyear],
  connect: true,
  range: {
    min: minyear,
    max: maxyear,
  },
  step: 1,
  format: {
    to: function (value) {
      return `${value}`;
    },
    from: function (value) {
      return Number(value.replace(/\D/g, ""));
    },
  },
});

var minValueyr = document.getElementById("minYear");
var maxValueyr = document.getElementById("maxYear");

sliderYear.noUiSlider.on("update", function (values) {
  minValueyr.innerHTML = values[0];
  maxValueyr.innerHTML = values[1];
  document.getElementById("minYearInput").value = minValueyr.innerHTML;
  document.getElementById("maxYearInput").value = maxValueyr.innerHTML;
});


//noUiSlider Precio
var sliderPrecio = document.getElementById("precio");

noUiSlider.create(sliderPrecio, {
  start: [0, 50000000],
  connect: true,
  range: {
    min: 0,
    max: 50000000,
  },
  step: 500000,
  format: {
    to: function (value) {
      return `$${new Intl.NumberFormat().format(value)}`;
    },
    from: function (value) {
      return Number(value.replace(/\D/g, ""));
    },
  },
});

var minValuePr = document.getElementById("minPrecio");
var maxValuePr = document.getElementById("maxPrecio");

sliderPrecio.noUiSlider.on("update", function (values) {

  minValuePr.innerHTML = values[0];
  maxValuePr.innerHTML = values[1];

  document.getElementById("minPrecioInput").value = sliderPrecio.noUiSlider.options.format.from(values[0]);
  document.getElementById("maxPrecioInput").value = sliderPrecio.noUiSlider.options.format.from(values[1]);

});

//Validaciones / Sanitizaciones de Inputs
function soloNumeros(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " 0123456789"; //caracteres permitidos
  especiales = "8-37-39-46"; //teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

  tecla_especial = false;
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

  tecla_especial = false;
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
