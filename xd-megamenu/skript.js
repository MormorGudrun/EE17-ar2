/* Element vi använder */
const overlay = document.querySelector('#overlay');
const closeMenu = document.querySelector('#close-menu');
const openMenu = document.querySelector('#open-menu');

/* Vad händer när man klickar på hamburgar-menyn */
openMenu.addEventListener('click', toggleOverlay);

/* Vad händer när man klickar på kryss-menyn */
closeMenu.addEventListener('click', toggleOverlay);

function toggleOverlay() {
    overlay.classList.toggle('show-menu');
}
