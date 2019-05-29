(function() {
var campos_max = 10;   //max de 10 campos

        var x = 0;
        $('#add_cliente').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#clientes_mercado').append('<div>\ <hr>\
                                <input placeholder="Nombre y apellido..." type="text" name="nombre_cliente[]">\ <input placeholder="Edad..." type="text" name="edad_cliente[]">\ <input placeholder="Ubicación..." type="text" name="ubicacion_cliente[]">\ <input placeholder="Nivel socio-económico..." type="text" name="nivel_cliente[]">\ <input placeholder="Intereses..." type="text" name="intereses_cliente[]">\ <a href="#" class="remover_campo">Remover</a>\ </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#clientes_mercado').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();