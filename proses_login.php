<?php

    session_start();
    include "../../db/db_connect.php";

    // if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($db, "SELECT * FROM table_user WHERE username='".$username."' AND password='".$password."'");

        $ekstrak = mysqli_fetch_array($query);
        $role = $ekstrak['role'];

        if($role == 'administator'){
            $_SESSION['user'] = $ekstrak['email'];
            ?>
                <script type="text/javascript">
                    window.location.href = '../admin_hotel/index.php?page=dashboard';
                </script>
            <?php
        } else if($role == 'receptionist'){
            $_SESSION['user'] = $ekstrak['email'];
            ?>
                <script type="text/javascript">
                    window.location.href = '../receptionist/index.php?page=';
                </script>
            <?php
        } else if($role == 'guest') {
            $_SESSION['id_user'] = $ekstrak['id'];
            $_SESSION['user'] = $ekstrak['email'];
            ?>
                <script type="text/javascript">
                    window.location.href = '../user/index.php?page=dashboard';
                </script>
            <?php
        }
    