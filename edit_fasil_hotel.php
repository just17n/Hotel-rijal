<?php
    include "../../db/db_connect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = mysqli_query($db,"SELECT * FROM fasilitas_hotel WHERE id_fasilitas=$id");
        $ekstrak = mysqli_fetch_array($query);

    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Tambah Fasilitas Hotel</title>
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
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" autocomplete="off" value="<?= $ekstrak['nama_fasilitas']; ?>">
                            </div>
                            <div class="col-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $ekstrak['keterangan']; ?></textarea>
                            </div>
                            <div class="col-6">
                                <label for="gambar_fasilitas" class="form-label">Gambar Saat Ini</label>
                                <img src="../../images/fasilitas/<?= $ekstrak['image']; ?>" class="rounded" width="250" id="gambar_fasilitas">
                            </div>
                            <div class="col-6">
                                <label for="gambar_fasil" class="form-label">Upload Gambar</label>
                                <input type="file" name="gambar_fasil" id="gambar_fasil" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="identity" class="form-label">ID</label>
                                <input type="text" class="form-control" id="identity" name="identity" autocomplete="off" value="<?= $ekstrak['id_fasilitas']; ?>" readonly="true">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="daftar" class="btn btn-primary">Ubah Fasilitas Hotel</button>
                            </div>
                        </form>
                        <?php
                        include "../../db/db_connect.php";
                            if(isset($_POST['daftar'])){
                                $fasilitas = $_POST['fasilitas'];
                                $ket = $_POST['keterangan'];
                                $ID = $_POST['identity'];

                                $file = $_FILES['gambar_fasil']['name'];
                                $tmp_file = $_FILES['gambar_fasil']['tmp_name'];

                                $query = "UPDATE fasilitas_hotel SET nama_fasilitas='".$fasilitas."', keterangan='".$ket."', image='".$file."' WHERE id_fasilitas=$ID";
                                $exec = mysqli_query($db, $query);
                                if($exec){
                                    if(!empty($file)){
                                        $locate = "../../images/fasilitas/";
                                        move_uploaded_file($tmp_file,$locate.$file);
                                        ?>
                                            <script type="text/javascript">
                                                window.location.href = "index.php?page=fasilitas_hotel";
                                            </script>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Maaf!</strong> Gambar tidak boleh kosong
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Maaf!</strong> Gagal ubah fasilitas hotel
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>