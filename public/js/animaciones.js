var list = document.getElementById("list");
var menu = document.getElementById("menu");
menu.onclick = function () {
    list.classList.toggle ("active");
};

document.addEventListener("DOMContentLoaded", function() {
  const navbarLinks = document.querySelectorAll('.menu-bar a');
  const currentPage = "{{ request()->route()->getName() }}"; // Obtiene el nombre de la ruta actual en Laravel

  navbarLinks.forEach(link => {
    const page = link.getAttribute('data-page');
    if (page === currentPage) {
      link.classList.add('active');
    }
  });
});

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