<div class="row">
    <div class="col-12">
    <?php 
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <table class="table table-bordered" id="datatablesSimple">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat Lokasi</th>
                    <th>Koordinat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach ($lokasi as $key => $value) { ?>
                    <tr>
                        <td align="center"><?= $no++ ?></td>
                        <td><img src="<?= base_url('foto/' .$value['foto_lokasi']) ?>" width="100px"></td>
                        <td align="center"><?= $value['nama_lokasi']?></td>
                        <td><?= $value['alamat_lokasi']?></td>
                        <td align="center"><?= $value['latitude']?>, <?= $value['longitude']?></td>
                        <td align="center">
                        <div style="display: flex; flex-direction: row; gap: 10px;">
                            <a href ="<?= base_url('Lokasi/editLokasi/'.$value['id_lokasi']) ?>" class="btn btn-sm" style="background-color: #ffa500; color: white;">Edit</a>
                            <a href="<?= base_url('Lokasi/deleteLokasi/'.$value['id_lokasi']) ?>" class="btn btn-sm" style="background-color: #800000; color: white;" onclick="return confirm('Yakin hapus data?')">Delete</a>
                        </div>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>