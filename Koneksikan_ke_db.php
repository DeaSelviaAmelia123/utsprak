<?php

 
class Koneksikan_ke_db
{ 
    private $con;
  
    function __construct()
    {
		
    }
  
    function connect()
    {
        
        include_once dirname(__FILE__) . '/Koneksi.php'; 
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if (mysqli_connect_errno()) {
            echo "Gagal koneksi ke MySQL: " . mysqli_connect_error();
            return null;
        }
 
        return $this->con;
    }
 
}