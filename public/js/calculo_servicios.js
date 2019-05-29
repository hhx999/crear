(function() {
var total_costos = 0;
$('#costos_emprendimiento').on('blur','input', function(event) {
  actualizarTotal();
});
    function actualizarTotal() {
      var nuevoTotal = 0;

      $('#costos_emprendimiento .sumable').each(function () {
        var monto = parseFloat($(this).val());

        if (isNaN(monto)) {
        } else {
          nuevoTotal += monto;
        }
      });
      $('#total_costos').val(nuevoTotal);
    }
})();