<?php 
    include('../Application/core/Inc.php');
    
    $iNivel = $_GET['iNivel'];
    $iPoints = Nivel::pontos($iNivel);

    $_SESSION['iPoints'] = $_SESSION['iPoints'] + $iPoints;
    echo "Pontua&ccedil;&atilde;o Total: " . $_SESSION['iPoints'];
?>