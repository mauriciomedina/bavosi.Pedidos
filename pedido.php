<?php

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Main view</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/renglones.js"></script>
    <style>
        .none {
            display: none;
        }

        input[type=date],input[type=date] {
            line-height: normal;
        }
        textarea {
            resize: none;
        }
        .control-label, .form-control{
            padding: 4px;
            height: auto;
            font-size: 11px;
            color: #000000;
        }
        #alta_modal .control-label input[type=text], input[type=number]{
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

<div id="wrapper">

<?php require("modules/sidebar.php");?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Nuevo Pedido</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a>Pedidos</a>
                    </li>
                    <li class="active">
                        <strong>Nuevo Pedido</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="">
                    <div class="col-md-9">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Encabezado del Pedido <small>Puede minimizar estos datos para trabajar mas comodo.</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Numero:</label>
                                        <div class="col-md-2">
                                            <input type="text" id="numero" name="numero" class="form-control text-right" readonly>
                                        </div>
                                        <label class="col-md-1 control-label">Estado:</label>
                                        <div class="col-md-2">
                                            <input type="text" id="estado" name="estado" class="form-control text-right" readonly>
                                        </div>
                                        <label class="col-md-1 control-label">Fecha:</label>
                                        <div class="col-md-2">
                                            <input type="date" id="fechaCreacion" name="fechaCreacion" class="form-control text-right">
                                        </div>
                                        <label class="col-md-1 control-label">Talonario:</label>
                                        <div class="col-md-2">
                                            <select id="talonario" name="talonario" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" >Bonif.Recibo:</label>
                                        <div class="col-md-1">
                                            <input type="text" id="bonificacionRecibo" name="bonificacionRecibo" class="form-control"/>
                                        </div>
                                        <label class="col-md-1 control-label" >Deposito:</label>
                                        <div class="col-md-2">
                                            <select id="deposito" name="deposito" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </div>
                                        <label class="col-md-1 control-label" >Vendedor:</label>
                                        <div class="col-md-4">
                                            <input id="vendedor" name="vendedor" class="form-control" type="text"/>
                                        </div>
                                        <label class="col-md-1 control-label" >Comision:</label>
                                        <div class="col-md-1">
                                            <input id="comision" name="comision" class="form-control" type="text" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" >Cliente:</label>
                                        <div class="col-md-4">
                                            <input type="text" id="cliente" name="cliente" class="form-control"/>
                                        </div>
                                        <label class="col-md-1 control-label" >Condicion:</label>
                                        <div class="col-md-2">
                                            <input id="condicionVentaHabitual" name="condicionVentaHabitual" class="form-control" type="text" readonly/>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="condicionVentaPedido" name="condicionVentaPedido" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" >Direccion:</label>
                                        <div class="col-md-2">
                                            <select id="direccionEntrega" name="direccionEntrega" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 control-label" >Detalle Entrega:</label>
                                        <div class="col-md-7">
                                            <input id="direccionEntregaDetalle" name="direccionEntregaDetalle" class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" >Transporte:</label>
                                        <div class="col-md-2">
                                            <select id="transporte" name="transporte" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 control-label" >Fecha de Entrega:</label>
                                        <div class="col-md-2">
                                            <input id="fechaEntrega" name="fechaEntrega" class="form-control" type="date"/>
                                        </div>
                                        <label class="col-md-2 control-label" >Hora de Entrega:</label>
                                        <div class="col-md-2">
                                            <input id="horaEntrega" name="horaEntrega" class="form-control" type="time"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-1" >Leyen. 1:</label>
                                        <div class="col-md-3">
                                            <input id="leyenda1" name="leyenda1" class="form-control" type="text"/>
                                        </div>
                                        <label class="control-label col-md-1" >Leyen. 2:</label>
                                        <div class="col-md-3">
                                            <input id="leyenda2" name="leyenda2" class="form-control" type="text"/>
                                        </div>
                                        <label class="control-label col-md-1" >Leyen. 3:</label>
                                        <div class="col-md-3">
                                            <input id="leyenda3" name="leyenda3" class="form-control" type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Observaciones del Pedido</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea id="observacionesVendedor" name="observacionesVendedor" class="form-control" rows="15"></textarea>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label" >Logistica:</label>
                                            <textarea id="observacionesLogistica" name="observacionesLogistica" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Detalle del Pedido <small>Puede minimizar estos datos para trabajar mas comodo.</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="detallePedido">
                                    <table id="detalle" class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="text-left" ></th>
                                            <th class="text-left" >Codigo</th>
                                            <th class="text-left" width="200">Descripción</th>
                                            <th class="text-right" >Cantidad</th>
                                            <th class="text-right" >Precio</th>
                                            <th class="text-right" >D1 %</th>
                                            <th class="text-right" >D2 %</th>
                                            <th class="text-right" >D3 %</th>
                                            <th class="text-right" >D. %</th>
                                            <th class="text-right" >IVA</th>
                                            <th class="text-right" >SubTotal</th>
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
                                    <div class="form-horizontal .altaModal" id="alta_modal">
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
                </div>
            </div>
        </div>

        <?php require("modules/footer.php");?>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
