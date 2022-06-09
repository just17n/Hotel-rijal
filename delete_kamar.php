<?php  
    include "../../db/db_connect.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query=mysqli_query($db, "DELETE FROM kamar WHERE kode_kamar=$id");
        if($query){
            ?>
            <script type="text/javascript">
                window.location.href = "index.php?page=kamar";
            </script>
            <?php
        }
    }