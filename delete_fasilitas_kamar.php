<?php  
    include "../../db/db_connect.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query=mysqli_query($db, "DELETE FROM tipe_kamar WHERE id=$id");
        if($query){
            ?>
            <script type="text/javascript">
                window.location.href = "index.php?page=fasilitas_kamar";
            </script>
            <?php
        }
    }