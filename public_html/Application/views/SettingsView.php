<div class="album py-5 bg-light mainDiv">
    
    <form action="Game" method="post">
        Escolher personagem<br>
        <div style="display:flex">
            <div>
                <input type="radio" class="btn-check" onclick="opSelect(1)" name="iPersonagem" id="option1" autocomplete="off" value="1">
                <label for="option1"><img id="img1" class="imgOption" src="<?=GAME_PATH_IMG?>agua.png"></label>
            </div>

            <div>
                <input type="radio" class="btn-check" onclick="opSelect(2)" name="iPersonagem" id="option2" autocomplete="off" value="2">
                <label for="option2"><img id="img2" class="imgOption" src="<?=GAME_PATH_IMG?>ar.png"></label>
            </div>
        
            <div>
                <input type="radio" class="btn-check" onclick="opSelect(3)" name="iPersonagem" id="option3" autocomplete="off" value="3">
                <label for="option3"><img id="img3" class="imgOption" src="<?=GAME_PATH_IMG?>fogo.png"></label>
            </div>

            <div>
                <input type="radio" onclick="opSelect(4)" class="btn-check" name="iPersonagem" id="option4" autocomplete="off" value="4">
                <label for="option4"><img style="border-radius: 100%" id="img4" class="imgOption" src="<?=GAME_PATH_IMG?>terra.png"></label>
            </div>
        </div>

        Escolher Nivel<br>
        <div style="display:flex">
            <div>
                <input type="radio" class="btn-check" onclick="opSelectNivel(5)" name="iNivel" id="iNivelOpt1" autocomplete="off" value="1">
                <label for="iNivelOpt1"><img id="img5" class="imgOptionNivel" src="<?=GAME_PATH_IMG?>facil.png"></label>
            </div>

            <div>
                <input type="radio" class="btn-check" onclick="opSelectNivel(6)" name="iNivel" id="iNivelOpt2" autocomplete="off" value="2">
                <label for="iNivelOpt2"><img id="img6" class="imgOptionNivel" src="<?=GAME_PATH_IMG?>medio.png"></label>
            </div>
        
            <div>
                <input type="radio" class="btn-check" onclick="opSelectNivel(7)" name="iNivel" id="iNivelOpt3" autocomplete="off" value="3">
                <label for="iNivelOpt3"><img id="img7" class="imgOptionNivel" src="<?=GAME_PATH_IMG?>dificil.png"></label>
            </div>
        </div>
        <input type="submit">
    </form>
</div>