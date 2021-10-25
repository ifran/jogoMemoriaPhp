var iParTodo = 0;
var iParCorreto = _$('iParCorreto').value;
var iNumCardOld = 0; 

var iCartasViradas = 0; // Verificando se ja tem alguma carta virada
var aParCorreto = []; // Total de pares encontrados

function controlPower(bDisabled) {
    bCanUsePower = _$('bCanUsePower').value;
    
    if (bCanUsePower == 0) {
        bCanUsePower = false;
    }

    if (bCanUsePower) {
        _$('oBtnPower').disabled = bDisabled;
    } else {
        _$('oBtnPower').disabled = true;
    }
}

function disablePower() {
    _$('bCanUsePower').value = 0;
    controlPower(true);
}

// Funcao para virar cartas 
function flipCard(iCard, iPar)
{
    controlPower(true);

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

    if (_$('oHidCarta_' + iCard + '_' + iPar).value == 1) {
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
        if (iParTodo == iPar && iNumCardOld != iCard)
        {
            _$('oHidCarta_' + iCard + '_' + iPar).value = 1;
            _$('oHidCarta_' + iNumCardOld + '_' + iParTodo).value = 1;
            
            _$('oHidCartaLinha_' + iCard).value = 1;
            _$('oHidCartaLinha_' + iNumCardOld).value = 1;

            iPontosRodada = parseInt(_$('iPontosRodada').value);
            iPontosPar = parseInt(_$('iPontosPar').value);
            iPontosRodada = iPontosPar + iPontosRodada;
            _$('iPontosRodada').value = iPontosRodada;
            _$('oPontuacaoRodada').innerHTML = 'Pontua&ccedil;&atilde;o da Rodada: ' + iPontosRodada;

            iParTodo = 0;
            iNumCardOld = 0;
            aParCorreto.push(iPar);
            iCartasViradas = 0;
        }
        else
        {
            cartasErradas(iCard);
        }
        controlPower(false);
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
    iNivel = _$('iNivel').value;
    _$('bCanUsePower').value = 1;
    _$('iPontosRodada').value = 0;
    _$('oPontuacaoRodada').innerHTML = 'Pontua&ccedil;&atilde;o da Rodada: ' + 0;
    controlPower(false);
    aParCorreto = [];
    ajaxRequest('ajaxSavePoints.php?iNivel='+iNivel, 'oPontuacao');
    startGame();
}

// Fim de jogo
function loseGame() 
{
    iPersonagem = _$('iPersonagem').value;
    iNivel      = _$('iNivel').value;

    alert("Perdeu");
    _$("oFormEndgame").submit();
}

// Iniciando jogo
function startGame() 
{
    iDuration = _$('iDuration').value;
    sUrl = 'ajaxInsertCartas.php?iNivel=' + _$('iNivel').value;
    _$('iNumCartas').focus();
    ajaxRequest(sUrl, 'oDivPrinc');

    createProgressbar('progressbar1', iDuration + 's', function() {
        loseGame();
    });
}

window.startGame();