<?php
    session_start();
    $user = $_SESSION['user'];
    $id = $_SESSION['id_user'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Tamu</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../dist/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a5cdcf;">
        <div class="container">
            <a class="navbar-brand" href="?page=dashboard"><b>Hotel Trio</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($_GET['page']=='dashboard') ? 'active':''; ?>" href="?page=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($_GET['page']=='kamar') ? 'active':''; ?>" href="?page=kamar">Kamar</a>
                        </li>
                       <!-- <li class="nav-item">
                            <a class="nav-link <?php //echo ($_GET['page']=='fasilitas') ? 'active':''; ?>" href="?page=fasilitas">Reservasi</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link <?php //echo ($_GET['page']=='order') ? 'active':''; ?>" href="?page=order">Pesan Kamar</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-outline-danger text-white" href="../../db/logout.php"><?= $user; ?> <i class="bi-box-arrow-in-up"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <div class="container mt-5">
        <?php
            include "../../db/db_connect.php";
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page == ''){
                    require "dashboard_user.php";
                } else if($page == 'dashboard'){
                    require "dashboard_user.php";
                } else if($page == 'kamar'){
                    require "list_kamar.php";
                } else if($page == 'order'){
                    require "pesan_kamar.php";
                }else if($page == 'fasilitas'){
                    require "fasilitas.php";
                } else {
                    require "404.php";
                }
            }
        ?>
    </div>

    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>