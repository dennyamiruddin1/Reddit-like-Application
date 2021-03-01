<?php
    include 'utility/insert_data.php';
    include 'utility/verification.php';
?>

<?php  
        if(isset($_POST['id'])){
        $usrid = $_POST['id'];
        $usrname = $_POST['username'];
        $email = $_POST['email'];
        $pswd = encrypt($_POST['psw']);
        
        if ($usrid == "" || $usrid == NULL || $usrname == "" || $usrname == NULL || $email == "" || $email == NULL || $pswd == "" || $pswd == NULL){
                echo "All field must be filled";
        }

        else if(isUserExist($usrid) == true){
                echo "Sorry, the user ID has been taken, try different one";
        }
        
        else{
                insertUser($usrid, $usrname, $email, $pswd);
                
                session_start();
                $_SESSION['usrvalue'] = $usrid;
        
                header('Location: main.php');
        }
        
        
}
       
        
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
<title>Sourdough Club</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div id="main-copy">
<center>
  <h2>Register</h2>
  <p>
        <form action="" method="post">
                <input type="text" name="id" placeholder="Username"><br>
                <input type="text" name="username" placeholder="Full Name"><br>
                <input type="text" name="email" placeholder="Email Address"><br>
                <input type="password" name="psw" placeholder="Password"><br>
                <input type="submit" name="submit" value="SIGN UP">
        </form> 
  </p>
  <p>
        <form action="login.php">
                <input type="submit" name="submit" value="Main Page">
        </form>
   </p>
  </center>
</div>
</body>
</html>