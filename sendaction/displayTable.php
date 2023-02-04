<?php 

    //Display table

    $sql = "SELECT id, data, miejsce_wyjazdu, auto_zabrane, nazwisko from wyjazdy";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>".$row["id"]."</th><td>".$row["data"]."</td><td>".$row["miejsce_wyjazdu"]."</td><td>".$row["auto_zabrane"]."</td><td>".$row["nazwisko"]."</td></tr>";
        }
    }

    //Reset auto_increment id
    
    $sql = "SELECT id from wyjazdy order by id desc limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_num_rows($result);
        $sql = "alter table wyjazdy auto_increment = $result";
        mysqli_query($conn, $sql);
    }else{
        $sql = "alter table wyjazdy auto_increment = 0";
        mysqli_query($conn, $sql);
    }
    mysqli_close($conn);

?>