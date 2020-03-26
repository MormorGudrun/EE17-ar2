/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Globala variabler */
var ctx = eCanvas.getContext("2d");
var piga = {
    x: 0,
    y: 0,
    rot: 0,
    bild: new Image() 
}

/* Nyckelpigasn startläge */
piga.x = eCanvas.width / 2; 
piga.y = eCanvas.height / 2; 
piga.bild.src = "./Paper-Bowser-icon.png";

/* Rita ut Bowser */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.x, piga.y);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();

}
/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function (e) {
    switch (e.key) {
        case "ArrowRight":
            piga.x +=5;
            piga.rot = 180 * (Math.PI / 180);
            break;
            case "ArrowLeft":
            piga.x -=5;
            break;
            case "ArrowUp":
            piga.y -=5;
            break;
            case "ArrowDown":
            piga.y +=5;
            break;
            
    }
});

/* Spel-looooopen */
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaPiga();

    requestAnimationFrame(gameLoop);  
}

/* Starta Spelet */
gameLoop();
