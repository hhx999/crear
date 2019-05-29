(function() {
   var campos_max = 10;   //max de 10 campos
        var x = 0;
        var venta = '<div id="ventas'+x+'">\ <hr>\
                                <input placeholder="Producto o servicio..." type="text" name="nombre_producto[]">\ <input placeholder="Unidad de medida..." id="ud_medida" type="text" name="unidad_medida[]">\ <div align="center">\ <input placeholder="Cantidad por año" type="text" name="cant_anio[]" id="cant_anio" class="ventas_grande">\ <input placeholder="Precio..." type="text" name="precio[]" id="precio" class="ventas_grande">\ <input placeholder= "Total" type="text" name="total[]" id="total" class="ventas_total" readonly>\ </div>\ <a href="#" class="remover_campo">Remover</a>\ </div>';

        $('#add_venta').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#ventas_financiamiento').append(venta);
                        x++;
                }
        });
        // Remover o div anterior
        $('#ventas_financiamiento').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();