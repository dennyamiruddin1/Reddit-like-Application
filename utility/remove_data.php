<?php

function removeBlockedUser($id){
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
    
    // sql to delete a record
    $sql = "DELETE FROM Block 
    WHERE blocked_user_id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
        // echo getUserName($id) . " is unblocked";
    } else {
        // echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
}
?>