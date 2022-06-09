<?php
    include "../../db/db_connect.php";

    if(isset($_GET['id'])){
        $id_user = $_GET['id'];

        $query = mysqli_query($db,"SELECT * FROM table_user WHERE id=$id_user");
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
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?= $ekstrak['username']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" autocomplete="off" value="<?= $ekstrak['password']; ?>">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $ekstrak['email']; ?>">
                            </div>
                            <div class="col-12">
                                <label for="identity" class="form-label">ID</label>
                                <input type="text" class="form-control" id="identity" name="identity" autocomplete="off" value="<?= $ekstrak['id']; ?>" readonly="true">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="daftar" class="btn btn-primary">Perbarui Data User</button>
                            </div>
                        </form>
                        <?php
                        include "../../db/db_connect.php";
                            if(isset($_POST['daftar'])){
                                $ID = $_POST['identity'];
                                $user = $_POST['username'];
                                $pass = $_POST['password'];
                                $email = $_POST['email'];

                                $query_update = "UPDATE table_user SET username='".$user."', password='".$pass."', email='".$email."' WHERE id = $ID";
                                $exec = mysqli_query($db, $query_update);
                                if($exec){
                                    ?>
                                        <script type="text/javascript">
                                            window.location.href = "index.php?page=user";
                                        </script>
                                    <?php
                                } else {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Maaf!</strong> edit data user gagal
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