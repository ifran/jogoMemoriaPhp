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
        if (_$('oHidCartaLinha_' + i).value == 0) {
            var card = document.querySelector(".card__inner"+i);
            card.classList.toggle('is-flipped');
        }
    }

    setTimeout (function()
    {
        for (i = 1; i <= iLinha; i++) {
            if (_$('oHidCartaLinha_' + i).value == 0) {
                var card = document.querySelector(".card__inner"+i);
                card.classList.toggle('is-flipped');
            }
        }
    }, 1500);

    disablePower();
}

function firePower() 
{
    oCartas = document.getElementsByClassName('oCartas');
    iPrimeiraCarta = 0;
    for (i = 0; i < oCartas.length; i++) {
        sId = oCartas[i].id;

        aId = sId.split('_');
        iHiddenCarta = _$('oHidCarta_' + aId[1] + '_' + aId[2]).value;
        
        bMudar = false;
        if (iHiddenCarta == 0) {
            bMudar = true;
        }

        if (iPrimeiraCarta == 0 && bMudar) {
            iPrimeiraCarta = aId[1];
            iPrimeiroId = aId[2];
        } else if (iPrimeiraCarta != 0) {
            iSegundoId = aId[2];
            if (iSegundoId == iPrimeiroId) {
                iSegundaCarta = aId[1];
                disablePower();
                flipCard(iPrimeiraCarta, iPrimeiroId);
                flipCard(iSegundaCarta, iSegundoId);
            }
        }
    }
}

function waterPower() 
{
    progressbar1 = document.getElementsByClassName('inner');
    progressbarinner = progressbar1[0];
    sTime = progressbarinner.style.animationDuration;
    sTime = sTime.substring(0, sTime.length - 1);
    iTime = parseInt(sTime);
    iTime = iTime + 10;
    progressbarinner.style.animationDuration = iTime + 's';
    disablePower();
}

function airPower() {
    min = Math.ceil(1);
    max = Math.floor(4);
    iPower = Math.floor(Math.random() * (max - min)) + min;

    if (iPower == 1) {
        waterPower();
    } else if (iPower == 2) {
        firePower();
    }  else if (iPower == 3) {
        earthPower();
    }
    disablePower();
}