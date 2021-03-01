<?php

function getUserName($id) {

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";
    
    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT 
    id, 
    name 
    FROM User 
    WHERE id = '$id'" ;
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        return $row['name'];
    }

    $conn->close();

}

function getUserHash($id) {

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT 
    id, 
    password 
    FROM User 
    WHERE id = '$id'" ;
    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc()) {
        return $row['password'];
    }

    $conn->close();

}

function getFullPost($currentuser){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT 
    id, 
    user_id, 
    datetime, 
    link_url, 
    title 
    FROM SourdoughLink 
    ORDER BY datetime desc";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        $itterate = 0;
        while($row = $result->fetch_assoc()) {
            if ($itterate == 5){
                break;
            }
            else {
                if(isBlocked($currentuser, $row['user_id']) == true){
                    // dont post anything
    
                }
                else {
                    echo "<a href=view.php?link_id=" . $row["id"] . ">". $row["link_url"] . "</a>" . "<br>" . 
                    "Submitted on " . $row['datetime'] . " by " . "<a href=user.php?user_id=" . $row['user_id'] . ">" . getUserName($row['user_id']) . "</a> | " .
                    "<a href=login.php?block_id=" . $row["user_id"] . ">block this user</a><br><br>";
                    $itterate++;

                    
                }
            }
        }
    } else {
        echo "Wow such an empty :(";
    }

    $conn->close();
}

function getFullPostByComment($currentuser){
    
        $servername = "localhost";
        $username = "ITECH3224_30305675";
        $dbpass = "AxBkAJwMYCFj3RaGypHG";
        $dbname = "ITECH3224_30305675";
    
        // Create connection
        $conn = new mysqli($servername, $username, $dbpass, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
       
        $sql = "SELECT 
        Comment.sourdoughlink_id, 
        Comment.comment_text,
        SourdoughLink.id 's.id',
        SourdoughLink.user_id 's.user_id',
        SourdoughLink.datetime 's.datetime',
        SourdoughLink.link_url 's.link_url',
        SourdoughLink.title 's.title',
        COUNT(*) 'total_comment'
        FROM Comment 
        INNER JOIN SourdoughLink ON Comment.sourdoughlink_id = SourdoughLink.id
        GROUP BY sourdoughlink_id
        ORDER BY COUNT(*) DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $itterate = 0;
            while($row = $result->fetch_assoc()) {
                if ($itterate == 5){
                    break;
                }
                else {
                    if(isBlocked($currentuser, $row['s.user_id']) == true){
                        // dont post anything
        
                    }
                    else {
                        echo "<a href=view.php?link_id=" . $row["s.id"] . ">". $row["s.link_url"] . "</a>" . "<br>" . 
                        "Submitted on " . $row['s.datetime'] . " by " . "<a href=user.php?user_id=" . $row['s.user_id'] . ">" . getUserName($row['s.user_id']) . "</a> | " .
                        "<a href=login.php?block_id=" . $row["s.user_id"] . ">block this user</a><br>" . 
                        "commented " . $row['total_comment'] ." times<br><br>";
                        $itterate++;
                    }
                }
            }
        } else {
            echo "Wow such an empty :(";
        }
    
        $conn->close();
    }

function getPost(){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT id, user_id, datetime, link_url, title 
    FROM SourdoughLink 
    ORDER BY datetime desc";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        $itterate = 0;
        while($row = $result->fetch_assoc()) {
            if ($itterate == 5){
                break;
            }
            else {
                echo "<a href=view.php?link_id=" . $row["id"] . ">". $row["link_url"]. "</a>" . "<br>" . 
                "Submitted on " . $row['datetime'] . " by " . "<a href=user.php?user_id=" . $row['user_id'] . ">" . getUserName($row['user_id']) . "</a>" . "<br><br>";
            }
            $itterate++;
        }
    } 
    else {
        echo "Wow such an empty :(";
    }
}

function getPostByComment(){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT 
    Comment.sourdoughlink_id, 
    Comment.comment_text,
    SourdoughLink.id 's.id',
    SourdoughLink.user_id 's.user_id',
    SourdoughLink.datetime 's.datetime',
    SourdoughLink.link_url 's.link_url',
    SourdoughLink.title 's.title',
    COUNT(*) 'total_comment'
    FROM Comment 
    INNER JOIN SourdoughLink ON Comment.sourdoughlink_id = SourdoughLink.id
    GROUP BY sourdoughlink_id
    ORDER BY COUNT(*) DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        $itterate = 0;
        while($row = $result->fetch_assoc()) {
            if ($itterate == 5){
                break;
            }
            else {
                echo "<a href=view.php?link_id=" . $row["s.id"] . ">". $row["s.link_url"]. "</a>" . "<br>" . 
                "Submitted on " . $row['s.datetime'] . " by " . "<a href=user.php?user_id=" . $row['s.user_id'] . ">" . getUserName($row['s.user_id']) . "</a><br>" . 
                "commented " . $row['total_comment'] ." times<br><br>";
            }
            $itterate++;
        }
    } 
    else {
        echo "Wow such an empty :(";
    }
}

function getUserPost($id){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";
    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT 
    Sourdoughlink.id, 
    Sourdoughlink.user_id, 
    User.name 'user_name', 
    SourdoughLink.datetime, 
    SourdoughLink.link_url, 
    SourdoughLink.title 
    FROM SourdoughLink 
    INNER JOIN User ON SourdoughLink.user_id = User.id 
    WHERE user_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<a href=view.php?link_id=" . $row["id"] . ">". $row["link_url"]. "</a>" . "<br>" . 
            "Submitted " . $row["datetime"]. " by " . $row["user_name"] . "<br><br>";
        }
    }

    $conn->close();
}

function getPostContent($id){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";
    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT Sourdoughlink.user_id, 
    User.name 'user_name', 
    SourdoughLink.datetime, 
    SourdoughLink.link_url, 
    SourdoughLink.title 
    FROM SourdoughLink 
    INNER JOIN User ON SourdoughLink.user_id = User.id 
    WHERE SourdoughLink.id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["title"] . "<br>" . 
            "Submitted " . $row["datetime"]. " by " . $row["user_name"] . "<br><br>";
        }
    }

    $conn->close();
}

function getComment($id){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";
    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    // $sql = "SELECT sourdoughlink_id, comment_text, user_id FROM Comment WHERE sourdoughlink_id = '$id'";
    $sql ="SELECT Comment.sourdoughlink_id, 
    Comment.comment_text, 
    Comment.user_id, 
    User.name 'user_name' 
    FROM Comment INNER JOIN User ON Comment.user_id = User.id 
    WHERE Comment.sourdoughlink_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['user_name'] . "<br>" . 
            $row['comment_text'] . "<br><br>";
        }
    }

    $conn->close();
}

function getBlockUser($id){

    $servername = "localhost";
    $username = "ITECH3224_30305675";
    $dbpass = "AxBkAJwMYCFj3RaGypHG";
    $dbname = "ITECH3224_30305675";
    // Create connection
    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    $sql = "SELECT Block.user_id, 
    Block.blocked_user_id, 
    User.name 'user_name' 
    FROM Block INNER JOIN User ON Block.blocked_user_id = User.id 
    WHERE Block.user_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<br>List of your block user: <br><br>";
        while($row = $result->fetch_assoc()) {
            echo $row['user_name'] . " | " . "<a href=block.php?block_id=" . $row["blocked_user_id"] . ">unblock this user</a><br><br>";
        }
    }
    else{
        echo "<br>Empty block list<br>";
    }

    $conn->close();
}
?>

