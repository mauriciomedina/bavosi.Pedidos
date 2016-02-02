<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:22 AM
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/config.php");
require($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/model/Usuario.php");
class MVC {

    public $user;

    function __construct(){ $this->user = new Usuario(); }
    function __destruct() { unset($this); }

    /**
     * @param $user_name
     * @param $password
     * Hace el login en la aplicacion con las credenciales de usuario, de ser correcta crea el objeto session
     * De ser incorrectos vuelve a cargar el formulario de login informando el error
     */
    public function login_session($user_name,$password){
        if($this->user->check_credentials($user_name,$password)){
            session_start();
            $_SESSION["authenticate"] = true;
            $_SESSION["user_name"] = $this->user->user_name;
            $_SESSION["name"] = $this->user->name;
            $_SESSION["email"] = $this->user->email;
            $_SESSION["is_admin"] = $this->user->is_admin;
            $this->principal();
        }else{
            $this->login("Nombre de Usuario o Contrase&ntilde;a incorrecta");
        }
    }


    /**
     * @return bool
     * Autentica la sesion actual, de no existir carga el formulario de login
     */
    public function authenticate(){
        //Reanudamos la sesión
        @session_start();

        if(!$_SESSION["authenticate"]) {
            return false;
            exit();
        }
        return true;
    }

    /**
     * Destruye la sesion actual
     */
    public function exit_session(){
        session_start();
        session_destroy();
        $this->login();
    }

    /**
     * @param $page
     * @return string
     * METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
     */
    private function load_page($page){
        return file_get_contents($page);
    }

    /**
     * @param $in
     * @param $out
     * @param $pagina
     * @return mixed
     * PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
     */
    private function replace_content($in, $out,$pagina){
        return preg_replace($in, $out, $pagina);
    }

    /**
     * @param $html
     * METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
     */
    private function view_page($html){
        echo $html;
    }

    /**
     * @param string $title -> titulo para la ventana de la web
     * @return mixed|string $pagina -> contiene el codigo HTML final
     * METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
     */
    private function load_template($title='Sin Titulo'){
        $pagina = $this->load_page('view/page.html');
        $header = $this->load_page('view/sections/header.html');
        $sidebar = $this->load_page('view/sections/sidebar.html');
        $footer = $this->load_page('view/sections/footer.html');
        $pagina = $this->replace_content('/\{TITLE_PAGE\}/ms' ,$title , $pagina);
        $pagina = $this->replace_content('/\{SIDEBAR_PAGE\}/ms' ,$sidebar , $pagina);
        $pagina = $this->replace_content('/\{HEADER_PAGE\}/ms' ,$header , $pagina);
        $pagina = $this->replace_content('/\{FOOTER_PAGE\}/ms' ,$footer , $pagina);
        $pagina = $this->replace_content('/\{APP_VERSION\}/ms' ,APP_VERSION, $pagina);
        return $pagina;
    }

    function bienvenida(){
        $pagina=$this->load_template('BAVOSI | Pedidos');
        $html = $this->load_page('view/modules/bienvenida.html');
        $pagina = $this->replace_content('/\{CONTENT_PAGE\}/ms' ,$html , $pagina);
        $pagina = $this->replace_content('/\{appName\}/ms' ,$this->NAME_WEB_APP,$pagina);
        $this->view_page($pagina);
    }
}