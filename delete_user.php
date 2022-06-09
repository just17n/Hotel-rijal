<?php  
    include "../../db/db_connect.php";
    if(isset($_GET['id'])){
        $id_user = $_GET['id'];
        $query=mysqli_query($db, "DELETE FROM table_user WHERE id=$id_user");
        if($query){
            ?>
            <script type="text/javascript">
                window.location.href = "index.php?page=user";
            </script>
            <?php
        }
    }