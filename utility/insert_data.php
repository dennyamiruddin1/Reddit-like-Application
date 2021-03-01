<?php

function insertUser($id, $name, $email, $password){

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
   
    $sql = "INSERT INTO User (id, name, email, password)
    VALUES ('$id', '$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function insertPost($usrid, $link, $title){

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
   
    $sql = "INSERT INTO SourdoughLink (user_id, link_url, title)
    VALUES ('$usrid', '$link', '$title')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}

function insertComment($link_id, $usrid, $comment){
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
   
    $sql = "INSERT INTO Comment (sourdoughlink_id, user_id, comment_text)
    VALUES ('$link_id', '$usrid', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

function blockUser($current_user, $blocked_user){
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
   
    $sql = "INSERT INTO Block (user_id, blocked_user_id)
    VALUES ('$current_user', '$blocked_user')";

    if ($conn->query($sql) === TRUE) {
        // echo "You have blocked " . $blocked_user;
    } else {
        // echo "You have just block that user";
    }

    $conn->close();
}
?>
