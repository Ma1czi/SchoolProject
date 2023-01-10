<?php 
    include_once 'connecttodatabase.php';

    $id = $_POST['id'];
    $data = $_POST['data'];
    $mw = $_POST['miejsce_wyjazdu'];
    $az = $_POST['auto_zabrane'];
    $nazwisko = $_POST['nazwisko'];

    $sql = "insert into wyjazdy(id, data, miejsce_wyjazdu, auto_zabrane, nazwisko) values ('$id', '$data', '$mw', '$az', '$nazwisko')";
    mysqli_query($conn, $sql);

    header("Location: ../index.php?signup=success");
?>