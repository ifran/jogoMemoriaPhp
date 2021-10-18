<?php 
    // Banco de dados
    DEFINE('DB_SGBD'     , 'mysql');
    DEFINE('DB_HOST'     , 'localhost');
    DEFINE('DB_NAME'     , 'memory');
    DEFINE('DB_USER'     , 'root');
    DEFINE('DB_PASSWORD' , '');
    
    // Caminho para aplicacao
    DEFINE('GAME_HOST_LOCAL'     , 'C:/xampp/htdocs/Jogo/');
    DEFINE('GAME_PATH_APP'        , GAME_HOST_LOCAL . 'Application/');
    DEFINE('GAME_PATH_CORE'       , GAME_PATH_APP   . 'core/');
    DEFINE('GAME_PATH_CONTROLLER' , GAME_PATH_APP   . 'controllers/');
    DEFINE('GAME_PATH_VIEW'       , GAME_PATH_APP   . 'views/');
    DEFINE('GAME_PATH_MODEL'      , GAME_PATH_APP   . 'models/');
    
    // Caminho para public
    DEFINE('GAME_HOST_PUBLIC'     , 'http://127.0.0.1/Jogo/');
    DEFINE('GAME_PATH_PUBLIC'     , GAME_HOST_PUBLIC  . 'public/assets/');
    
    DEFINE('GAME_PATH_CSS'        , GAME_PATH_PUBLIC . 'css/');
    DEFINE('GAME_PATH_JS'         , GAME_PATH_PUBLIC . 'js/');
    DEFINE('GAME_PATH_IMG'        , GAME_PATH_PUBLIC . 'img/');
    DEFINE('GAME_PATH_IMG_DB'     , GAME_PATH_PUBLIC . 'imgGame/');

    // Niveis e valores 
    DEFINE('NIVEL_FACIL'          , 1);
    DEFINE('NIVEL_FACIL_PAR'      , 2);
    DEFINE('NIVEL_FACIL_TEMPO'    , 10);
    DEFINE('NIVEL_FACIL_PONTOS'   , 10);

    DEFINE('NIVEL_MEDIO'          , 2);
    DEFINE('NIVEL_MEDIO_PAR'      , 3);
    DEFINE('NIVEL_MEDIO_TEMPO'    , 30);
    DEFINE('NIVEL_MEDIO_PONTOS'   , 20);

    DEFINE('NIVEL_DIFICIL'        , 3);
    DEFINE('NIVEL_DIFICIL_PAR'    , 4);
    DEFINE('NIVEL_DIFICIL_TEMPO'  , 50);
    DEFINE('NIVEL_DIFICIL_PONTOS' , 30);
?>