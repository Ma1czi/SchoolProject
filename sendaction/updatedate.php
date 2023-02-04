<?php 
    include_once 'connecttodatabase.php';

    $id = $_POST['updateid'];
    if($id != null){

        //Set the values as they were

        $sql = "select data, miejsce_wyjazdu, auto_zabrane, nazwisko from wyjazdy where id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $data = $row["data"];
                $mw = $row["miejsce_wyjazdu"];
                $az = $row["auto_zabrane"];
                $nazwisko = $row["nazwisko"];
            }
         }

         //Change values if given
         
         if(!empty($_POST['updatedata']))
             $data = $_POST['updatedata'];
         if(!empty($_POST['updatemw']))
             $mw = $_POST['updatemw'];
         if(!empty($_POST['updateaz']))
             $az = $_POST['updateaz'];
         if(!empty($_POST['nazwisko']))
             $nazwisko = $_POST['nazwisko'];
    
         //Upgrade values

        $sql = "update wyjazdy set data='$data', miejsce_wyjazdu = '$mw', auto_zabrane = '$az', nazwisko = '$nazwisko' where id = '$id'";
        mysqli_query($conn, $sql);
    }

    header("Location: ../Sites/index.php?signup=success");

?>