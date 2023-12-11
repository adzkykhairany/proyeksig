<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
   var Grayscale = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var Sattelite = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });

    var Street = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var Night = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });

    var Stadia_Dark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
                minZoom: 0,
                maxZoom: 20,
                attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                ext: 'png'
    });

    const map = L.map('map', {
	center: [-2.2370486386437722, 117.59601205749165],
	zoom: 5,
	layers: [Street]
    });

    const baseLayers = {
	'Grayscale': Grayscale,
	'Sattelite': Sattelite,
    'Street': Street,
    'Night': Night,
    'Stadia Dark': Stadia_Dark
    };

    const layerControl = L.control.layers(baseLayers,null,{collapsed:false}).addTo(map);

    //geojson
    $.getJSON("<?= base_url('provinsi/11.geojson')?>", function(data) {
        L.geoJson(data, {
            style : function(feature){
                return{
                    color: 'red',
                    fillOpacity: 1.0,
                }

            }
        })
        .bindPopup("<b>Wilayah A</b><br>" + "Nama : Aceh")
        .addTo(map);
    });

    $.getJSON("<?= base_url('provinsi/12.geojson')?>", function(data) {
        L.geoJson(data, {
            style : function(feature){
                return{
                    color: 'green',
                    fillOpacity: 1.0,
                }

            }
        })
        .bindPopup("<b>Wilayah B</b><br>" + "Nama : Sumatera Barat")
        .addTo(map);
    });
</script>