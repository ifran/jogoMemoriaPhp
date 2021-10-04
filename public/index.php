<?php 
    include('../Application/core/Const.php');
    include('http://localhost/Jogo/Application/core/Inc.php');
    echo 'INDEx' . GAME_PATH_CSS . '<br>';
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
        <link href="<?=GAME_PATH_CSS?>bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=GAME_PATH_CSS?>main.css" />

        <style>
            .card__inner1 {
                width: 100%;
                height: 100%;
                transition: transform 1s;
                transform-style: preserve-3d;
                cursor: pointer;
                position: relative;
            }

            .card__inner1.is-flipped {
                transform: rotateY(180deg);
            }

            .card__inner2 {
                width: 100%;
                height: 100%;
                transition: transform 1s;
                transform-style: preserve-3d;
                cursor: pointer;
                position: relative;
            }

            .card__inner2.is-flipped {
                transform: rotateY(180deg);
            }

            .card__inner3 {
                width: 100%;
                height: 100%;
                transition: transform 1s;
                transform-style: preserve-3d;
                cursor: pointer;
                position: relative;
            }

            .card__inner3.is-flipped {
                transform: rotateY(180deg);
            }

            .card__inner4 {
                width: 100%;
                height: 100%;
                transition: transform 1s;
                transform-style: preserve-3d;
                cursor: pointer;
                position: relative;
            }

            .card__inner4.is-flipped {
                transform: rotateY(180deg);
            }
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
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                        
                        <div class="col" onclick="flipCard(1, 1)">
                            <div class="card shadow-sm">
                                <div class="card__inner1">
                                    <div class="card__face card__face--front">
                                        <img src="<?=GAME_PATH_IMG_DB?>/back.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                    <div class="card__face card__face--back">
                                        <img src="<?=GAME_PATH_IMG_DB?>/front.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col" onclick="flipCard(2, 2)">
                            <div class="card shadow-sm">
                                <div class="card__inner2">
                                    <div class="card__face card__face--front">
                                        <img src="<?=GAME_PATH_IMG_DB?>/back.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                    <div class="card__face card__face--back">
                                        <img src="<?=GAME_PATH_IMG_DB?>/front.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col" onclick="flipCard(3, 1)">
                            <div class="card shadow-sm">
                                <div class="card__inner3">
                                    <div class="card__face card__face--front">
                                        <img src="<?=GAME_PATH_IMG_DB?>/back.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                    <div class="card__face card__face--back">
                                        <img src="<?=GAME_PATH_IMG_DB?>/front.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col" onclick="flipCard(4, 2)">
                            <div class="card shadow-sm">
                                <div class="card__inner4">
                                    <div class="card__face card__face--front">
                                        <img src="<?=GAME_PATH_IMG_DB?>/back.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                    <div class="card__face card__face--back">
                                        <img src="<?=GAME_PATH_IMG_DB?>/front.jpg" class="face-img bd-placeholder-img card-img-top" width="100%" height="225">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        <form action="<?=GAME_PATH_CONTROLLER?>SaveImages.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="carta_nova">
            <input type="submit" values="Enviar">
        </form>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
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
        </script>
    </body>
</html>
