<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:22 AM
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/config.php");
abstract class Controller {

    function __construct() {
    }
    function __destruct() {
        unset($this);
    }

    /**
     * @param $page
     * @return string
     * METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
     */
    protected function loadPage($page){
        return file_get_contents($page);
    }

    /**
     * @param $in
     * @param $out
     * @param $pagina
     * @return mixed
     * PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
     */
    protected function replaceContent($in, $out,$pagina){
        return preg_replace($in, $out, $pagina);
    }

    /**
     * @param $html
     * METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
     */
    protected function viewPage($html){
        echo $html;
    }

    /**
     * @param string $title -> titulo para la ventana de la web
     * @return mixed|string $pagina -> contiene el codigo HTML final
     * METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
     */
    protected function loadTemplate($title='Sin Titulo'){
        $pagina = $this->loadPage('view/page.html');
        $header = $this->loadPage('view/shared/header.html');
        $sidebar = $this->loadPage('view/shared/sidebar.html');
        $footer = $this->loadPage('view/shared/footer.html');
        $pagina = $this->replaceContent('/\{TITLE_PAGE\}/ms' ,$title , $pagina);
        $pagina = $this->replaceContent('/\{SIDEBAR_PAGE\}/ms' ,$sidebar , $pagina);
        $pagina = $this->replaceContent('/\{HEADER_PAGE\}/ms' ,$header , $pagina);
        $pagina = $this->replaceContent('/\{FOOTER_PAGE\}/ms' ,$footer , $pagina);
        $pagina = $this->replaceContent('/\{APP_VERSION\}/ms' ,APP_VERSION, $pagina);
        return $pagina;
    }
}