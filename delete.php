<?php
    include "db.php";
    if(isset($_GET['id'])) {
        $uid = $_GET['id'];
        $sql = "DELETE FROM user
                WHERE id = '$uid'";
        $isSuccess = $connection->query($sql);
        if($isSuccess){
            header("Location: read.php");
            exit();
        }
    }
?>