<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 10:51 AM
 */
require_once('Controller.php');
class HomeController extends Controller {


    function __construct() {
        parent::__construct();
    }
    function __destruct() {
        parent::__destruct();
        unset($this);
    }

    public function bienvenidaView(){
        $pagina = $this->loadTemplate('BAVOSI | Pedidos');
        $html = $this->loadPage('view/modules/home/home.html');
        $pagina = $this->replaceContent('/\{CONTENT_PAGE\}/ms' ,$html , $pagina);
        $this->viewPage($pagina);
    }

}