<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="vendor/leaflet/leaflet.css" />
</head>
<body>
    <div id="map" style="height:600px;"></div>
    <div id="listado-choferes"></div>
    <script src="vendor/leaflet/leaflet.js"></script>
    <script src="vendor/moment/moment-with-locales.min.js"></script>
    <script>

    var recuperandoDatos = false;
    var capaMarcadores;
    var centrado = false;
    window.addEventListener('load', function(){



        moment.locale('es');
        var map = L.map('map').setView([-35.4264, -71.65542], 13);

        // se define que mapa se utilizará.
        var capaMapa = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // se crea la capa que agrupa a los marcadores o choferes
        capaMarcadores = L.featureGroup().addTo(map);

        // se define una funcion que se ejecuta cada n millisegundos
        setInterval(async function(){
            // si la ultima solicitud aun no termina, se evita generar una nueva.
            if (!recuperandoDatos){
                var result = await recuperarDatosUbicacion();
                // se eliminan los marcadores del mapa y se dibujan nuevamente
                capaMarcadores.clearLayers();
                result.map(function(d){
                    let last = moment(d.fecha);
                    let marker = L.marker([d.latitud, d.longitud]);
                    marker.bindPopup(`Chofer: ${d.nombre}<br> A las: ${last.format('h:mm a [del] DD/MM/YYYY')}`);

                    marker.addTo(capaMarcadores)
                });

                if (result.length > 0 && !centrado){
                    map.panTo(new L.LatLng(result[0].latitud, result[0].longitud));
                    centrado = true;
                }
            }
        }, 3000);
    });


    async function recuperarDatosUbicacion(){
        let xhr = new XMLHttpRequest();
        recuperandoDatos = true;
        let result = await makeRequest("GET", "location.php?rutCliente=96885930");
        recuperandoDatos = false;
        return JSON.parse(result);
    }


    function htmlChofer(chofer){
        let div = document.createElement("div");
        let label = document.createElement("label");
        let input = document.createElement("input");
        // se crea el checkbox
        input.setAttribute("class", "checkbox-chofer");
        input.setAttribute("type", "checkbox");
        input.setAttribute("id", "checkbox-" + chofer.rut);
        input.setAttribute("data-rut", chofer.rut);
        // se crea el label del checkbox
        label.innerHTML = chofer.nombre;
        label.setAttribute('for', "checkbox-" + chofer.rut)
        // se agregan ambos a un div
        div.appendChild(input);
        div.appendChild(label);
        return div;
    }

    function makeRequest(method, url) {
        return new Promise(function (resolve, reject) {
            let xhr = new XMLHttpRequest();
            xhr.open(method, url);
            xhr.onload = function () {
                if (this.status >= 200 && this.status < 300) {
                    resolve(xhr.response);
                } else {
                    reject({
                        status: this.status,
                        statusText: xhr.statusText
                    });
                }
            };
            xhr.onerror = function () {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            };
            xhr.send();
        });
    }
    </script>
</body>
</html>
