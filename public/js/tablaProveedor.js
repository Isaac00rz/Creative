$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="nombre[]" maxlength = "20" placeholder="nombre" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="pApellido[]" maxlength = "20" placeholder="primer apellido" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text"name="sApellido[]" maxlength = "20" placeholder="segundo apellido" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="direccion[]" maxlength="30" placeholder="dirección" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="colonia[]" maxlength="25" placeholder="colonia" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="number" name="CP[]" min="1" placeholder="CP" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="tel"name="celular[]" placeholder="4774567890" pattern="[0-9]{10}" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="tel" name="telFijo[]" placeholder="4774567890" pattern="[0-9]{10}" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="email" name="correo[]" maxlength = "35" placeholder="e-mail" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="descripcion[]" maxlength = "250" placeholder="descripción" style="text-align: center; min-width:100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tab").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});