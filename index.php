<?php 
    include('Application/core/Inc.php');
    
    $oCon = new Database();
    $aRetorno = $oCon->selectQuery('SELECT DISTINCT carta_img, carta_id FROM carta ORDER BY RAND() LIMIT 0,9');
    
    $aImagem = array();
    for ($i=1;$i<=2;$i++) {
        foreach ($aRetorno as $oItem) {
            $aImagem[] = $oItem;
        }
    }
    
    shuffle($aImagem);
?>
<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Decora essa porra</title>

        <!-- Bootstrap core CSS -->
        <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/assets/css/main.css" />

        <style>
            <?php 
            $iLinha = 1;
            foreach ($aImagem as $oItem) { ?>
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
    </head>
    <body>
        <header>
            <!-- Opcao oculta nomenu do topo -->
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong>Menu</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>
        <main>
            <div class="album py-5 bg-light mainDivEasy">
                <div class="container">
                    <div class="row row-cols-2 row-cols-sm-5 row-cols-md-5 g-3">
                        
                        <?php 
                        $iLinha = 1;
                        foreach ($aImagem as $oItem) { ?>
                        <div class="col" onclick="flipCard(<?=$iLinha?>, <?=$oItem['carta_id']?>)">
                            <div class="card shadow-sm">
                                <div class="card__inner<?=$iLinha?>">
                                    <div class="card__face card__face--front">
                                        <img src="<?=GAME_PATH_IMG_DB?>back.jpg" class="face-img bd-placeholder-img card-img-top oBack" width="100%" height="225">
                                    </div>
                                    <div class="card__face card__face--back">
                                        <img src="<?=GAME_PATH_IMG_DB?><?=$oItem['carta_img']?>" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $iLinha++;
                        } ?>
                        <input id="iNumCartas" value="<?=$iLinha-1?>" type="hidden">
                    </div>
                </div>
            </div>
        </main>
        <form action="<?=GAME_PATH_CONTROLLER?>SaveImages.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="carta_nova">
            <input type="submit" values="Enviar">
        </form>
        <button onclick="earthPower()">Poder de terra</button>
        <script src="public/assets/js/bootstrap.bundle.min.js"></script>
        <script>
            var iParTodo = 0;
            var iCartasViradas = 0;
            var iNumCardOld = 0;
            var aParCorreto = [];
    
            function flipCard(iCard, iPar) 
            {
                bLiberarFlip = true;
    
                if (aParCorreto.indexOf(iPar) != -1) 
                {
                    bLiberarFlip = false;
                }
    
                if (iCartasViradas > 1) 
                {
                    bLiberarFlip = false;
                }
    
                if (bLiberarFlip) 
                {
                    var card = document.querySelector(".card__inner" + iCard);
                    card.classList.toggle('is-flipped');
    
                    checkPares(iCard, iPar);
                }
            }
    
            function showError(iCard) 
            {
                setTimeout (function()
                {
                    var card = document.querySelector(".card__inner" + iNumCardOld);
                    card.classList.toggle('is-flipped');
    
                    var card = document.querySelector(".card__inner" + iCard);
                    card.classList.toggle('is-flipped');
    
                    iParTodo = 0;
                    iNumCardOld = 0;
                    iCartasViradas = 0;
    
                }, 700);
            }
    
            function checkPares(iCard, iPar) 
            {
                if (iParTodo == 0)
                {
                    iParTodo = iPar;
                    iNumCardOld = iCard;
                    iCartasViradas = 1;
                }
                else 
                {
                    iCartasViradas = 2;
                    if (iParTodo == iPar)
                    {
                        iParTodo = 0;
                        iNumCardOld = 0;
                        aParCorreto.push(iPar);
                        iCartasViradas = 0;
                    }
                    else 
                    {
                        showError(iCard);
                    }
                }
            }
    
            function startTimer(duration, display)
            {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 600, 10);
                    seconds = timer % 600;
                    seconds = seconds.toString();
                    seconds = seconds.substring(0, seconds.length - 1);
    
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
    
                    display.textContent = minutes + ":" + seconds;
    
                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 100);
            }
    
            function iniciar() 
            {
                var fiveMinutes = 600 * 1,
                display = document.querySelector('#time');
                startTimer(fiveMinutes, display);
            }

            function earthPower() { // show cards
                
                iLinha = document.getElementById('iNumCartas').value;
                for (i = 1; i <= iLinha; i++) {
                    var card = document.querySelector(".card__inner"+i);
                    card.classList.toggle('is-flipped');
                }

                setTimeout (function()
                {
                    for (i = 1; i <= iLinha; i++) {
                        var card = document.querySelector(".card__inner"+i);
                        card.classList.toggle('is-flipped');
                    }
                }, 1500);
            }
        </script>
    </body>
</html>
