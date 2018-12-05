$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="descripcion[]" maxlength = "50" placeholder="descripcion" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="date" name="fechaMan[]" maxlength="30" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="number" name="id_impresora[]" maxlength="25" placeholder="id_impresora" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tab").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});