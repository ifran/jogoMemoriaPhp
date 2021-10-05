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

        function selectQuery($sSql) 
        {
            $oReturn = $this->query($sSql);
            
            $aRetorno = array();
            while ($linha = $oReturn->fetch(PDO::FETCH_ASSOC)) {
                // echo "Nome: {$linha['carta_img']} - Usuário: {$linha['carta_img']}<br />";
                $aRetorno[] = $linha;
            }

            return $aRetorno;
        }
    }
?>