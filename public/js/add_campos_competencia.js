(function() {
    var campos_max = 10;   //max de 10 campos
    var x = 0;
        $('#add_competencia').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#competencia_mercado').append('<div>\ <hr>\
                                <input placeholder="Nombre o razón social..." type="text" name="nombre_competencia[]">\ <input placeholder="Ubicación..." type="text" name="ubicacion_competencia[]">\ <input placeholder="Qué ofrece..." type="text" name="ofrece_competencia[]">\ <a href="#" class="remover_campo">Remover</a>\ </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#competencia_mercado').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();