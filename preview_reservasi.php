<?php
    include "../../db/db_connect.php";

    if(isset($_GET['id'])){
        $id_reservasi = $_GET['id'];

        $query = mysqli_query($db,"SELECT * FROM reservasi WHERE id_reservasi=$id_reservasi");
        $ekstrak = mysqli_fetch_array($query);

    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Edit User</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../dist/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="kembali">
                    <button class="btn btn-md btn-outline-dark btn-light" onclick="history.back();"><i class="bi-arrow-90deg-left"></i> Kembali</button>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <form class="row g-3" method="post">
                            <div class="col-md-6">
                                <label for="username" class="form-label">kode kamar</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?= $ekstrak['kode_kamar']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">id</label>
                                <input type="text" class="form-control" id="password" name="password" autocomplete="off" value="<?= $ekstrak['id_tamu']; ?>" disabled>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">nama tamu</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['nama_tamu']; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['email']; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">no telp</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['no_telepon']; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">tipe kamar</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['tipe_kamar']; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">jumlah kamar</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['jml_kamar']; ?>" disabled>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>