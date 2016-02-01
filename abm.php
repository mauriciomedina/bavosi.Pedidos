<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 29/01/2016
 * Time: 07:04 PM
 */

//mssql_connect('localhost\sqlexpress', "sa", "omega");

?>
<! DOCTYPE html>
<html>
<head>
    <title>ABM</title>
    <link rel="stylesheet" href="css/bootstrap-yeti.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/renglones.js"></script>
    <style>
        .none {
            display: none;
        }
        #detalle button {
            padding: 6px;
            height: auto;
        }
        #detalle input[type=text] {
            padding: 4px;
            height: auto;
            font-size: 12px;
        }
        #alta_modal .control-label, input[type=text],input[type=number]{
            padding: 4px;
            height: auto;
            font-size: 12px;
        }
        #filtroArticulosModal {
            min-height: auto;
            max-height: 100px;
            border: solid 1px #ccc;
        }
        #filtroArticulosModal #tablaModal td {
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 4px;
            padding-right: 0px;
        }
        #tablaModal th {
            background-color: #eee;
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 4px;
            padding-right: 0px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>ABM</h1>
        <div class="">
            <table id="detalle" class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-left"></th>
                        <th class="text-left">Codigo</th>
                        <th class="text-left" width="300">Descripción</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">D1 %</th>
                        <th class="text-right">D2 %</th>
                        <th class="text-right">D3 %</th>
                        <th class="text-right">D.Total %</th>
                        <th class="text-right">IVA</th>
                        <th class="text-right" width="140">SubTotal</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="renglones">
                    <tr id="linea_01">
                        <td><input id="buscar_01" name="buscar_01" class="form-control codigo" type="text" placeholder="Buscar..." autocomplete="off"></td>
                        <td><input id="codigo_01" name="codigo_01" class="form-control codigo" type="text" autocomplete="off"></td>
                        <td><input id="descripcion_01" name="descripcion_01" class="form-control" type="text" autocomplete="off" readonly></td>
                        <td><input type="number" id="cantidad_01" name="cantidad_01" class="form-control text-right valor" autocomplete="off"></td>
                        <td><input type="text" id="precio_01" name="precio_01" class="form-control text-right valor" autocomplete="off"></td>
                        <td><input type="text" id="dto1_01" name="dto1_01" class="form-control text-right valor" autocomplete="off"></td>
                        <td><input type="text" id="dto2_01" name="dto2_01" class="form-control text-right valor" autocomplete="off"></td>
                        <td><input type="text" id="dto3_01" name="dto3_01" class="form-control text-right valor" autocomplete="off"></td>
                        <td><input type="text" id="dto_01" name="dto_01" class="form-control text-right valor" autocomplete="off" readonly></td>
                        <td><input type="text" id="iva_01" name="iva_01" class="form-control" readonly></td>
                        <td><input type="text" id="total_01" name="total_01"class="form-control text-right" autocomplete="off" readonly></td>
                        <td><button type="button" id="confirma_01" name="confirma_01" class="form-control btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></button></td>
                        <td><button type="button" id="cancela_01" name="cancela_01" class="form-control btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button></td>
                    </tr>
                    <!--<tr id="linea_add"><td><button type="button" id="nuevaLinea" name="nuevaLinea" onclick="nuevaLinea()">Nueva linea</button></td></tr>-->
                </tbody>
            </table>
        </div>

    </div>

    <button id="bt_myModal" class="none" data-toggle="modal" data-target="#myModal"></button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Busqueda de Articulos</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="buscarArticulo" name="buscarArticulo" class="form-control">
                    <input type="hidden" id="sufijoModal" name="sufijoModal">
                    <div id="filtroArticulosModal" class="table-responsive">
                        <table id="tablaModal" class="table table-condensed table-bordered">
                            <thead>
                                <tr><th>Articulo</th></tr>
                            </thead>
                            <tbody>
                            <?php
                                echo "<tr><td><a href='javascript:getArticuloModal(30600)'>30600 - ATUN EJEMPLO</td></a></td></tr>";
                                echo "<tr><td><a href='javascript:getArticuloModal(30202)'>30202 - PALMITOS CUMANA</td></a></td></tr>";
                                echo "<tr><td><a href='javascript:getArticuloModal(10101)'>10101 - AJI</td></a></td></tr>";
                                echo "<tr><td><a href='javascript:getArticuloModal(10101/25)'>10101/25 - AJI x 25 kgs</td></a></td></tr>";
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="form-horizontal" id="alta_modal">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Articulo</label>
                            <div class="col-md-2">
                                <input type="text" id="codigo_modal" name="codigo_modal" class="form-control text-right" readonly>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="descripcion_modal" name="descripcion_modal" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cantidad</label>
                            <div class="col-md-4">
                                <input type="number" id="cantidad_modal" name="cantidad_modal" class="form-control text-right">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Precio</label>
                            <div class="col-md-2">
                                <input type="text" id="precio_modal" name="precio_modal" class="form-control text-right">
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="dto1_modal" name="dto1_modal" class="form-control text-right" placeholder="Dto. 1 %">
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="dto2_modal" name="dto2_modal" class="form-control text-right" placeholder="Dto. 2 %">
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="dto3_modal" name="dto3_modal" class="form-control text-right" placeholder="Dto. 3 %">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Subtotal</label>
                            <div class="col-md-4">
                                <input type="text" id="total_modal" name="total_modal" class="form-control text-right" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="aceptarModal" name="aceptarModal" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>