<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:07 AM
 * INDEX : recibe las peticiones GET / POST y determina que controlador actua
 */
require_once("controller/HomeController.php");
require_once("controller/UsuarioController.php");
$usuarioController = new UsuarioController();
$homeController = new HomeController();

if($usuarioController->authenticate()) {
    $vars = $_POST["modulo"] == "" ? "get" : "post";
    switch ($vars) {
        case "get" :
            $modulo = $_GET["modulo"];
            $page = $_GET["page"];
            switch ($modulo) {
                case "home" :
                    switch ($page) {
                        case "home" :
                            $homeController->viewBienvenida();
                            break;
                        default :
                            $homeController->viewBienvenida();
                    }
                    break;
                case "usuario" :
                    switch ($page) {
                        case "login" :
                            $usuarioController->viewLogin();
                            break;
                        case "registro" :
                            $usuarioController->viewRegistro();
                            break;
                        case "logout" :
                            $usuarioController->logout();
                            $usuarioController->viewLogin();
                            break;
                        case "perfil" :
                            $usuarioController->viewPerfil();
                            break;
                        default :

                    }
                    break;
                case "pedidos" :

                    break;
                default:
                    $homeController->viewBienvenida();
            }
            break;
        case "post" :
            $modulo = $_POST["modulo"];
            $proceso = $_POST["proceso"];
            switch ($modulo) {
                case "home" :
                    switch ($proceso) {
                        case "buscador" :
                            break;
                    }
                    break;
                case "usuario" :
                    switch ($proceso) {
                        case "login" :
                            if($usuarioController->login($_POST["user"], $_POST["password"])) {
                                $homeController->viewBienvenida();
                            }
                            break;
                        case "registro" :
                            $usuarioController->registro($_POST["user"], $_POST["nombre"], $_POST["email"], $_POST["password"],$_POST["rol"]);
                    }
            }
            break;
        default:
    }
} else if ($_POST["modulo"] == "usuario" && $_POST["proceso"] == "login"){
    if($usuarioController->login($_POST["user"], $_POST["password"])) {
        $homeController->viewBienvenida();
    }
} else {
    $usuarioController->viewLogin();
}

