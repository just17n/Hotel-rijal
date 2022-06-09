<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Tambah Fasilitas Kamar</title>
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
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Suite">Suite</option>
                                    <option value="VIP">VIP</option>
                                    <option value="VVIP">VVIP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jml_kamar" class="form-label">Jumlah Kamar Tersedia</label>
                                <input type="number" class="form-control" id="jml_kamar" name="jml_kamar" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="daftar" class="btn btn-primary">Tambah Fasilitas Kamar</button>
                            </div>
                        </form>
                        <?php
                        include "../../db/db_connect.php";
                            if(isset($_POST['daftar'])){
                                $tipe = $_POST['tipe_kamar'];
                                $jml_kamar = $_POST['jml_kamar'];
                                $fasil = $_POST['fasilitas'];

                                $query = "INSERT INTO tipe_kamar VALUES(DEFAULT,'".$tipe."','".$fasil."','".$jml_kamar."')";
                                $exec = mysqli_query($db, $query);
                                if($exec){
                                    ?>
                                        <script type="text/javascript">
                                            window.location.href = "index.php?page=fasilitas_kamar";
                                        </script>
                                    <?php
                                } else {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Maaf!</strong> Gagal tambah jumlah kamar
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