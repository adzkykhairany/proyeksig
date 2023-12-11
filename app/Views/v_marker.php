<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    const map = L.map('map').setView([-7.427429912562925, 109.33625491907888], 16);
    
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

    //=== marker ====//

    L.marker([-7.428209894478081, 109.33908849819619])
        .bindPopup("<img src='https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=HXvMkjABGOMJQK5fElG-bA&cb_client=search.gws-prod.gps&w=408&h=240&yaw=188.09697&pitch=0&thumbfov=100' width='100%'>" +
                "<b>Wisma Damai</b><br>"+
                "Alamat : Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371")
        .addTo(map);
    L.marker([-7.426954514805077, 109.3394049988359])
        .bindPopup("<img src='https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=wKw2mLO181kENxRVLLOlbg&cb_client=search.gws-prod.gps&w=408&h=240&yaw=232.5172&pitch=0&thumbfov=100' width='100%'>" +
                "<b>Kost Griya Putri Hanny</b><br>"+
                "Alamat : Jl. Kendil Wesi No.01, RW.04, Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371")
        .addTo(map);
    L.marker([-7.425377628125897, 109.33495983932136])
        .bindPopup("<img src='<?= base_url('gambar/wismasoedirman.jpg') ?>' width='100%'>" +
                "<b>Wisma Soedirman</b><br>"+
                "Alamat : H8FP+P26, Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371")
        .addTo(map);
</script>