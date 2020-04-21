/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;
/* Objekten i spelet */
var spel = {
    tid: 60,
    poäng: 0,
    isGameOver: false,
    bild: new Image()
};
var hjälte = {
    x: 0,
    y: 0,
    a: 5,
    vänster: false,
    höger: false,
    upp: false,
    ned: false,
    bild: new Image()
};
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* Ladda in bilderna */
spel.bild.src = "./bilder/background.png";
hjälte.bild.src = "./bilder/hero.png";
monster.bild.src = "./bilder/monster.png";

/* Canvas inställningar */
ctx.fillStyle = "#FFF";

/* Kör igång spelet */
reset();
gameLoop();

/* ********* */
/* Händelser */
/* ********* */

/* Lyssna på tangentnedtryckningar */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
            case "ArrowRight":
            hjälte.höger = true;
            break;
            case "ArrowLeft":
            hjälte.vänster = true;
            break;
            case "ArrowDown":
            hjälte.ned = true;
            break;
            case "ArrowUp":
            hjälte.upp = true;
            break;
    }
   
});
window.addEventListener("keyup", function(e) {
    switch (e.key) {
            case "ArrowRight":
            hjälte.höger = false;
            break;
            case "ArrowLeft":
            hjälte.vänster = false;
            break;
            case "ArrowDown":
            hjälte.ned = false;
            break;
            case "ArrowUp":
            hjälte.upp = false;
            break;
    }
   
});

window.setInterval(function() {
    spel.tid--;

    if (spel.tid <= 0) {
        spel.isGameOver = true;
        ctx.font = "80px Helvetica";
        ctx.fillText("Game Over: " + spel.tid, 32, 200);
    }
}, 1000);

/* ************ */
/* Funktionerna */

/* Återställ spelet */
function reset() {
    /* Placera ut hjälten */
    hjälte.x = eCanvas.width / 2;
    hjälte.y = eCanvas.height / 2;

    /* Spawna monstret slumpmässigt */
    monster.x = Math.random() * eCanvas.width - 100;
    monster.y = Math.random() * eCanvas.height - 100;
}

/* Ritar ut */
function ritaBakgrund() {
    ctx.drawImage(spel.bild, 0, 0);
}
function ritaHjälte() {
    if (hjälte.höger) {
        hjälte.x += 3;
    }
    if (hjälte.vänster) {
        hjälte.x -= 3;
    }
    if (hjälte.ned) {
        hjälte.y += 3;
    }
    if (hjälte.upp) {
        hjälte.y -= 3;
    }
    ctx.drawImage(hjälte.bild, hjälte.x, hjälte.y);
}
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
}
/* Kollar om hjälten träffar monstret */
function kollaKollision() {
if (hjälte.x <= (monster.x + 32) && monster.x <= (hjälte.x + 32) &&
    hjälte.y <= (monster.y + 32) && monster.y <= (hjälte.y + 32)) {
    reset();
    spel.poäng++;
}
/* Skriv ut */
ctx.font = "24px Helvetica";
ctx.fillText("Fångade monster: " + spel.poäng, 32, 50);
ctx.fillText("Tid kvar: " + spel.tid, 32, 80);
}


/* Spelloopen */
function gameLoop() {
    ritaBakgrund();
    ritaHjälte();
    ritaMonster();
    kollaKollision();

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}