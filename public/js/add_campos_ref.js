(function() {
  var campos_max = 10;   //max de 10 campos

        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div>\ <hr>\
                                <input placeholder="Nombre y apellido/Institución" type="text" name="nombre_ref[]">\ <input placeholder="Localidad..." type="text" name="localidad_ref[]">\ <input placeholder="Telefono..." type="text" name="telefono_ref[]">\ <a href="#" class="remover_campo">Remover</a>\ </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();