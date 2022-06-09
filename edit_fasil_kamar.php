<?php
    include "../../db/db_connect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = mysqli_query($db,"SELECT * FROM tipe_kamar WHERE id=$id");
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
                                <label for="tipe_kamar" class="form-label">Tipe</label>
                                <select class="form-select" aria-label="Pilih Tipe Kamar" name="tipe_kamar">
                                    <option selected>Pilih Kamar</option>
                                    <option value="Single" <?= ($ekstrak['tipe'] == 'Single')? 'selected':''; ?> >Single</option>
                                    <option value="Double" <?= ($ekstrak['tipe'] == 'Double')? 'selected':''; ?> >Double</option>
                                    <option value="Suite" <?= ($ekstrak['tipe'] == 'Suite')? 'selected':''; ?> >Suite</option>
                                    <option value="VIP" <?= ($ekstrak['tipe'] == 'VIP')? 'selected':''; ?> >VIP</option>
                                    <option value="VVIP" <?= ($ekstrak['tipe'] == 'VVIP')? 'selected':''; ?> >VVIP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jml_kamar" class="form-label">Jumlah Kamar Tersedia</label>
                                <input type="number" class="form-control" id="jml_kamar" name="jml_kamar" autocomplete="off" value="<?= $ekstrak['jumlah_kamar']; ?>">
                            </div>
                            <div class="col-12">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3"><?= $ekstrak['fasilitas']; ?></textarea>
                            </div>
                            <div class="col-12">
                                <label for="identity" class="form-label">ID</label>
                                <input type="text" class="form-control" id="identity" name="identity" autocomplete="off" value="<?= $ekstrak['id']; ?>" readonly="true">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="daftar" class="btn btn-primary">Perbarui Data Fasilitas Kamar</button>
                            </div>
                        </form>
                        <?php
                        include "../../db/db_connect.php";
                            if(isset($_POST['daftar'])){
                                $ID = $_POST['identity'];
                                $tipe_kamar = $_POST['tipe_kamar'];
                                $jml_kamar = $_POST['jml_kamar'];
                                $fasilitas = $_POST['fasilitas'];

                                $query_update = "UPDATE tipe_kamar SET tipe='".$tipe_kamar."', fasilitas='".$fasilitas."', jumlah_kamar='".$jml_kamar."' WHERE id = $ID";
                                $exec = mysqli_query($db, $query_update);
                                if($exec){
                                    ?>
                                        <script type="text/javascript">
                                            window.location.href = "index.php?page=fasilitas_kamar";
                                        </script>
                                    <?php
                                } else {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Maaf!</strong> Gagal ubah data fasilitas kamar
                                        <?php echo $query_update; ?>
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