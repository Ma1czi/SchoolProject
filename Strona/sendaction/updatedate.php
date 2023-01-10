<?php 
    include_once 'connecttodatabase.php';

    $id = $_POST['updateid'];
    $data = $_POST['updatedata'];
    $mw = $_POST['updatemw'];
    $az = $_POST['updateaz'];
    $nazwisko = $_POST['nazwisko'];

    $sql = "update wyjazdy set data='$data', miejsce_wyjazdu = '$mw', auto_zabrane = '$az', nazwisko = '$nazwisko' where id = '$id'";
    mysqli_query($conn, $sql);

    header("Location: ../index.php?signup=success");



?>