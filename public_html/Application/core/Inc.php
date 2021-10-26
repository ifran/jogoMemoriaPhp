<?php session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/Application/core/Const.php');
    
    // No local atual da pasta
    include(GAME_PATH_CORE  . 'Database.php');

    include(GAME_PATH_MODEL . 'Nivel.php');
    include(GAME_PATH_MODEL . 'Carta.php');
    include(GAME_PATH_MODEL . 'Ranking.php');
?>