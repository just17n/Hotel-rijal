<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float-start"><h3>Kelola Fasilitas Kamar</h3></div>
                    <div class="float-end"><a href="tambah_fasil_kamar.php" class="btn btn-sm btn-success">Tambah Fasilitas Kamar <i class="bi-person-plus-fill"></i></a></div>
                </div>
            </div>
            <div class="card-body">
                <table id="tabel_user" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipe</th>
                            <th>Fasilitas</th>
                            <th>Jumlah Kamar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM tipe_kamar");
                            $no = 1;
                            while($ekstrak = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ekstrak['tipe']?></td>
                                    <td><?= $ekstrak['fasilitas']; ?></td>
                                    <td><?= $ekstrak['jumlah_kamar']; ?></td>
                                    <td>
                                        <a href="edit_fasil_kamar.php?id=<?= $ekstrak['id']; ?>" class="btn btn-sm btn-warning"><i class="bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus?');" href="delete_fasilitas_kamar.php?id=<?= $ekstrak['id']; ?>" class="btn btn-sm btn-danger"><i class="bi-trash3-fill"></i></a>
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