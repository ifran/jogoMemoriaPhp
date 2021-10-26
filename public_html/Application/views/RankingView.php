<?php 
    $oRanking = new Ranking();
    $oRankingNivel = $oRanking->listarRanking();
?>

<h1 class="text-center">Ranking</h1>
<div style="display:flex">
<?php 
    $iNivel = 1;
    foreach ($oRankingNivel as $oRankingNivelItem) { 
        if ($iNivel == 1) {
            $sNivel = "Fácil";
        } else if ($iNivel == 2) {
            $sNivel = "Médio";
        } else {
            $sNivel = "Difícil";
        }
        $iNivel++;
?>

<div class="album py-5 bg-light rankingDiv mainDiv">
    <table class="table table-sm">
        <thead>
            <tr>
                <th colspan="4" class="text-center"><?=$sNivel?></th>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Pontua&ccedil;&atilde;o</th>
                <th scope="col">Personagem</th>
            </tr>
        </thead>
        <tbody>
        <?php $iLugar = 0; foreach ($oRankingNivelItem as $oRankingItem) {
            $sRankingName = utf8_encode($oRankingItem['ranking_name']);
            $sRankingPontos = $oRankingItem['ranking_pontos'];
            $sRankingPersonagem = utf8_encode($oRankingItem['ranking_personagem']);

            if ($sRankingPersonagem == 1) {
                $sRankingPersonagem = '&Aacute;gua';
            } else if ($sRankingPersonagem == 2) {
                $sRankingPersonagem = "Ar";
            } else if ($sRankingPersonagem == 3) {
                $sRankingPersonagem = "Fogo";
            } else if ($sRankingPersonagem == 4) {
                $sRankingPersonagem = "Terra";
            }
            $iLugar++;
            ?>
                <tr>
                    <th scope="row"><?=$iLugar?></th>
                    <td><?=$sRankingName?></td>
                    <td><?=$sRankingPontos?></td>
                    <td><?=$sRankingPersonagem?></td>
                </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php 
    } 
?>
</div>