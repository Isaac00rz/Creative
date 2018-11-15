$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td style="width: 11%; min-width: 11%;"><input type="text" name="Nombre[]" maxlength = "25" placeholder="Nombre" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="text"name="Dirección[]" maxlength = "15" placeholder="direccion" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="Colonia[]" min="1" placeholder="colonia" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="CP[]" min="1" placeholder="cp" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="Telefono[]" min="1" placeholder="telefono" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="Correo[]" min="1" placeholder="correo" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tab").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});