<?php 
    session_start();
    include "utility/retrieve_data.php";
    include "utility/insert_data.php";
    include "utility/verification.php";
?>

<?php
    $islogin = login($_SESSION['usrvalue']);
    
    if($islogin == false){
        header("Location: main.php");
    }
?>

<?php
            
    if(isset($_GET['block_id'])){
        if($_SESSION['usrvalue'] == $_GET['block_id']){
            // echo "You cannot block yourself";
            echo '<script language="javascript">';
            echo 'alert("You cannot block yourself")';
            echo '</script>';
        }
        else{
            blockUser($_SESSION['usrvalue'], $_GET['block_id']);
            // echo "You have blocked " . getUserName($_GET['blockid']);
            
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
  <div class="subHeader"><a href="login.php?category=most_recent">Most recent</a> | <a href="login.php?category=most_commented">Most commented</a> </div>
</div>
<!-- ##### Right Sidebar ##### -->
<div id="side-bar">
  <div class="rightSideBar">
    <p class="sideBarTitle">Hi, <?php echo getUserName($_SESSION['usrvalue']);?></p>
    <div class="sideBarText"><br />
        <form action="create.php" method="post">
            <input type="submit" name="submit" value="Create">
        </form>
    </div>
    <div class="sideBarText"><br />
        <form action="block.php" method="post">
            <input type="submit" name="submit" value="Blocked user">
        </form>
    </div>
    <div class="sideBarText"><br />
        <form action="main.php" method="post">
            <input type="submit" name="logout" value="Log Out">
        </form>
    </div>
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
               getFullPost($_SESSION['usrvalue']);
            }
            else if($_GET['category'] == "most_commented"){
              echo "<p><u>Categorised by " . str_replace(array('_'), ' ',$_GET['category'] . "</u></p><br>");
              getFullPostByComment($_SESSION['usrvalue']);
            }
        }
        else {
            getFullPost($_SESSION['usrvalue']);
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