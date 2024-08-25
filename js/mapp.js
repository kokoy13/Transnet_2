//Declare empty array
let markersF = [];
let markersO = [];
let markersD = [];

//foreach get latitude lognitude
for (let element of coordinatF) {
    //Casting from String to Float
    let latitude = parseFloat(element['latitude']);
    let longitude = parseFloat(element['longitude']);
    
    // Check if latitude and longitude are valid numbers
    if (!isNaN(latitude) && !isNaN(longitude)) {
        let marker = L.marker([latitude, longitude]).bindPopup(element['customername']).openPopup();
        markersF.push(marker);
    }
}
//foreach get latitude lognitude
for (let element of coordinatO) {
    //Casting from String to Float
    let latitude = parseFloat(element['latitude']);
    let longitude = parseFloat(element['longitude']);
    
    // Check if latitude and longitude are valid numbers
    if (!isNaN(latitude) && !isNaN(longitude)) {
        let marker = L.marker([latitude, longitude]).bindPopup(element['customername']).openPopup();
        markersO.push(marker);
    }
}
//foreach get latitude lognitude
for (let element of coordinatD) {
    //Casting from String to Float
    let latitude = parseFloat(element['latitude']);
    let longitude = parseFloat(element['longitude']);
    
    // Check if latitude and longitude are valid numbers
    if (!isNaN(latitude) && !isNaN(longitude)) {
        let marker = L.marker([latitude, longitude]).bindPopup(element['customername']).openPopup();
        markersD.push(marker);
    }
}

//Declare overlay variable
var family = L.featureGroup(markersF);
var office = L.featureGroup(markersO);
var dedicated = L.featureGroup(markersD);

//Declare BaseMap Variable
var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
});

//Create a map
var map = L.map('map', {
    center: [-0.937929726257776, 100.35388378275309],
    zoom: 13,
    layers: [osm, family, office, dedicated]
});

//Assigment Basemap
var baseMaps = {
"Padang": osm,
};

//Assigment Overlay
var overlayMaps = {
    "Family": family,
    "Office": office,
    "Dedicated": dedicated
};

//Create layerControl
var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);