<?php 
session_start();
include_once '../addlogs.php';
$logfilepath = '../LogFile.txt';

if(!empty($_GET['logout'])){
    $error = $_SESSION['username']." Log out";
    AddLog($error, $logfilepath);
    $_SESSION['login'] = false;
    $_SESSION['remme'] = null;
    $_SESSION['username'] = null;
}
if($_SESSION['login'] == false || empty($_SESSION['login'])){
    header("Location: ../");
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomoc Drogowa</title>
    <link rel="stylesheet" href="../Styles/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>
<body>
    <div id="naglowek">
        <div id="nagleft">
            <h1>Mikołaj Bulzacki - Pomoc drogowa </h1>

        </div>
        <div id="nagright">
            <form action="" method="get">
                <label for="logout"><i class="fa fa-sign-out-alt"></i></label><input type="submit" name="logout" id="logout">
            </form>

        </div>
        <br>
        
        <div style="clear: both"></div>
        User: <?php echo $_SESSION['username']; ?>
    </div>
    <div class="cialo">
        <h2>SELECT * FROM WYJAZDY</h2>
        <div id="lewa">

            <table id="base"> 
                <tr>
                    <th>Id</th>
                    <th>Data</th>
                    <th>Miejsce wyjazdu</th>
                    <th>Auto zabrane</th>
                    <th>Nazwisko</th>         
                </tr>
                
                <?php
                    include_once '../sendaction/connecttodatabase.php';
                    include '../sendaction/displayTable.php';
                ?>
		</table>
    </div>
    </div>
    <div class="cialo" style="border-left: none;">
        <table id="prawa">
            <tr>
                <th colspan="2" class="idu">INSERT</th>
            </tr>
            <tr>
                <form method="POST" action="../sendaction/senddate.php">
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
                <form action="../sendaction/deletedate.php" method="POST">
                    <td><input type="number" name="deleteid" id="" min="1"></td>
                    <td><input type="submit" value="usuń" class="button"></td>
                </form>
                </tr>
            <tr>
                <th colspan="2" class="idu">UPDATE</th>
            </tr>
            <tr>
                <form action="../sendaction/updatedate.php" method="POST">

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
            <tr>
                <td></td>
                <form action="../sendaction/sortId.php" method="POST">
                    <td><input type="submit" value="SortID" class="button"></td>
                </form>
            </tr>


        </table>
    </div>
</body>
</html>

