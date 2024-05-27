const actionButton = document.querySelector('.action-button');
const miniMenu = document.querySelector('.nav-items-mini');

if (miniMenu) {
    actionButton.addEventListener('click', function () {
        miniMenu.classList.toggle('show');
    });
} else {
    console.log('Mini menu not found.');
}