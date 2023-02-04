<?php
include_once '../addlogs.php';

if(!empty($_POST['register'])){
    
    //Connecttodatabase
    include_once '../sendaction/connecttodatabase.php';
    $logfilepath = '../LogFile.txt';

    //Set values
    $username = htmlspecialchars($_POST['username']);
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    //Check values
    $sql = "SELECT username from accounts where username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($pass != $repass || empty($pass) || empty($repass)){
        $error = "Incorrect passwords";
    }elseif(mysqli_num_rows($result) != 0){
        $error =  "Username is used";
    }else{

        //password_hash
        $pass = htmlspecialchars(password_hash($pass, PASSWORD_DEFAULT));
        $sql = "insert into accounts (username, password) values ('$username', '$pass')";
        
        //Add user into database
        mysqli_query($conn, $sql);

        $error = "Registery succesfull";
        $logcommunicat = $username." Succesfull register account";
        AddLog($logcommunicat, $logfilepath);

        session_start();
        $_SESSION['username'] = $username; 

        header("Location: ../index.php");
    }
    
}
?>

<!--Page appearance-->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="../Styles/Login.css" type="text/css">
</head>
<body>
    <div class="login">
        <h1>Registery</h1>
        <?php

        //Display error
        if(!empty($error)){
            echo $error;
        }
        ?>
        <form action="" method="post">
            <label for="username"><i class="fas fa-user"></i> </label>
            <input type="text" name="username" id="username" placeholder="UserName" required><br>
            <label for="pass"><i class="fas fa-lock"></i></label>
            <input type="password" name="pass" id="pass" placeholder="Password" required minlength="8"><br>
            <label for="repass"><i class="fas fa-lock"></i></label>
            <input type="password" name="repass" id="repass" placeholder="Repeate Password" required minlength="8"><br>
            <br>
            <input type="submit" value="Register" name="register">
        </form>
        <br>
        <a href="../index.php">Login</a>
    </div>
</body>
</html>