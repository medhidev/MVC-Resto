<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte OSM avec Point Marqué</title>

    <!-- Importation de Leaflet (Affichage sur la page) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body>

<!-- Affichage du  -->
<div id="map" style="height: 200px;"></div>
<script>
    // données récupérer dans la Base de donnée
    const adresse = "37 boulevard de la gare";
    const ville = "Toulouse";

    // API (requête) adresse et ville -> Longitude, latitude
    const apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${adresse}, ${ville}`;

    // execution de l'API en Js
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("Réponse de l'API:", data);

            // récupération des données par l'API
            const latitude = data[0].lat;
            const longitude = data[0].lon;

            // Coordonnée en console
            console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

            // Initialiser la carte Leaflet
            const mymap = L.map('map').setView([latitude, longitude], 13);

            // Ajouter une couche de carte OSM
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            }).addTo(mymap);

            // Ajouter un marqueur à la position spécifiée
            L.marker([latitude, longitude]).addTo(mymap);
        })
        // Erreur
        .catch(error => console.error("Erreur lors de la requête:", error));

</script>

</body>
</html>
