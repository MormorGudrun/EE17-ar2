/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;

/* Objekten i spelet */
class Spel {
    constructor() {
        this.tid = 60;
        this.poäng = 0;
        this.isGameOver = false;
        this.bild = new Image();
        this.bild.src = "./bilder/background.png";
    }
    rita() {
        ctx.drawImage(spel.bild, 0, 0);
    }
}
var spel = new Spel();

class Hjälte {
    constructor() {
        this.x = eCanvas.width / 2;
        this.y = eCanvas.height / 2;
        this.a = 5;
        this.vänster = false;
        this.höger = false;
        this.upp = false;
        this.ned = false;
        this.bild = new Image();
        this.bild.src = "./bilder/pokemon-bald-sprite.png";
        this.rutIndex = 0;
        this.rutAntal = 4;
        this.rutRad = 0;
    }
    rita() {
        /* Flytta åt det håll vi tryckt på piltangenterna */
        if (this.höger) {
            this.x += 2;
            this.rutRad = 2;
        } else
        if (this.vänster) {
            this.x -= 2;
            this.rutRad = 1;
        } else
        if (this.ned) {
            this.y += 2;
            this.rutRad = 0;
        } else
        if (this.upp) {
            this.y -= 2;
            this.rutRad = 3;
        }
        
        /* Animera med sprite */
        if (this.höger || this.vänster || this.ned || this.upp) {
            var ruta = Math.floor(this.rutIndex / 6);
    
            /* Rita ut hjälte som går */
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.drawImage(this.bild, ruta * 68, this.rutRad * 72, 68, 72, 0, 0, 50, 50);
            ctx.restore();
    
            /* Hämta nästa bildruta */
            this.rutIndex++;
            if (this.rutIndex == this.rutAntal * 6) {
                this.rutIndex = 0;
            }
        } else {
            ctx.drawImage(this.bild, 0, 0, 68, 72, this.x, this.y, 50, 50);
        }
    }
    kollaKollision(figur) {
        if (this.x <= (figur.x + 32) && figur.x <= (this.x + 32) &&
            this.y <= (figur.y + 32) && figur.y <= (this.y + 32)) {
            figur.spawna();
            spel.poäng++;
        }
    
        /* Skriv ut */
        ctx.font = "24px Helvetica";
        ctx.fillText("Fångade monster: " + spel.poäng, 32, 50);
        ctx.fillText("Tid kvar: " + spel.tid, 32, 80);
    }
}
var hjälte = new Hjälte();

class Monster {
    constructor() {
        this.x = 0;
        this.y = 0;
        this.bild = new Image();
        this.bild.src = "./bilder/monster.png"
    }
    rita() {
        ctx.drawImage(this.bild, this.x, this.y);
    }
    spawna() {
        /* Spawna monstret slumpmässigt */
        this.x = 32 + Math.random() * (eCanvas.width - 100);
        this.y = 32 + Math.random() * (eCanvas.height - 100);
    }
}
var monster = new Monster();

/* Canvas inställningar */
ctx.fillStyle = "#FFF";

/* Kör igång spelet */
monster.spawna();
gameLoop();

/* ********* */
/* Händelser */
/* ********* */

/* Lyssna på tangentnedtryckningar */
window.addEventListener("keydown", function (e) {
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
    }
});
window.addEventListener("keyup", function (e) {
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
    }
});

window.setInterval(function () {
    spel.tid--;

    if (spel.tid <= 0) {
        spel.isGameOver = true;
        ctx.font = "80px Helvetica";
        ctx.fillText("Game Over!", 32, 200);
    }
}, 1000);

/* ************ */
/* Funktionerna */
/* ************ */

/* Spelloopen */
function gameLoop() {
    spel.rita();
    hjälte.rita();
    monster.rita();

    hjälte.kollaKollision(monster);

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}