<?php

    class Database extends PDO
    {
        function __construct() 
        {
            parent::__construct('mysql:host=localhost;dbname=memory', 'root', '');
        }

        function executeQuery($sSql) 
        {
            $this->exec('INSERT INTO carta (carta_img) VALUES (666)');
        }
    }
?>