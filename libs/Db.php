<?php

class Db {
    static public function connect() {
        $configArray = parse_ini_file("../../../ecom.ini");
        $host = $configArray['host'];
        $username = $configArray['username'];
        $password = $configArray['password'];
        $database = $configArray['database'];
        return mysqli_connect($host, $username, $password, $database);
    }
    
    static public function doQuery($sql) {
        $Db = new Db();
        $query = mysqli_query($Db->connect(), $sql);
        return $query;
    }
    
    static public function getSingleEntry($sql) {
        $Db = new Db();
        $result = $Db->doQuery($sql);
        $getResult = mysqli_fetch_assoc($result);
        return $getResult;
    }
    
    static public function getAllEntries($sql) {
        $Db = new Db();
        $result = $Db->doQuery($sql);
        $data = array();
        while($getResult = mysqli_fetch_assoc($result)) {
            $data[] = $getResult;
        }
        return $data;
    }
}

?>