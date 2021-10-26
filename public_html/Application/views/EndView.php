<?php
    if (empty($_POST['iNivel']) OR empty($_POST['iPersonagem'])) 
    {
        headerLocation('Home');
    }
    
    $iPersonagem = $_POST['iPersonagem'];
    $iNivel = $_POST['iNivel'];
    $iPontosRodada = $_POST['iPontosRodada'];
    $iPontosTotal = $iPontosRodada + $_SESSION['iPoints'];

    if (!empty($_POST['sNomeRanking'])) 
    {
        $sNomeRanking = $_POST['sNomeRanking'];
        
        $sSql = "INSERT INTO ranking (ranking_pontos
                                    , ranking_nivel
                                    , ranking_name
                                    , ranking_personagem)
                VALUES (
                      '" . $iPontosTotal . "'
                    , '" . $iNivel . "'
                    , '" . $sNomeRanking . "'
                    , '" . $iPersonagem . "')";

        $oDatabase = new Database();
        $oDatabase->executeQuery($sSql);

        header('location:Home');
        die();
    }
?>
<div class="album py-5 bg-light">
    <div class="container">
        <!-- <button style="height:50px;width:500px" onclick="earthPower()">Poder de terra</button> -->
        <form action="End" method="post">
            <label style="color:black" for="text">Seu nome no ranking: </label>
            <input type="text" name="sNomeRanking">

            <input type="hidden" name="iPersonagem" value="<?=$iPersonagem?>"> 
            <input type="hidden" name="iNivel" value="<?=$iNivel?>"> 
            <input type="hidden" name="iPontosRodada" value="<?=$iPontosRodada?>"> 

            <input type="submit" value="Registrar">
        </form>
    </div>
</div>