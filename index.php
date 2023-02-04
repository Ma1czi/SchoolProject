<?php
    session_start();
    include_once 'addlogs.php';
    $logfilepath = 'LogFile.txt';
    
    //Forwarding user to main page if he marks 'remember me'
    if(!empty($_SESSION['remme'])){
        header("Location: Sites/");
    }
    
    if(!empty($_POST['Logbutton'])){
                    include_once 'sendaction/connecttodatabase.php';

                    //getting information from database about user password
                    $username = htmlspecialchars($_POST['username']);
                    $sql = "select password from accounts where username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        $userpass = $row['password'];
                    }

                    //Find errors
                    if (mysqli_num_rows($result) == 0 || !password_verify($_POST['password'], $userpass) || empty($_POST['password'])) {
                        $error = "Incorrect username or password";
                        $logcomment = "Incorrect username or password when trying to login";
                        AddLog($logcomment, $logfilepath);
                    }else{
                        //Log in
                        $error = $_POST['username']." Log in success";
                        AddLog($error, $logfilepath);
                        //Remeber me
                        $_SESSION['username'] = $_POST['username'];
                        
                        
                        $_SESSION['login'] = true;
                        $_SESSION['remme'] = $_POST['staylog'];
                        header("Location: Sites/");

                    }
            
                }
?>
<!--Page apperance-->
<!DOCTYPE html>
<html>
	<head>
        <meta lang="pl">
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="Styles/Login.css" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
            <?php 
            //display error
            if(!empty($error)){
                echo $error;
            }
            ?>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
                <?php
				echo "<input type='text' name='username' placeholder='Username' id='username' required value='$_SESSION[username]'><br>"
                
                ?>
                
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required><br>
                <table>
                    <tr>
                        <td><input type="checkbox" name="staylog" id="staylog"></td>
                        <td><label for="staylog">Remeber me</label></td>
                    </tr>
                </table>
				<input type="submit" value="Login" name="Logbutton">
			</form>
			<br>
			<a href="Register/">Register</a>
		</div>
	</body>
</html>