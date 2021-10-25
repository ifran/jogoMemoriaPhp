<?php
    $_SESSION['iPoints'] = 0;

    if (empty($_POST['iNivel']) OR empty($_POST['iPersonagem'])) {
        header('location:Home');
        die();
    }
    
    $iNivel = $_POST['iNivel'];
    $iPersonagem = $_POST['iPersonagem'];

    if ($iPersonagem == 1) {
        $sFunctionPerso = 'waterPower();';
    } else if ($iPersonagem == 2) {
        $sFunctionPerso = 'airPower();';
    } else if ($iPersonagem == 3) {
        $sFunctionPerso = 'firePower();';
    } else if ($iPersonagem == 4) {
        $sFunctionPerso = 'earthPower();';
    }

    $sNivel     = Nivel::name($iNivel);
    $iPontosPar = Nivel::pontosPar($iNivel);
    $iDuration  = Nivel::tempo($iNivel);
    $iParCol    = Nivel::par($iNivel);
    $sDivMain   = Nivel::divName($iNivel);
 
    $oCarta = new Carta();
    $aImagem = $oCarta->selectCartas($iNivel);
    
    $aNivel  = $oCarta->nivelValor($iNivel);
    $iParCorreto  = $aNivel['iParCorreto'];
    $iNumCartas = $iParCorreto * 2;
?>
<style>
    <?php $iLinha = 1; foreach ($aImagem as $oItem) { ?>
    .card__inner<?=$iLinha?> {
        width: 100%;
        height: 100%;
        transition: transform 1s;
        transform-style: preserve-3d;
        cursor: pointer;
        position: relative;
    }

    .card__inner<?=$iLinha?>.is-flipped {
        transform: rotateY(180deg);
    }
    <?php $iLinha++; } ?> 
</style>
<div class="album py-5 bg-light bgBlack">
    <button onclick="<?=$sFunctionPerso?>" id="oBtnPower">Poder</button>
    <div id="progressbar1" class="progressbar"></div>
    <div class="container">
        <!-- <button style="height:50px;width:500px" onclick="earthPower()">Poder de terra</button> -->
        <div id="oPontuacao" style="color:black;">Pontua&ccedil;&atilde;o Total: 0</div>
        <div id="oPontuacaoRodada" style="color:black;">Pontua&ccedil;&atilde;o da Rodada: 0</div>
        <div class="row row-cols-2 row-cols-sm-5 row-cols-md-<?=$iParCol?> g-3 <?=$sDivMain?>" id="oDivPrinc">
        </div>
        <input id="iNumCartas" value="<?=$iNumCartas?>" type="hidden">
        <input id="iParCorreto" value="<?=$iParCorreto?>" type="hidden">
    </div>
</div>
<form method="post" id="oFormEndgame" action="End">
    <input type="hidden" value="<?=$iPersonagem?>" id="iPersonagem" name="iPersonagem">
    <input type="hidden" value="<?=$iNivel?>" id="iNivel" name="iNivel">
    <input type="hidden" value="<?=$iDuration?>" id="iDuration" name="iDuration">
    <input type="hidden" value="<?=$iPontosPar?>" id="iPontosPar" name="iPontosPar">
    <input type="hidden" value="1" id="bCanUsePower" name="bCanUsePower">
    <input type="hidden" value="0" id="iPontosRodada" name="iPontosRodada">
</form>
<script src="<?=GAME_PATH_JS?>inGame.js?v=<?=$iV?>" type="text/javascript"></script>