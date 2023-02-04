<?php
    include_once 'connecttodatabase.php';
    $sql = "select id from wyjazdy";
	$result = mysqli_query($conn, $sql);
    $i = 1;
				
	if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            $sql = "update wyjazdy set id='$i' where id=$row[id]";
            mysqli_query($conn, $sql);
            $i++;
        }
	}




    header("Location: ../Sites/index.php?signup=success");
?>