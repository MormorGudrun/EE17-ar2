window.onload = start;

function start() {
    /* Elementen vi jobbar med */
    const eleTabell = document.querySelector("table");

    /* När man klickar i tabellen */
    eleTabell.addEventListener("click", klick);
    function klick(e) {
        console.log(e.target.nodeName);
        
        if (e.target.nodeName === "BUTTON") {
            summera(e.target);
        }
    }
    function summera(knapp) {
        const eleRad = knapp.parentNode.parentNode;
        const eleAntal = eleRad.querySelector("#antal");
        const elePris = eleRad.querySelector("#pris");
        const eleSumma = eleRad.querySelector("#summa");

        /* Hämta värdena */
        var antal = parseInt(eleAntal.textContent);
        var pris = parseInt(elePris.textContent);
        var summa = parseInt(eleSumma.textContent);

        /* Vilken knapp klickade vi på? */
        if (knapp.id === "plus") {
            antal++;
        } else {
            antal--;
        }

        /* Skriv tillbaka resultatet */
        eleAntal.textContent = antal;
        eleSumma.textContent = antal * pris;
    }
    
   
}