
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi">
        </div>
    </div>
    
    <div class="col-sm-12">
        <br>
       <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>
</div>

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
	center: [-7.427429912562925, 109.33625491907888],
	zoom: 16,
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

    var circle = L.circle([-7.427429912562925, 109.33625491907888],{
        radius: 500, 
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.2,
    })
    .addTo(map);

    var marker = L.marker([-7.427429912562925, 109.33625491907888], {
        draggable : true,
    });

    //mengambil coordinat saat marker dipindahkan
    marker.on('dragend', function(event) {
        var latlng = event.target.getLatLng();
        var distance = latlng.distanceTo(circle.getLatLng());
        
        if (distance <= circle.getRadius()) {
            //jika coordinat dalam radius lingkaran
            document.getElementById('Latitude').value= latlng.lat;
            document.getElementById('Longitude').value= latlng.lng;
            document.getElementById('Posisi').value= latlng.lat + ', ' + latlng.lng;
           
        }else {
            //jika coordinat diluar radius lingkaran
            alert('Maaf, Titik coordinat yang diambil berada di luar jangkauan');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value= '';
            document.getElementById('Longitude').value= '';
            document.getElementById('Posisi').value= '';
        }
        
    });

    //mengambil coordinat saat map diclick
    map.on('click', function(event){
        var latlng = event.latlng;
        var distance = latlng.distanceTo(circle.getLatLng());
        if (distance <= circle.getRadius()){

            if (!marker){
                marker = L.marker(event.latlng).addTo(map);
            }else {
                marker.setLatLng(event.latlng);
            }
            document.getElementById('Latitude').value= latlng.lat;
            document.getElementById('Longitude').value= latlng.lng;
            document.getElementById('Posisi').value= latlng.lat + ', ' + latlng.lng;
        
        } else {
            alert('Maaf, Titik coordinat yang diambil berada di luar jangkauan');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value= '';
            document.getElementById('Longitude').value= '';
            document.getElementById('Posisi').value= '';

        }
    });

    map.addLayer(marker);
</script>