(function() {
        var disponibilidad_g = '<div id="disponibilidad_g" class="item_bien">\ <p>\ <select id="disponibilidades_g" name="disponibilidades[]">\ <option value="Efectivo">EFECTIVO</option>\ <option value="Cuentas bancarias">CUENTAS BANCARIAS</option>\ <option value="Créditos por ventas">CRÉDITOS POR VENTAS</option>\ <option value="Otros créditos">OTROS CRÉDITOS</option>\ </select>\ </p>\ <p class="monto_bienes">\ <input placeholder="Monto" type="text" name="monto_disponibilidad[]">\ </p> \ <a href="#" class="remover_campo">Remover</a>\ </div>';
        var bien_g = '<div id="bien_cambio_g" class="item_bien">\
        <p>\
          <select id="bienes_cambio_g" name="bienes_cambio_g[]">\
              <option value="Mercaderías">MERCADERÍAS </option>\
              <option value="Materia prima">MATERIA PRIMA</option>\
              <option value="Insumos">INSUMOS</option>\
          </select>\
        </p>\
        <p class="monto_bienes">\
          <input placeholder="Monto" type="text" name="monto_bienescambio_g[]">\
        </p>\ <a href="#" class="remover_campo">Remover</a>\
      </div>';
        var bien_uso_g = '<div id="bien_uso_g" class="item_bien">\
        <p>\
            <select id="bienes_uso_g" name="bienes_uso_g[]">\
                <option value="Inmuebles">INMUEBLES </option>\
                <option value="Rodados">RODADOS</option>\
            </select>\
        </p>\
        <p class="monto_bienes_g">\
          <input placeholder="Monto" type="text" name="monto_bienesuso_g[]">\
        </p>\ <a href="#" class="remover_campo">Remover</a>\
      </div>\
        ';
        var deuda_comercial_g = '<div id="deuda_comercial_g" class="item_bien">\
            <p>\
                <select id="deudas_comerciales_g" name="deudas_comerciales_g[]">\
                    <option value="En cuentas corrientes">EN  CUENTAS CORRIENTES </option>\
                    <option value="Cheques de pago diferido">CHEQUES DE PAGO DIFERIDO</option>\
                    <option value="Documentadas">DOCUMENTADAS</option>\
                    <option value="Otros">OTRAS</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dcomercial_g[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>';
        var deuda_bancaria_g = '<div id="deuda_bancaria_g" class="item_bien">\
            <p>\
                <select id="deudas_bancarias_g" name="deudas_bancarias_g[]">\
                    <option value="En cuentas corrientes">EN  CUENTAS CORRIENTES </option>\
                    <option value="Cheques de pago diferido">CHEQUES DE PAGO DIFERIDO</option>\
                    <option value="Documentadas">DOCUMENTADAS</option>\
                    <option value="Otros">OTRAS</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dbancaria_g[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>\
        ';
        var deuda_fiscal_g = '<div id="deuda_fiscal_g" class="item_bien">\
            <p>\
                <select id="deudas_fiscales_g" name="deudas_fiscales_g[]">\
                    <option value="AFIP">AFIP</option>\
                    <option value="Rentas Río Negro">RENTAS RÍO NEGRO</option>\
                    <option value="Tributos municipales">TRIBUTOS MUNICIPALES</option>\
                    <option value="Deudas sociales (Aportes, contribuciones, salarios, etc)">DEUDAS SOCIALES (Aportes, contribuciones, salarios, etc)</option>\
                </select>\
            </p>\
            <p class="monto_bienes">\
              <input placeholder="Monto" type="text" name="monto_dfiscal_g[]">\
            </p>\ <a href="#" class="remover_campo">Remover</a>\
          </div>\
        ';

          $('#add_disponibilidad_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#disponibilidades_g').append(disponibilidad_g);
          });
          // Remover o div anterior
          $('#disponibilidades_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_bien_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#bienes_cambio_g').append(bien_g);
          });
          // Remover o div anterior
          $('#bienes_cambio_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_bienuso_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#bienes_uso_g').append(bien_uso_g);
          });
          // Remover o div anterior
          $('#bienes_uso_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudacomercial_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_comerciales_g').append(deuda_comercial_g);
          });
          // Remover o div anterior
          $('#deudas_comerciales_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudabancaria_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_bancarias_g').append(deuda_bancaria_g);
          });
          // Remover o div anterior
          $('#deudas_bancarias_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
           $('#add_deudafiscal_g').click (function(e) {
                  e.preventDefault();     //prevenir novos clicks
                  $('#deudas_fiscales_g').append(deuda_fiscal_g);
          });
          // Remover o div anterior
          $('#deudas_fiscales_g').on("click",".remover_campo",function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          });
})();
          