<?php
    include 'db.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `class` WHERE `class_id` ='$id'";
    $res = mysqli_query($db,$del);
    header('location:classes.php');
?>