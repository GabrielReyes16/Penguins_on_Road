var map = L.map('map').setView([-12.04434, -76.95324], 10);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-12.04434, -76.95324]).addTo(map)
    .bindPopup('Tecsup')
    .openPopup();

L.marker([-12.01485, -76.89796]).addTo(map)
    .bindPopup('Huachipa')
    .openPopup();
