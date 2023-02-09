<?php

abstract class AbstractManager{
    protected PDO $db;
    private string $dbName;
    private string $port;
    private string $host;
    private string $username;
    private string $password;
    
    public function __construct(string $dbName,string $port,string $host,string $username,$password){
        $this->db = new PDO(
            "mysql:host=$host;port=$port;dbname=$dbName",
            "$username",
            "$password"
        );
        $this->dbName = $dbName;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }
    
    
    public function render(string $view, array $values) : void
    {
        
        
        require 'views/layout.phtml';
    }
    
}


?>