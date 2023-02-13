<?php

abstract class AbstractManager 
{
    
    protected  PDO $db;
    private  string $dbName;
    private  string $port;
    private  string $host;
    private  string $username;
    private  string $password;


   public  function __construct(string $dbname, string $port, string $host, string $username, string $password) 
   { 
       $this->dbname = $dbname; $this->port = $port; 	  $this->host = $host; 
       $this->username = $username; 
       $this->password = $password; 
       $this->db = new  PDO( 
    	 "mysql:host=$host;
    	  port=$port;
    	  dbname=$dbname",
    	  $username, 
    	  $password 
        ); 
   }
}


?>