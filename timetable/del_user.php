<?php
    include 'db.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `user` WHERE `user_id` ='$id'";
    $res = mysqli_query($db,$del);
    header('location:users.php');
?>