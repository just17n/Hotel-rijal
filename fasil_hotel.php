<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float-start"><h3>Kelola Fasilitas Umum Hotel</h3></div>
                    <div class="float-end"><a href="tambah_fasil_hotel.php" class="btn btn-sm btn-success">Tambah Fasilitas Hotel <i class="bi-person-plus-fill"></i></a></div>
                </div>
            </div>
            <div class="card-body">
                <table id="tabel_user" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fasilitas</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM fasilitas_hotel");
                            $no = 1;
                            while($ekstrak = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ekstrak['nama_fasilitas']?></td>
                                    <td><?= $ekstrak['keterangan']; ?></td>
                                    <td><img src="../../images/fasilitas/<?= $ekstrak['image']; ?>" width="170"></td>
                                    <td>
                                        <a href="edit_fasil_hotel.php?id=<?= $ekstrak['id_fasilitas']; ?>" class="btn btn-sm btn-warning"><i class="bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus?');" href="delete_fasil_hotel.php?id=<?= $ekstrak['id_fasilitas']; ?>" class="btn btn-sm btn-danger"><i class="bi-trash3-fill"></i></a>
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