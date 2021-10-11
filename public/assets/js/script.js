var iParTodo = 0;
var iParCorreto = _$('iParCorreto').value;
var iNumCardOld = 0; 

var iCartasViradas = 0; // Verificando se ja tem alguma carta virada
var aParCorreto = []; // Total de pares encontrados

// funcao geral
function _$(iId) 
{
    return document.getElementById(iId);
}

/****************************
* Funcao para virar cartas 
****************************/
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

function winGame()
{
    aParCorreto = [];
    startGame();
}

function earthPower() {

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

function createProgressbar(id, duration, callback) {
    var progressbar = document.getElementById(id);
    
    sDiv = '<div class="inner" style="animation-duration: ' + duration + 's; animation-play-state: running;"></div>';

    // Mostrando na div atual
    progressbar.innerHTML = sDiv;

    // Startando
    // progressbarinner.style.animationPlayState = 'running';
}

function startGame() {
    oBtnStart = _$('oBtnStart');
    //oBtnStart.disabled = 'true';

    var xmlhttp = new XMLHttpRequest();
    var url = "public/ajaxInsertCartas.php";
  
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == '') {
          alert('lightGreen');
        } else {
          // alert('Erro ao salvar!\n\n'+this.responseText);
          sDiv = this.responseText;
          _$('oDivPrinc').innerHTML = sDiv;
        }
      }
    };
  
    xmlhttp.open("GET", url , true);
    xmlhttp.send();

    createProgressbar('progressbar1', '10', function() {

    });
}