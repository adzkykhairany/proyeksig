<div class="row">
    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 100vh;"></div>    
    </div>

<div class="col-sm-4">
    <div class="row">
        <?php 
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <?php $errors = validation_errors() ?>
        <?php echo form_open_multipart('Lokasi/updateData/' . $lokasi['id_lokasi'])?>

        <div class="form-group">
            <label>Nama Lokasi</label>
            <input class="form-control" name="nama_lokasi" value="<?= $lokasi['nama_lokasi'] ?>">
            <p class="text-danger"><?= isset($errors['nama_lokasi']) == isset($errors['nama_lokasi']) ? validation_show_error('nama_lokasi') : ''  ?></p>
        </div>

        <div class="form-group">
            <label>Alamat Lokasi</label>
            <input class="form-control" name="alamat_lokasi" value="<?= $lokasi['alamat_lokasi'] ?>">
            <p class="text-danger"><?= isset($errors['alamat_lokasi']) == isset($errors['alamat_lokasi']) ? validation_show_error('alamat_lokasi') : ''  ?></p>
        </div>

        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude" value="<?= $lokasi['latitude'] ?>">
            <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude']) ? validation_show_error('latitude') : ''  ?></p>
        </div>

        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude" value="<?= $lokasi['longitude'] ?>">
            <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude']) ? validation_show_error('longitude') : ''  ?></p>
        </div>

        <div class="form-group">
            <label>Foto Lokasi</label>
            <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
            <p class="text-danger"><?= isset($errors['foto_lokasi']) == isset($errors['foto_lokasi']) ? validation_show_error('foto_lokasi') : ''  ?></p>
            <img src="<?= base_url('foto/' . $lokasi['foto_lokasi']) ?>" width="200px">
        </div>

        <br>
        <button type="submit" class="btn" style="background-color: #000080; color: white;">Simpan</button>
        <a href="<?= base_url('Lokasi') ?>" class="btn" style="background-color: #800000; color: white;">Kembali</a>

        <?php echo form_close()?>

    </div>
</div>
</div>

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
	center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>],
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


    //get coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");
    var curLocation = [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable : true,
    });

    //mengambil coordinat saat marker dipindahkan
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation, 
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng);
    });

    //mengambil coordinat saat map diclick
    map.on('click', function(e){
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker){
            marker = L.marker(e.latlng).addTo(map);
        }else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
        posisi.value = lat + ', ' + lng;
    });

    map.addLayer(marker);

</script>