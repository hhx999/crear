(function() {
      var cant_anio = 0;
      var precio = 0;
      var total = 0;
      var total_final = 0;

      $("#financiamiento").on("blur", 'input', function(event){
        
        if ($(this).attr('id') == 'cant_anio') {
          cant_anio = $(this).val();
          total = calculo(cant_anio,precio);
        }
        if ($(this).attr('id') == 'precio') {
          precio = $(this).val();
          total = calculo(cant_anio,precio);
        }
        total = calculo(cant_anio,precio);
        if ($(this).attr('id') == 'totalItems') {
          console.log(total);
          total_final = parseFloat(total_final)+parseFloat(total); 
          $(this).val(total);
        }
        $('#totalItems_completo').val(total_final);
        }).trigger('blur');

        function calculo(x,y) {
          if (isNaN(x)) {
            x = 0;
          }
          if (isNaN(y)) {
            y = 0;
          }
          total = parseFloat(x) * parseFloat(y);
          return total;
        }

        total = 0;
        total_final = 0;
})();