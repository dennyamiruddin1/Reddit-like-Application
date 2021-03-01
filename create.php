<?php 
session_start();
include "utility/insert_data.php";
?>

<?php
        if(isset($_POST['link'])){
        $usrid = $_SESSION['usrvalue'];
        $link = $_POST['link'];
        $title = $_POST['title'];
        insertPost($usrid, $link, $title);
        header('Location: login.php');
        exit;
        }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
<title>Sourdough Club</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" href="css/style.css" />

<!-- title validation -->
<script> 
        function validateForm(){
                var wordLimit = 60;
                var input = document.forms["post"]["title"].value.length;
                if(input > wordLimit){
                        // loop back to this page
                        // alert('too much word');
                }
                else{
                        // add link
                        // alert('good');
                }
        }
</script>
</head>
<body>
<div id="main-copy">
   <p>
        <form name="post" action="" method="post" onsubmit="return validateForm()">
                <input type="text" placeholder="Link" name="link"><br>
                <textarea name="title" placeholder="Title" id="title"></textarea><br>
                <input type="submit" name="submit" value="POST IT UP">
        </form>
   </p>
   <p>
        <form action="login.php">
                <input type="submit" name="submit" value="Main Page">
        </form>
   </p>
</div>

</body>
</html>