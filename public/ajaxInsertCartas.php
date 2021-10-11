<?php 
    include('../Application/core/Inc.php');

    $oCarta = new Carta();
    $aImagem = $oCarta->selectCartas(1);

    $iLinha = 1;
    $sDivReturn = '';
    foreach ($aImagem as $oItem) 
    {
        $sDivReturn .= '
        <div class="col" onclick="flipCard(' . $iLinha . ', '. $oItem['carta_id'] . ')">
            <div class="card shadow-sm">
                <div class="card__inner' . $iLinha . '">
                    <div class="card__face card__face--front">
                        <img src="' . GAME_PATH_IMG_DB . 'back.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                    </div>
                    <div class="card__face card__face--back">
                        <img src="' . GAME_PATH_IMG_DB . $oItem['carta_img'] . '" class="face-img bd-placeholder-img card-img-top oFront" style="display:none" width="100%" height="225">
                    </div>
                </div>
            </div>
        </div>';
        $iLinha++;
    }
    
    echo $sDivReturn;
?>