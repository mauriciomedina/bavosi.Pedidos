<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 10:03 AM
 */
require_once('DataBase.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/config.php");
class DaoPedidos {
    private $db;
    private static $instance;

    private function __construct($db_hostname, $db_username, $db_pass, $db_name) {
        $this->db = new DataBase($db_hostname, $db_username, $db_pass, $db_name);
    }

    private function getDao($db_hostname, $db_username, $db_pass, $db_name) {
        if(is_null(self::$instance)) {
            self::$instance = new DaoPedidos($db_hostname, $db_username, $db_pass, $db_name);
        }
        return self::$instance;
    }


    /**
     * @return DataBase
     */
    public static function getDb()
    {
        return self::getDao(DB_HOSTNAME_PEDIDOS,DB_USERNAME_PEDIDOS,DB_PASSWORD_PEDIDOS,DB_NAME_PEDIDOS)->db;
    }
}