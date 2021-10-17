<?php
    $_SESSION['iPoints'] = 0;

    if (empty($_POST)) {
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

    if ($iNivel == 1) {
        $sNivel    = 'F&aacute;cil';
        $iDuration = NIVEL_FACIL_TEMPO;
    } else if ($iNivel == 2) {
        $sNivel    = 'M&eacute;dio';
        $iDuration = NIVEL_MEDIO_TEMPO;
    } else if ($iNivel == 3) {
        $sNivel    = 'Dif&iacute;cil';
        $iDuration = NIVEL_DIFICIL_TEMPO;
    }

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
<div class="album py-5 bg-light mainDivEasy bgBlack">
    <h1 style="color:black"><?=$sNivel?></h1>
    <div id="progressbar1" class="progressbar"></div>
    <button onclick="<?=$sFunctionPerso?>">Poder - <?=$sFunctionPerso?></button>
    <div class="container">
        <!-- <button style="height:50px;width:500px" onclick="earthPower()">Poder de terra</button> -->
        <div id="oPontuacao" style="color:black;"></div>
        <div class="row row-cols-2 row-cols-sm-5 row-cols-md-5 g-3" id="oDivPrinc">
        </div>
        <input id="iNumCartas" value="<?=$iNumCartas?>" type="hidden">
        <input id="iParCorreto" value="<?=$iParCorreto?>" type="hidden">
    </div>
</div>
<input type="hidden" value=<?=$iPersonagem?> id="iPersonagem">
<input type="hidden" value=<?=$iNivel?> id="iNivel">
<input type="hidden" value=<?=$iDuration?> id="iDuration">
<script src="<?=GAME_PATH_JS?>inGame.js?v=<?=$iV?>" type="text/javascript"></script>
<script src="<?=GAME_PATH_JS?>gameplay.js?v=<?=$iV?>" type="text/javascript"></script>