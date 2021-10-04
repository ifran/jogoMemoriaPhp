<?php 
    include ('Const.php');
    include '../autoload.php';
    
    $oCon = new Database();
    $oReturn = $oCon->query("SELECT * FROM carta");

    while ($linha = $oReturn->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome: {$linha['carta_img']} - Usuário: {$linha['carta_img']}<br />";
    }
?>