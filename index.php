<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:07 AM
 * INDEX : recibe las peticiones GET / POST y determina que controlador actua
 */

require("controller/HomeController.php");
$home = new HomeController();
$home->bienvenida();
/*

require($_SERVER['DOCUMENT_ROOT'] . '/bavosi.Pedidos/model/dao/DaoTango.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bavosi.Pedidos/model/dao/DaoPedidos.php');
$result = DaoTango::getDb()->getResultsFromQuery("SELECT CATALOG_NAME FROM INFORMATION_SCHEMA.SCHEMATA");
$result = DaoSAVX::getDb()->getResultsFromQuery("SELECT CATALOG_NAME FROM SAVX.INFORMATION_SCHEMA.SCHEMATA");

*/