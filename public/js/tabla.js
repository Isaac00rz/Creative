$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td style="width: 11%; min-width: 11%;"><input type="text" name="modelo[]" placeholder="modelo" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="text"name="marca[]" placeholder="marca" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="existencias[]" min="1" placeholder="existencias" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="precio[]" min="1" placeholder="precio" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number" name="costo[]" min="1" placeholder="costo" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%;"><input type="number"name="pRenta[]" min="1" placeholder="precio de renta" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%"><input type="date" name="fCompra[]" required style="text-align: center; min-width:100%; width:100%;"></td>'
    tds += '<td style="width: 11%; min-width: 11%"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tabImpresoras").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});