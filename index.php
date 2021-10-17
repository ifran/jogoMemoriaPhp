<?php 
    header('Content-Type: text/html; charset=utf-8');
    include('Application/core/Inc.php');
    $iV = rand(1000,2000);
?>
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <title>Jogo da Mem&oacute;ria</title>
        <link rel="shortcut icon" href="<?=GAME_PATH_IMG?>/favicon/favicon.ico" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

        <!-- Bootstrap core CSS -->
        <link href="<?=GAME_PATH_CSS?>bootstrap.min.css" rel="stylesheet"/>
        <link href="<?=GAME_PATH_CSS?>main.css?v=<?=$iV?>" rel="stylesheet" />

        <script src="<?=GAME_PATH_JS?>bootstrap.bundle.min.js"></script>
        <script src="<?=GAME_PATH_JS?>genericFuncs.js?v=<?=$iV?>" type="text/javascript"></script>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>
    
    <body class="d-flex h-100 text-center text-white bgBlack">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="menu">
            <header class="mb-auto">
                <div>
                    <a href="Home"><h3 class="float-md-start mb-0">Home</h3></a>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>
            <main class="px-3">
            <div>
                <?php 
                    if (!empty($_GET['sPage'])) {
                        include(GAME_PATH_VIEW . $_GET['sPage'] . 'View.php'); 
                    } else {
                        include(GAME_PATH_VIEW . 'HomeView.php'); 
                    }
                ?>
                </div>
            </main>

            <footer class="mt-auto text-white-50">
                <p></p>
            </footer>
        </div>
    </body>
</html>