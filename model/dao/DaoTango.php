<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 02/02/2016
 * Time: 09:52 AM
 */
require_once('DataBase.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/bavosi.Pedidos/config.php");
class DaoTango {
    private $db;
    private static $instance;

    private function __construct($db_hostname, $db_username, $db_pass, $db_name) {
        $this->db = new DataBase($db_hostname, $db_username, $db_pass, $db_name);
    }

    private function getDao($db_hostname, $db_username, $db_pass, $db_name) {
        if(is_null(self::$instance)) {
            self::$instance = new DaoTango($db_hostname, $db_username, $db_pass, $db_name);
        }
        return self::$instance;
    }


    /**
     * @return DataBase
     */
    public static function getDb()
    {
        return self::getDao(DB_HOSTNAME_TANGO,DB_USERNAME_TANGO,DB_PASSWORD_TANGO,DB_NAME_TANGO)->db;
    }
}