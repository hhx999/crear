(function() {
        var disponibilidad = '<div id="disponibilidad" class="item_bien">\ <p>\ <select id="disponibilidades" name="disponibilidades[]">\ <option value="Efectivo">EFECTIVO</option>\ <option value="Cuentas bancarias">CUENTAS BANCARIAS</option>\ <option value="Créditos por ventas">CRÉDITOS POR VENTAS</option>\ <option value="Otros créditos">OTROS CRÉDITOS</option>\ </select>\ </p>\ <p class="monto_bienes">\ <input placeholder="Monto" type="text" name="monto_disponibilidad[]">\ </p> \ <a href="#" class="remover_campo">Remover</a>\ </div>';
        var bien = '<div id="bien_cambio" class="item_bien">\
        <p>\
          <select id="bienes_cambio" name="bienes_cambio[]">\
              <option value="Mercaderías">MERCADERÍAS </option>\
              <option value="Materia prima">MATERIA PRIMA</option>\
              <option value="Insumos">INSUMOS</option>\
          </select>\
        </p>\
        <p class="monto_bienes">\
          <input placeholder="Monto" type="text" name="monto_bienescambio[]">\
        </p>\ <a href="#" class="remover_campo">Remover</a>\
      </div>';
        var bien_uso = '<div id="bien_uso" class="item_bien">\
        <p>\
            <select id="bienes_uso" name="bienes_uso[]">\
                <option value="Inmuebles">INMUEBLES </option>\
                <option value="Rodados">RODADOS</option>\
            </select>\
        </p>\
        <p class="monto_bienes">\
          <input placeholder="Monto" type="text" name="monto_bienesuso[]">\
        </p>\ <a href="#" class="remover_campo">Remover</a>\
      </div>\
        ';
        var deuda_comercial = '<div id="deuda_comercial" class="item_bien">\
            <p>\
                <select id="deudas_comerciales" name="deudas_comerciales[]">\
                    <option value="En cuentas corrientes">EN  CUENTAS CORRIENTES </option>\
                    <option value="Cheques de pago diferido">CHEQUES DE PAGO DIFERIDO</option>\
                    <option value="Documentadas">DOCUMENTADAS</option>\
                    <option value="Otros">OTRAS</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dcomercial[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>';
        var deuda_bancaria = '<div id="deuda_bancaria" class="item_bien">\
            <p>\
                <select id="deudas_bancarias" name="deudas_bancarias[]">\
                    <option value="En cuentas corrientes">EN  CUENTAS CORRIENTES </option>\
                    <option value="Cheques de pago diferido">CHEQUES DE PAGO DIFERIDO</option>\
                    <option value="Documentadas">DOCUMENTADAS</option>\
                    <option value="Otros">OTRAS</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dbancaria[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>\
        ';
        var deuda_fiscal = '<div id="deuda_fiscal" class="item_bien">\
            <p>\
                <select id="deudas_fiscales" name="deudas_fiscales[]">\
                    <option value="AFIP">AFIP</option>\
                    <option value="Rentas Río Negro">RENTAS RÍO NEGRO</option>\
                    <option value="Tributos municipales">TRIBUTOS MUNICIPALES</option>\
                    <option value="Deudas sociales (Aportes, contribuciones, salarios, etc)">DEUDAS SOCIALES (Aportes, contribuciones, salarios, etc)</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dfiscal[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>\
        ';

          $('#add_disponibilidad').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#disponibilidades').append(disponibilidad);
          });
          // Remover o div anterior
          $('#disponibilidades').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_bien').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#bienes_cambio').append(bien);
          });
          // Remover o div anterior
          $('#bienes_cambio').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_bienuso').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#bienes_uso').append(bien_uso);
          });
          // Remover o div anterior
          $('#bienes_uso').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudacomercial').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_comerciales').append(deuda_comercial);
          });
          // Remover o div anterior
          $('#deudas_comerciales').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudabancaria').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_bancarias').append(deuda_bancaria);
          });
          // Remover o div anterior
          $('#deudas_bancarias').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudafiscal').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_fiscales').append(deuda_fiscal);
          });
          // Remover o div anterior
          $('#deudas_fiscales').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
          
})();
