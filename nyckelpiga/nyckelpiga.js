/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Globala variabler */
var ctx = eCanvas.getContext("2d");
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image() 
}
var karta = [
    [0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1,],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 1,],
    [1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1,],
    [1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0,],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,]
];

/* ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet.png";

/* Nyckelpigasn startläge */
piga.rad = 0; 
piga.kol = 0; 
piga.bild.src = "./Paper-Bowser-icon.png";

/* Rita ut Bowser */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();

}

/* Rita ut karta */
function ritaKarta() {
    /* Gå igenom varige rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varige kollum */
      for (let kol = 0; kol < karta[rad].length; kol++) {
         if (karta[rad][kol] == 1) {
             /* Rita ut en svart fyrkant 50x50 pixlar */
             var rutaPos = karta[rad][kol] * 32;
             ctx.drawImage(tileSheet, rutaPos, 0, 32, 32, kol * 50, rad * 50, 50, 50);
             //ctx.fillRect(kol * 50, rad * 50, 50, 50);
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
            piga.rot = 180 * (Math.PI / 180);
            break;
            case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = 180 * (Math.PI / 0);
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
            piga.rot = Math.PI;
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

    requestAnimationFrame(gameLoop);  
}

/* Starta Spelet */
gameLoop();
