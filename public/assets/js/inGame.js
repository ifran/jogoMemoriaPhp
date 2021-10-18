var iParTodo = 0;
var iParCorreto = _$('iParCorreto').value;
var iNumCardOld = 0; 

var iCartasViradas = 0; // Verificando se ja tem alguma carta virada
var aParCorreto = []; // Total de pares encontrados

// Funcao para virar cartas 
function flipCard(iCard, iPar) 
{
    oFront = document.getElementsByClassName('oFront');
    
    for (i = 0; i < oFront.length; i++) {
        oFront[i].style.display = '';
    }

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
        if (aParCorreto.length == iParCorreto)
        {
            winGame();
        }
    }
}

// Caso os pares escolhidos estiverem errados
function cartasErradas(iCard) 
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

// Verificando pares selecionados
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
            cartasErradas(iCard);
        }
    }
}

// Criando barra de timer
function createProgressbar(id, duration, callback) 
{    
    if (_$('lixo')) {
        _$('lixo').remove();
    }
    var progressbar = document.getElementById(id);
    progressbar.className = 'progressbar';
  
    var progressbarinner = document.createElement('div');
    progressbarinner.className = 'inner';
    progressbarinner.setAttribute("id", "lixo");
    
    progressbarinner.style.animationDuration = duration;
    
    if (typeof(callback) === 'function') {
      progressbarinner.addEventListener('animationend', callback);
    }
    
    progressbar.appendChild(progressbarinner);
    progressbarinner.style.animationPlayState = 'running';
}

// Reiniciando jogo, apos vencer
function winGame()
{
    aParCorreto = [];
    ajaxRequest('ajaxSavePoints.php', 'oPontuacao');
    startGame();
}

// Fim de jogo
function loseGame() 
{
    iPersonagem = _$('iPersonagem').value;
    iNivel      = _$('iNivel').value;

    ajaxRequest('ajaxSavePoints.php?bLose=1&iNivel=' + iNivel + '&iPersonagem=' + iPersonagem, 'oPontuacao');
    alert("Perdeu");
}

// Iniciando jogo
function startGame() 
{
    iDuration = _$('iDuration').value;
    sUrl = 'ajaxInsertCartas.php?iNivel=' + _$('iNivel').value;
    ajaxRequest(sUrl, 'oDivPrinc');

    createProgressbar('progressbar1', iDuration + 's', function() {
        loseGame();
    });
}

window.startGame();

/**********************
 * Criando poderes INI 
***********************/
function earthPower() 
{
    oFront = document.getElementsByClassName('oFront');
    
    for (i = 0; i < oFront.length; i++) {
        oFront[i].style.display = '';
    }
    
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

function firePower() 
{
    oFront = document.getElementsByClassName('oFront');
    
    for (i = 0; i < oFront.length; i++) {
        oFront[i].style.display = '';
    }
    
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