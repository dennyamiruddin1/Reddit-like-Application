<?php
session_start();
include "utility/retrieve_data.php";
include "utility/insert_data.php";
?>

<?php  

        if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
            if($comment == NULL || $comment == ""){
                // do nothing
            }
            else{
                if($_SESSION['usrvalue'] == ""){
                    echo "Woops, something is wrong. Try log in <br><br>";
                }
                else{
                    insertComment($_GET['link_id'], ($_SESSION['usrvalue']), $comment);
                }
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
</div>
<!-- ##### Main ##### -->
<div id="main-copy">
  <h1 id="post" style="border-top: none; padding-top: 0;">Posts</h1>
  <p>
    <?php
        if(isset($_GET['link_id'])){
            getPostContent($_GET['link_id']);
            getComment($_GET['link_id']);
        }
    ?>
  </p>
  <p>
    <form action="" method="post">
        <textarea rows="10" name="comment"></textarea><br>
        <input type="submit" name="submit" value="Comment"><br><br>
    </form>
  </p>
  <p>
        <form action="login.php">
                <input type="submit" name="submit" value="Main Page">
        </form>
   </p>
</div>
<!-- ##### Footer ##### -->
<div id="footer">
  <div> Copyright &copy; 2017, Sourdough Club </div>
</div>
</body>
</html>