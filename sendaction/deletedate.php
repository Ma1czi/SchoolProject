<?php 
    include_once 'connecttodatabase.php';

    $id = $_POST['deleteid'];
    $sql = "delete from wyjazdy where id = '$id'";
    mysqli_query($conn, $sql);

    header("Location: ../Sites/index.php?signup=success");

?>