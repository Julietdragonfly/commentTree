<?php
require_once __DIR__ . '/configuration.php';
class database Extends configuration  {
    private $connection;
    public $query1;

    function __construct() {
        $this->connection = @mysql_connect($this->db_host, $this->db_user,$this->db_password);
        if (!($this->connection))
            die('Database connection error');
        if (!(@mysql_select_db($this->db_name)))
            die('Database selection error');
        /*mysql_query("SET character_set_client=cp1251;");
        mysql_query("SET character_set_connection=cp1251;");
        mysql_query("SET character_set_results=cp1251;");*/
    }
    function queryAll($q) {
        $res = mysql_query($q);
        if (mysql_error())
            die(mysql_error());
        $ret = array() ;
        while ($row = mysql_fetch_array($res)){
            $ret[] = $row;
        }
        return $ret;
    }
    function query($q) {
        $this->query1 = mysql_query($q);
        if (mysql_error())
            die(mysql_error());

    }

    function fetch($num = NULL) {
        $array = array();
        if (mysql_error()) {
            echo mysql_error();
            die();
        }
        while ($row = mysql_fetch_assoc($this->query1)) {
            $array_ = array();
            foreach ($row as $key => $value) {
                $array_[$key] = $value;
            }
            array_push($array,$array_);
        }
        if ($num !== NULL)
            return $array[$num];
        else
            return $array;
    }


    function fetch_ass() {
        return mysql_fetch_assoc($this->query1);
    }
    function num_rows() {
        return mysql_num_rows($this->query1);
    }
    function affected_rows() {
        return mysql_affected_rows($this->query1);
    }

    function last_id() {
        return mysql_insert_id();
    }

    function real_escape($string) {
        return htmlspecialchars(mysql_real_escape_string($string));
    }

    function real_escape_array($array) {
        $result = array();
        foreach($array as $key=>$value) {
            $result[$key] = $this->real_escape($value);
        }
        return $result;
    }
}
