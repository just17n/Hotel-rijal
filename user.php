<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float-start"><h3>Kelola User</h3></div>
                    <div class="float-end"><a href="tambah_user.php" class="btn btn-sm btn-success">Tambah User <i class="bi-person-plus-fill"></i></a></div>
                </div>
            </div>
            <div class="card-body">
                <table id="tabel_user" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM table_user WHERE role NOT IN ('administator')");
                            $no = 1;
                            while($ekstrak = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ekstrak['email']?></td>
                                    <td><?= $ekstrak['username']; ?></td>
                                    <td>
                                        <a href="preview_user.php?id=<?= $ekstrak['id']; ?>" class="btn btn-sm btn-primary"><i class="bi-eye-fill"></i></a>
                                        <a href="edit_user.php?id=<?= $ekstrak['id']; ?>" class="btn btn-sm btn-warning"><i class="bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus?');" href="delete_user.php?id=<?= $ekstrak['id']; ?>" class="btn btn-sm btn-danger"><i class="bi-trash3-fill"></i></a>
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