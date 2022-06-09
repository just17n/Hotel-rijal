<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float-start"><h3>Kelola Fasilitas Kamar</h3></div>
                </div>
            </div>
            <div class="card-body">
                <table id="tabel_reserv" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Tamu</th>
                            <th>Tipe Kamar</th>
                            <th>Tanggal Check In</th>
                            <th>Tanggal Check Out</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM reservasi");
                            $no = 1;
                            while($ekstrak = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ekstrak['nama_tamu']?></td>
                                    <td><?= $ekstrak['tipe_kamar']; ?></td>
                                    <td><?= $ekstrak['tgl_check_in']; ?></td>
                                    <td><?= $ekstrak['tgl_check_out']; ?></td>
                                    <td>
                                        <a href="preview_reservasi.php?id=<?= $ekstrak['id_reservasi']; ?>" class="btn btn-sm btn-primary"><i class="bi-eye-fill"></i></a>
                                        
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