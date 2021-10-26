<?php 
    if (empty($_SESSION['iAdm']))
    {
        headerLocation('Home');
    }
?>
<div class="album py-5 bg-light bgBlack">
    <div class="container">
        <div class="card-register">
            <form action="Application/controllers/SaveImages.php" method="POST" enctype="multipart/form-data">
                <label >Nova Carta</label>
                <input type="file" name="carta_nova">
                <input type="submit" values="Enviar">
            </form>
        </div>
        <div class="row row-cols-2 row-cols-sm-5 row-cols-md-6 g-3">
        <?php 
            $oCarta = new Carta();
            $aImagem = $oCarta->selectTodasCartas();

            $iLinha = 1;
            $sDivReturn = '';
            foreach ($aImagem as $oItem) 
            {
                $sDivReturn .= '
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card__inner' . $iLinha . '">
                            <div class="card__face card__face--front">
                                <img src="' . GAME_PATH_IMG_DB . $oItem['carta_img'] . '" class="face-img bd-placeholder-img card-img-top img-fluid" align="center" width="100%" height="225">
                            </div>
                        </div>
                    </div>
                </div>
                ';
                $iLinha++;
            }

            echo $sDivReturn;
        ?>
        </div>
    </div>
</div>