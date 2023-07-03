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