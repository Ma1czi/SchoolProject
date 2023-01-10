<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomoc Drogowa</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="naglowek">
        <img src="../Obrazy/Klucz.jpg" alt="" width="2%"> 
        <h1>Mikołaj Bulzacki - Pomoc drogowa</h1>
        <img src="../Obrazy/Klucz.jpg" alt="" width="2%">
    </div>
    <div class="cialo">
        <h2>SELECT * FROM WYJAZDY</h2>
		<table id="base"> 
			<tr>
				<th>Id</th>
				<th>Data</th>
				<th>Miejsce wyjazdu</th>
				<th>Auto zabrane</th>
				<th>Nazwisko</th>
				
			</tr>
            <?php
                include_once 'sendaction/connecttodatabase.php';

                //test connection
				if (!$conn){
				die("Connection failed: " . mysqli_connect_error());
				}
				
				$sql = "SELECT id, data, miejsce_wyjazdu, auto_zabrane, nazwisko from wyjazdy";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["data"]."</td><td>".$row["miejsce_wyjazdu"]."</td><td>".$row["auto_zabrane"]."</td><td>".$row["nazwisko"]."</td></tr>";
				}
				}
				mysqli_close($conn);
			?>
		</table>
    </div>
    <div class="cialo" style="border-left: none;">
        <table id="base">
            <tr>
                <th colspan="2" class="idu">INSERT</th>
            </tr>
            <tr>
                <form method="POST" action="sendaction/senddate.php">
                    <td>
                        <input type="number" name="id" id="" min="1">
                        <input type="date" name="data" id="">
                        <input type="text" name="miejsce_wyjazdu" id="" placeholder="Miejsce Wyjazdu">
                        <input type="text" name="auto_zabrane" id="" placeholder="Auto Zabrane">
                        <input type="text" name="nazwisko" id="" placeholder="Nazwisko">
                    </td>
                    <td><input type="submit" value="Zapisz" class="button"></td>
                </form>
            </tr>
            <tr>
                <th colspan="2" class="idu">DELETE</th>
            </tr>
            
            <tr>
                <form action="sendaction/deletedate.php" method="POST">
                    <td><input type="number" name="deleteid" id="" min="1"></td>
                    <td><input type="submit" value="usuń" class="button"></td>
                </form>
                </tr>
            <tr>
                <th colspan="2" class="idu">UPDATE</th>
            </tr>
            <tr>
                <form action="sendaction/updatedate.php" method="POST">

                    <td>
                        <input type="number" name="updateid" id="" min="1">
                        <input type="date" name="updatedata" id="">
                        <input type="text" name="updatemw" id="" placeholder="Miejsce Wyjazdu">
                        <input type="text" name="updateaz" id="" placeholder="Auto Zabrane">
                        <input type="text" name="nazwisko" id="" placeholder="Nazwisko">
                    </td>
                    <td>
                        <input type="submit" value="Popraw" class="button">
                    </td>
                </form>
            </tr>


        </table>
    </div>
</body>
</html>

