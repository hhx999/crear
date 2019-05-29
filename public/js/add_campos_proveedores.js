(function() {
   var campos_max = 10;   //max de 10 campos

        var x = 0;
        $('#add_proveedor').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#proveedores_mercado').append('<div>\ <hr>\
                                <input placeholder="Nombre o razón social..." type="text" name="nombre_proveedor[]">\ <input placeholder="Ubicación..." type="text" name="ubicacion_proveedor[]">\ <input placeholder="Compra..." type="text" name="compra_proveedor[]">\ <a href="#" class="remover_campo">Remover</a>\ </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#proveedores_mercado').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();