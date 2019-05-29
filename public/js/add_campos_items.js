(function() {
    var campos_max = 10;   //max de 10 campos
    var x = 0;
        $('#add_itemFinan').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#item_financiamiento').append('            <div class="item_bien">\
                        	\<p>\ <select name="tipoItemFinan[]">\
                      <option value="BIENES DE CAPITAL">BIENES DE CAPITAL</option>\
                      <option value="CAPITAL DE TRABAJO">CAPITAL DE TRABAJO</option>\
                      <option value="INSTALACIONES">INSTALACIONES</option>\
                      <option value="OBRA CIVIL">OBRA CIVIL</option>\
                  </select>\
              </p>\
              <p class="monto_bienes">\
                <input placeholder="Descripcion" type="text" name="descItemFinan[]">\
              </p>\
              <div align="center">\
                      <input placeholder="Cantidad por año" class="multiplo" type="text" name="cantAnioItemFinan[]" id="cant_anio" class="ventas_grande">\
                      <input placeholder="Precio..." class="multiplo" type="text" name="precioItemFinan[]" id="precio">\
                      <input placeholder= "Total" type="text" id="totalItems" class="ventas_total" readonly>\
              <br>\ </div>\ <a href="#" class="remover_campo">Remover</a>\ </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#item_financiamiento').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
})();