<?php 
    include('Application/core/Inc.php');
    $iV = rand(1000,2000);
    
    $iNivel = 1; // $_POST['iNivel'] = 1;

    $oCarta = new Carta();
    $aImagem = $oCarta->selectCartas($iNivel);
    $aNivel  = $oCarta->nivelValor($iNivel);
    $iParCorreto  = $aNivel['iParCorreto'];
    $iNumCartas = $iParCorreto * 2;
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
        <link href="public/assets/css/bootstrap.min.css?v=<?=$iV?>" rel="stylesheet">
        <link rel="stylesheet" href="public/assets/css/main.css" />

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
                <button id="oBtnStart" onclick="startGame()">BUCETA</button>
                <div id="progressbar1" class="progressbar"></div>

                <div class="container">
                  <button style="height:50px;width:500px" onclick="earthPower()">Poder de terra</button>
                    <div class="row row-cols-2 row-cols-sm-5 row-cols-md-5 g-3" id="oDivPrinc">
                        
                        <input id="iNumCartas" value="<?=$iNumCartas?>" type="hidden">
                        <input id="iParCorreto" value="<?=$iParCorreto?>" type="hidden">
                    </div>
                </div>
            </div>
        </main>
        <form action="<?=GAME_PATH_CONTROLLER?>SaveImages.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="carta_nova">
            <input type="submit" values="Enviar">
        </form>
        
        <script src="<?=GAME_PATH_JS?>script.js?v=<?=$iV?>" type="text/javascript"></script>
        <script src="<?=GAME_PATH_JS?>bootstrap.bundle.min.js"></script>
    </body>
</html> 