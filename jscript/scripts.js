const lateralIzquierdo = document.querySelector('#lateral-izquierdo');

document.querySelector('#menuLateralIzquierdoMostrar').addEventListener('click', () => {
    lateralIzquierdo.classList.toggle('active');
})

window.addEventListener('load', function () {
    new Glider(document.querySelector('.carousel'), {
        slidesToShow: 1,
        scrollLock: true,
        scrollLockDelay:20,
        dots: '.carousel-indicador',
        draggable: true,
        rewind: true,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });
});

var abrir = document.getElementById('abrir-correo'),
    overlay = document.getElementById('overlay'),
    cerrar = document.getElementById('cerrar');

abrir.addEventListener('click', () => {
    abrirPopUp();
})

cerrar.addEventListener('click', () => {
    cerrarPopUp();
})

function abrirPopUp() {
    overlay.classList.add('active');
};

function cerrarPopUp() {
    overlay.classList.remove('active');
}
