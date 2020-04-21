/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");
const ePoäng = document.querySelector("#poäng");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;


var ctx = eCanvas.getContext("2d");
/* **************** */
/* Globala variabler */
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image() 
};
var monster1 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
};
var monster2 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
};
var monster3 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
};
var mynt1 = {
    x: 0,
    y: 0,
    bild: new Image()
}
var poäng = 0;
var isGameOver = false;
var karta = [
    [0, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35],
    [0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35],
    [35, 35, 35, 0, 35, 0, 35, 35, 35, 35, 35, 0, 15, 15, 0, 35],
    [35, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35],
    [35, 0, 35, 35, 35, 0, 35, 0, 1, 2, 3, 0, 1, 3, 0, 35],
    [35, 0, 0, 0, 35, 0, 0, 0, 11, 12, 23, 0, 21, 23, 0, 35],
    [35, 35, 35, 0, 35, 0, 35, 0, 11, 13, 0, 0, 0, 0, 0, 35],
    [35, 0, 0, 0, 0, 0, 0, 0, 11, 13, 0, 15, 15, 15, 15, 35],
    [35, 0, 35, 0, 35, 0, 15, 0, 11, 13, 0, 15, 0, 0, 0, 35],
    [35, 0, 35, 0, 35, 0, 15, 0, 11, 13, 0, 15, 0, 35, 0, 35],
    [35, 0, 35, 0, 0, 0, 0, 0, 11, 13, 0, 0, 0, 35, 0, 0],
    [35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35]
];

/* ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet-swamp.png";
/* Lagra alla monster i en array */
var monsters = [];
monsters.push(monster1);
monsters.push(monster2);
monsters.push(monster3);

/* Lagra malla mynt i en array */
var mynten = [];
mynten.push(mynt1);

/* Ge mynten en bild */
mynt1.bild.src = new Image();


/* myntens startläge */
mynt1.rad = 0;
mynt1.kol = 0;
mynt1.bild.src = "./coin-sprite.png";

/* Nyckelpigasn startläge */
piga.rad = 0; 
piga.kol = 0; 
piga.bild.src = "./Paper-Bowser-icon.png";

/* Monstrets startläge */
monster1.bild.src = "./svamp-mon.png"
monster2.bild.src = "./svamp-mon.png"
monster3.bild.src = "./svamp-mon.png"

/* välj text inställningar */
ctx.font = "96px Sans-serif";
ctx.textAlign = "center";

/* Starta Spelet */
gameLoop();


/* Rita ut Bowser */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot * (Math.PI / 180));
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();

}
function ritaMonster(figur) {
    ctx.drawImage(figur.bild, figur.x, figur.y, 50, 50);
    figur.y ++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

/* kolla om pigan träffar monster */
function krock(figur) {
    /* Om piga är i höjd med monster */
    if ((piga.rad * 50) < figur.y && figur.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < figur.x && figur.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#888";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300); 
            ameOver = true;
        }
    }
}
function ritaMynt(figur) {
    ctx.drawImage(figur.bild, 0, 0, 50, 50, figur.x, figur.y, 50, 50);
    figur.y++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

function ränkaPoäng(figur) {
    if ((piga.rad * 50) < figur.y && figur.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < figur.x && figur.x < (piga.kol * 50 + 50)) { 
            poäng++;
            ePoäng.textContent = poäng;
            figur.x = Math.ceil(Math.random() * 750);
            figur.y = -Math.ceil(Math.random() * 500);
        } 
    }
}

/* Rita ut karta */
function ritaKarta() {
    /* Gå igenom varige rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varige kollum */
      for (let kol = 0; kol < karta[rad].length; kol++) {
         if (karta[rad][kol] != 0) {
             /* Rita ut en svart fyrkant 50x50 pixlar */
             var rutaPos = (karta[rad][kol] % 10) * 32 - 32;
             var rutaPosRad = Math.ceil(karta[rad][kol] / 10) * 32 -32;
             ctx.drawImage(tileSheet, rutaPos, rutaPosRad, 32, 32, kol * 50, rad * 50, 50, 50);
             
         }    
      }  
    }
}

/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function (e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;  
            }
            piga.rot = 180;
            break;
            case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = 0;
            break;
            case "ArrowUp":
            if (karta[piga.rad - 1][piga.kol] == 0) {
                piga.rad--;
            }
            piga.rot = 0;
            break;
            case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++;  
            }
            piga.rot = 180;
            break;
            
    }
});

/* Spel-looooopen */
ctx.fillStyle = "red";
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

     
    ritaKarta();
    ritaPiga();

    mynten.forEach(ritaMynt);
    mynten.forEach(ränkaPoäng);
    monsters.forEach(ritaMonster);
    monsters.forEach(krock);

    
    

    if (!isGameOver) {
        requestAnimationFrame(gameLoop); 
    } 
     
}


