var list = document.getElementById("list");
var menu = document.getElementById("menu");
menu.onclick = function () {
    list.classList.toggle ("active");
}

var options = document.querySelectorAll('.options');
function activeLink() {
    options.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active')
}
options.forEach((item) => item.addEventListener('click',activeLink));

var carrusel = document.querySelector('.carrusel');
var slides = document.querySelectorAll('.slide');
var atras = document.querySelector('.atras');
var siguiente = document.querySelector('.siguiente');
let slideIndex = 0;

atras.addEventListener('click', () => {
  slideIndex = Math.max(slideIndex - 1, 0);
  carrusel.style.transform = `translateX(-${slideIndex * 100}%)`;
});

siguiente.addEventListener('click', () => {
  slideIndex = Math.min(slideIndex + 1, slides.length - 1);
  carrusel.style.transform = `translateX(-${slideIndex * 100}%)`;
});