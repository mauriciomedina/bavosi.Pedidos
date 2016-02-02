<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:07 AM
 * INDEX : recibe las peticiones GET / POST y determina que controlador actua
 */
/*
$home = new HomeController();
$home->bienvenidaView();
$usuario = new UsuarioController();
$usuario->loginView();

require($_SERVER['DOCUMENT_ROOT'] . '/bavosi.Pedidos/model/dao/DaoTango.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bavosi.Pedidos/model/dao/DaoPedidos.php');
$result = DaoTango::getDb()->getResultsFromQuery("SELECT CATALOG_NAME FROM INFORMATION_SCHEMA.SCHEMATA");
$result = DaoSAVX::getDb()->getResultsFromQuery("SELECT CATALOG_NAME FROM SAVX.INFORMATION_SCHEMA.SCHEMATA");
*/
require_once("controller/HomeController.php");
require_once("controller/UsuarioController.php");

$postAction = $_POST["action"];
$getAction = $_GET["action"];
$usuarioController = new UsuarioController();
$homeController = new HomeController();

switch ($postAction) {
    case "login" :
        if($usuarioController->loginSession($_POST["user"],$_POST["password"])){
            $homeController->bienvenidaView();
        }
        break;
    default:
        $usuarioController->loginView();
}