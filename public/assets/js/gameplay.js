window.startGame();

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