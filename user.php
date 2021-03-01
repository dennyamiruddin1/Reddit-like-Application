<?php

include "utility/retrieve_data.php";

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
<h1 id="post" style="border-top: none; padding-top: 0;"><?php echo getUserName($_GET['user_id'])?>'s Posts</h1>
<p>
    <?php
        getUserPost($_GET['user_id']);
    ?>
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