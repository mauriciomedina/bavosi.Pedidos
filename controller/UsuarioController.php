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

    private function loadTemplateLogin($title = 'Sin Titulo')
    {
        $pagina = $this->loadPage('view/modules/usuario/login.html');
        $pagina = $this->replaceContent('/\{TITLE_PAGE\}/ms' ,$title , $pagina);
        return $pagina;
    }
    private function loadTemplateRegistro($title = 'Sin Titulo')
    {
        $pagina = $this->loadPage('view/modules/usuario/login.html');
        $pagina = $this->replaceContent('/\{TITLE_PAGE\}/ms' ,$title , $pagina);
        return $pagina;
    }

    public function login($user,$password){
        $usuario = new Usuario();
        if($usuario->check($user,$password)){
            session_start();
            $_SESSION["authenticate"] = true;
            $_SESSION["user"] = $usuario->getUser();
            $_SESSION["nombre"] = $usuario->getNombre();
            $_SESSION["email"] = $usuario->getEmail();
            $_SESSION["rol"] = $usuario->getRol();
            return true;
        }else{
            $this->viewLogin("Nombre de Usuario o Pasword incorrectos.");
        }
    }

    public function authenticate(){
        @session_start();
        if(!$_SESSION["authenticate"]) {
            return false;
            exit();
        }
        return true;
    }

    public function logout(){
        session_start();
        session_destroy();
    }

    public function registro($user, $nombre, $email, $password, $rol){
        $usuario = new Usuario();
        $usuario->add($user, $nombre, $email, $password, $rol);
    }

    public function viewLogin($error = ""){
        $pagina = $this->loadTemplateLogin('BAVOSI | Pedidos');
        if($error != ""){
            $pagina = $this->replaceContent('/\{ERROR\}/ms' ,$error , $pagina);
        }
        $this->viewPage($pagina);
    }

    public function viewRegistro($error = "") {
        $pagina = $this->loadTemplateRegistro('BAVOSI | Pedidos');
        if($error != ""){
            $pagina = $this->replaceContent('/\{ERROR\}/ms' ,$error , $pagina);
        }
        $this->viewPage($pagina);
    }
}