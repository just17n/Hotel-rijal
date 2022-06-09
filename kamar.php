<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float-start"><h3>Kelola Kamar</h3></div>
                    <div class="float-end"><a href="tambah_kamar.php" class="btn btn-sm btn-success">Tambah Kamar <i class="bi-person-plus-fill"></i></a></div>
                </div>
            </div>
            <div class="card-body">
                <table id="tabel_user" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="30">Kode Kamar</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM kamar");
                            $no = 1;
                            while($ekstrak = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td>KMR-<?= $ekstrak['kode_kamar']?></td>
                                    <td><b><?= $ekstrak['tipe']; ?></b></td>
                                    <td>Rp.<?= $ekstrak['harga']; ?> /malam</td>
                                    <td><img src="../../images/kamar/<?php echo $ekstrak['image']; ?>" width="170"></td>
                                    <td>
                                        <a href="preview_kamar.php?id=<?= $ekstrak['kode_kamar']; ?>" class="btn btn-sm btn-primary"><i class="bi-eye-fill"></i></a>
                                        <a href="edit_kamar.php?id=<?= $ekstrak['kode_kamar']; ?>" class="btn btn-sm btn-warning"><i class="bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus?');" href="delete_kamar.php?id=<?= $ekstrak['kode_kamar']; ?>" class="btn btn-sm btn-danger"><i class="bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>