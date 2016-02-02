<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 10:50 AM
 */
require_once($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/model/Usuario.php");
class UsuarioController extends Controller {


    function __construct() {
        parent::__construct();
    }

    function __destruct() {
        parent::__destruct();
        unset($this);
    }

    public function loginSession($user,$password){
        $usuario = new Usuario();
        if($usuario->check($user,$password)){
            session_start();
            $_SESSION["authenticate"] = true;
            $_SESSION["user"] = $usuario->getUser();
            $_SESSION["nombre"] = $usuario->getNombre();
            $_SESSION["email"] = $usuario->getEmail();
            $_SESSION["rol"] = $usuario->getRol();
            //return true;
        }else{
            $this->loginView("Nombre de Usuario o Pasword incorrectos.");
        }
    }

    public function authenticateSession(){
        @session_start();
        if(!$_SESSION["authenticate"]) {
            return false;
            exit();
        }
        return true;
    }

    public function exitSession(){
        session_start();
        session_destroy();
        // TODO : Exit OK
    }

    protected function loadTemplate($title = 'Sin Titulo')
    {
        $pagina = $this->loadPage('view/modules/usuario/login.html');
        $pagina = $this->replaceContent('/\{TITLE_PAGE\}/ms' ,$title , $pagina);
        return $pagina;
    }


    public function loginView($error = ""){
        $pagina = $this->loadTemplate('BAVOSI | Pedidos');
        $html = $this->loadPage('view/modules/home/home.html');
        if($error != ""){
            $pagina = $this->replaceContent('/\{ERROR\}/ms' ,$html , $pagina);
        }
        $this->viewPage($pagina);
    }
}