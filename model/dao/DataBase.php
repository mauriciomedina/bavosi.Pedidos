<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 28/01/2016
 * Time: 10:04 AM
 */

Class DataBase {
    private $hostname;
    private $user;
    private $pass;
    private $dbname;
    private $conn;

    function __construct($hostname, $user, $pass, $dbname)
    {
        $this->conn = null;
        $this->dbname = $dbname;
        $this->hostname = $hostname;
        $this->pass = $pass;
        $this->user = $user;
    }


    private function openConnection() {
        if(!is_null($this->conn)){
            $this->closeConnection();
        }
        $this->conn = mssql_connect($this->hostname,$this->user,$this->pass);
        if($this->dbname != "") {
            mssql_select_db($this->dbname, $this->conn);
        }
    }

    private function closeConnection() {
        mssql_close($this->conn);
    }

    public function executeQuery($query) {
        $this->openConnection();
        mssql_query($query,$this->conn);
        $this->closeConnection();
    }

    public function getResultsFromQuery($query){
        $this->openConnection();
        $rows = array();
        $result = mssql_query($query,$this->conn);
        while( $row = mssql_fetch_array($result) ){
            $rows[] = $row;
        }
        $this->closeConnection();
        return $rows;
    }
}