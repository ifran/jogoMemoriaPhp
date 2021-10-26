<?php 
    include('../Application/core/Inc.php');

    if (isset($_GET['iNivel'])) {
        $iNivel = $_GET['iNivel'];
    }

    $oCarta = new Carta();
    $aImagem = $oCarta->selectCartas($iNivel);

    $iLinha = 1;
    $sDivReturn = '';
    foreach ($aImagem as $oItem) 
    {
        $sDivReturn .= '
        <div class="col oCartas" id="cartas_' . $iLinha . '_'. $oItem['carta_id'] . '" onclick="flipCard(' . $iLinha . ', '. $oItem['carta_id'] . ')">
            <div class="card shadow-sm">
                <div class="card__inner' . $iLinha . '">
                    <div class="card__face card__face--front">
                        <img src="' . GAME_PATH_IMG . 'back.jpg" class="face-img bd-placeholder-img card-img-top img-fluid" align="center" width="100%" height="225">
                    </div>
                    <div class="card__face card__face--back">
                        <img src="' . GAME_PATH_IMG_DB . $oItem['carta_img'] . '" class="face-img bd-placeholder-img card-img-top oFront img-fluid" style="display:none" width="100%" height="225">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="oHidCarta_' . $iLinha . '_' . $oItem['carta_id'] . '" value="0">
        <input type="hidden" id="oHidCartaLinha_' . $iLinha . '" value="0">
        ';
        $iLinha++;
    }
    
    echo $sDivReturn;
?>