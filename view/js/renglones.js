/**
 * Created by gmartin on 29/01/2016.
 */
var cantRenglones = 1;

$(document).ready(function(){
    $("#buscarArticulo").keyup(function(){
        if( $(this).val() != ""){
            $("#tablaModal tbody>tr").hide();
            $("#tablaModal td:contiene-palabra('" + $(this).val() + "')").parent("tr").show();
        } else {
            $("#tablaModal tbody>tr").show();
        }
    });

    $.extend($.expr[":"],
    {
        "contiene-palabra": function(elem, i, match, array) {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#buscarArticulo').focus();
    });

    $('#myModal').on('hidden.bs.modal', function(e)
    {
        var sufijo = $('#sufijoModal').val();
        $('#buscarArticulo').val("");
        $('#sufijoModal').val("");
        $('#codigo_modal').val("");
        $('#descripcion_modal').val("");
        $('#cantidad_modal').val("");
        $('#precio_modal').val("");
        $('#dto1_modal').val("");
        $('#dto2_modal').val("");
        $('#dto3_modal').val("");

        $("#buscar"+sufijo).focus();
    }) ;

    $("#aceptarModal").click(function () {
        aceptarArticuloModal($("#sufijoModal").val());
    });

    $("#buscar_01").focus();
    $("#buscar_01").keypress(function(e){
        if(e.keyCode == 13){
            getArticulo(this);
        }
    });

    $("#confirma_01").click(function(){
        nuevaLinea();
    });
    $("#cancela_01").click(function(){
        if(cantRenglones == 1){
            alert("no puede eliminar la unica lina");
        } else {
            $("#linea_01").remove();
            cantRenglones--;
        }
    });

    $(".valor").change(function(){
        recalcular(this);
    });
});



function recalcular(input) {
    var sufijo = input.id.substring(input.id.indexOf("_"));

    var cantidad = $("#cantidad" + sufijo).val();
    var precio = $("#precio" + sufijo).val();
    var descuento = $("#dto" + sufijo).val();
    var subtotal = (cantidad * precio);
    var total = subtotal - subtotal*descuento/100;
    $("#neto" + sufijo).val(total);
}

function getArticulo(input) {
    var sufijo = input.id.substring(input.id.indexOf("_"));

    $.post(
        "phpscripts/getArticulo.php",
        {codigo: $("#buscar"+sufijo).val()},
        function(data){
            var obj = $.parseJSON(data);
            if(obj.codigo){
                $("#buscar"+sufijo).val("");
                $("#codigo"+sufijo).val(obj.codigo);
                $("#descripcion"+sufijo).val(obj.descripcion);
                $("#precio"+sufijo).val(obj.precio);
                $("#codigo"+sufijo).attr('disabled', true);
                $("#cantidad"+sufijo).focus();
                //nuevaLinea();
            } else {
                $("#bt_myModal").click();
                $('#sufijoModal').val(sufijo);
                $("#buscarArticulo").val(input.value);
            }
        }
    );
}

function getArticuloModal(codArticulo) {
    $.post(
        "phpscripts/getArticulo.php",
        {codigo: codArticulo},
        function(data){
            var obj = jQuery.parseJSON(data);
            if(obj.codigo){
                $("#codigo_modal").val(obj.codigo);
                $("#descripcion_modal").val(obj.descripcion);
                $("#precio_modal").val(obj.precio);
                $("#codigo_modal").attr('disabled', true);
                $("#cantidad_modal").focus();
                //nuevaLinea();
            }
        }
    );
}

function aceptarArticuloModal(sufijo) {
    $("#buscar"+sufijo).val("");
    $("#codigo"+sufijo).val($("#codigo_modal").val());
    $("#descripcion"+sufijo).val($("#descripcion_modal").val());
    $("#precio"+sufijo).val($("#precio_modal").val());
    $("#cantidad"+sufijo).val($("#cantidad_modal").val());
    $("#codigo"+sufijo).attr('disabled', true);
    $("#myModal").hide();
    $("#confirma"+sufijo).focus();
}

function nuevaLinea() {
    //$("#linea_add").remove();
    cantRenglones++;
    var sufijo;

    if(cantRenglones < 10){
        sufijo = "_0" + cantRenglones;
    } else {
        sufijo = "_" + cantRenglones;
    }
    var tr = "<tr id='linea" + sufijo + "'>";
        tr +="<td><input id='buscar" + sufijo + "' name='buscar" + sufijo + "' class='form-control codigo' type='text' placeholder='Buscar...' autocomplete='off'></td>";
        tr +="<td><input id='codigo" + sufijo + "' name='codigo" + sufijo + "' class='form-control codigo' type='text' autocomplete='off'></td>";
        tr +="<td><input id='descripcion" + sufijo + "' name='descripcion" + sufijo + "' class='form-control' type='text' autocomplete='off' readonly></td>";
        tr +="<td><input type='number' id='cantidad" + sufijo + "' name='cantidad" + sufijo + "' class='form-control text-right valor' autocomplete='off'></td>";
        tr +="<td><input type='text' id='precio" + sufijo + "' name='precio" + sufijo + "' class='form-control text-right valor' autocomplete='off'></td>";
        tr +="<td><input type='text' id='dto1" + sufijo + "' name='dto1" + sufijo + "' class='form-control text-right valor' autocomplete='off'></td>";
        tr +="<td><input type='text' id='dto2" + sufijo + "' name='dto2" + sufijo + "' class='form-control text-right valor' autocomplete='off'></td>";
        tr +="<td><input type='text' id='dto3" + sufijo + "' name='dto3" + sufijo + "' class='form-control text-right valor' autocomplete='off'></td>";
        tr +="<td><input type='text' id='dto" + sufijo + "' name='dto" + sufijo + "' class='form-control text-right valor' autocomplete='off' readonly></td>";
        tr +="<td><input type='text' id='iva" + sufijo + "' name='iva" + sufijo + "' class='form-control' readonly></td>";
        tr +="<td><input type='text' id='total" + sufijo + "' name='total" + sufijo + "'class='form-control text-right' autocomplete='off' readonly></td>";
        tr +="<td><button type='button' id='confirma" + sufijo + "' name='confirma" + sufijo + "' class='form-control btn-sm btn-success'><i class='glyphicon glyphicon-ok'></i></button></td>";
        tr +="<td><button type='button' id='cancela" + sufijo + "' name='cancela" + sufijo + "' class='form-control btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></button></td>";
        tr +="</tr>";

    $("#renglones").append(tr);

    $("#buscar" + sufijo).keypress(function(e){
        if(e.keyCode == 13){
            getArticulo(this);
        }
    });

    $("#confirma" + sufijo).click(function(){
        nuevaLinea();
    });
    $("#cancela" + sufijo).click(function(){
        $("#linea" + sufijo).remove();
        cantRenglones--;
    });

    $(".valor").change(function(){
        recalcular(this);
    });

    $("#buscar" + sufijo).focus();
}