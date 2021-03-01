<?php
    session_start();
    include "utility/retrieve_data.php";
    include "utility/verification.php";
?>

<?php
    $usrid = NULL;
    $_SESSION['usrvalue'] = $usrid;
    if(isset($_POST['id'])){
        $usrid = $_POST['id'];
        $pswd = ($_POST['psw']);

        if(validation($pswd, getUserHash($usrid)) == true){
            $_SESSION['usrvalue'] = $usrid;
            header("Location: login.php");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("invalid login")';
            echo '</script>';
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
<!-- ##### Header ##### -->
<div id="header">
  <h1 class="headerTitle">Sourdough Club</h1>
  <div class="subHeader"><a href="main.php?category=most_recent">Most recent</a> | <a href="main.php?category=most_commented">Most commented</a> </div>
</div>
<!-- ##### Right Sidebar ##### -->
<div id="side-bar">
  <div class="rightSideBar">
    <p class="sideBarTitle">Sign in</p>
    <div class="sideBarText"><br />
      <form action="" method="post">
          <input type="text" name="id" placeholder="Username">
          <input type="password" name="psw" placeholder="Password"><br>
          <input type="submit" name="submit" value="Login">
      </form>
    </div>
    <a href="signup.php" class="more">Register here &raquo;</a>
  </div>
</div>
<!-- ##### Main ##### -->
<div id="main-copy">
  <h1 id="post" style="border-top: none; padding-top: 0;">Sourdough Links</h1>
  <p>
      <?php
        if(isset($_GET['category'])){
          if($_GET['category'] == "most_recent"){
            echo "<p><u>Categorised by " . str_replace(array('_'), ' ',$_GET['category'] . "</u></p><br>");
            getPost();
          }
          else if($_GET['category'] == "most_commented"){
            echo "<p><u>Categorised by " . str_replace(array('_'), ' ',$_GET['category'] . "</u></p><br>");
            getPostByComment();
          }
        }
        else {
          getPost();
        }
      ?>
  </p>
</div>
<!-- ##### Footer ##### -->
<div id="footer">
  <div> Copyright &copy; 2017, Sourdough Club </div>
</div>
</body>
</html>
