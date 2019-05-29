        var campos_max = 10;   //max de 10 campos
        var x = 0;
        function generarItem(opcion,nombre) {
          console.log(nombre);
        var item = '<div id="item">\ <hr>\
                                <input value='+nombre+' type="text" name="nombre_'+opcion+'[]" readonly>\ <input placeholder="Descripcion..." id="desc_'+opcion+'" type="text" name="desc_'+opcion+'[]">\ <div align="center">\ <input placeholder="Cantidad" type="text" name="cant_'+opcion+'[]" id="cant_'+opcion+'" class="ventas_grande">\ <input placeholder="Precio unitario" type="text" name="precio_'+opcion+'[]" id="precio_'+opcion+'" class="ventas_grande">\ <input placeholder= "Total" type="text" name="total_'+opcion+'[]" id="total_'+opcion+'" class="ventas_total" readonly>\ </div>\ <a href="#" class="remover_campo">Remover</a>\ </div>';
        return item;
        }

        $('#add_bienes').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                $('#item_bienes').append(generarItem('bienes',"Bienes_de_capital"));
        });
        $('#add_capital').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                $('#item_bienes').append(generarItem('capital',"Capital_de_trabajo"));
        });
        $('#add_obra').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                $('#item_bienes').append(generarItem('obra',"Obra_civil"));
        });
        // Remover o div anterior
        $('#item_bienes').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
      var cant = 0;
      var precio = 0;
      var total = 0;
      var total_final = 0;


      $("#item_bienes").on("blur", 'input', function(event){
        if ($(this).attr('id') == 'cant_bienes') {
          cant = $(this).val();
        }
        if ($(this).attr('id') == 'precio_bienes') {
          precio = $(this).val();
        }
        total = calculo(cant,precio);
        if ($(this).attr('id') == 'total_bienes') {
          total_final = parseFloat(total_final)+parseFloat(total); 
          $(this).val(total);
        }

        total = 0;
        }).trigger('blur');

        $("#item_bienes").on("blur", 'input', function(event){
        if ($(this).attr('id') == 'cant_capital') {
          cant = $(this).val();
        }
        if ($(this).attr('id') == 'precio_capital') {
          precio = $(this).val();
        }
        total = calculo(cant,precio);
        if ($(this).attr('id') == 'total_capital') {
          total_final = parseFloat(total_final)+parseFloat(total); 
          $(this).val(total);
        }

        total = 0;
        }).trigger('blur');

        $("#item_bienes").on("blur", 'input', function(event){
        if ($(this).attr('id') == 'cant_obra') {
          cant = $(this).val();
        }
        if ($(this).attr('id') == 'precio_obra') {
          precio = $(this).val();
        }
        total = calculo(cant,precio);
        if ($(this).attr('id') == 'total_obra') {
          total_final = parseFloat(total_final)+parseFloat(total); 
          $(this).val(total);
        }

        total = 0;
        }).trigger('blur');

        function calculo(x,y) {
          total = parseFloat(x) * parseFloat(y);
          return total;
        }