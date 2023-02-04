<?php 
    include_once 'connecttodatabase.php';

    $id = $_POST['id'];
    $data = $_POST['data'];
    $mw = $_POST['miejsce_wyjazdu'];
    $az = $_POST['auto_zabrane'];
    $nazwisko = $_POST['nazwisko'];
    $bool = true;

    //Check if id is not used
        $sql = "SELECT id from wyjazdy";
        $result = mysqli_query($conn, $sql);
            
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($id == $row["id"]){
                    $bool = false;
                }
            }
        }
        if($bool){
            $sql = "insert into wyjazdy(id, data, miejsce_wyjazdu, auto_zabrane, nazwisko) values ('$id', '$data', '$mw', '$az', '$nazwisko')";
            mysqli_query($conn, $sql);

        }
            
    header("Location: ../Sites/index.php?signup=success");
?>