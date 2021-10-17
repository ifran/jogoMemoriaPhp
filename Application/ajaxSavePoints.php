<?php 
    include('../Application/core/Inc.php');
    
    if (isset($_GET['bLose']) AND $_GET['bLose'] == 1) 
    {
        $sSql = 'INSERT INTO ranking (ranking_pontos, ranking_nivel, ranking_personagem) 
        VALUES  (' . $_SESSION['iPoints'] . '
                , ' . $_GET['iPersonagem'] . '
                , ' . $_GET['iNivel'] . ')';

        $oDatabase = new Database();
        $oDatabase->executeQuery($sSql);
    }

    $_SESSION['iPoints'] = $_SESSION['iPoints'] + 10;
    echo "Pontuacao: " . $_SESSION['iPoints'];
?>