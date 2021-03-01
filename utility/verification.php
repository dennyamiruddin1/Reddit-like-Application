<?php


    function encrypt($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function validation($password, $hash){
        $valid = false;
        if (password_verify($password, $hash)) {
            $valid = true;
            return $valid;
        } else {
            return $valid;
        }
    }

    function login($usrid){
        if ($usrid == NULL || $usrid == ""){
            return false;
        }
        else {
            return true;
        }
    }

    function isBlocked($currentUser, $blockedUser){
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
       
        $sql = "SELECT user_id, blocked_user_id FROM Block WHERE user_id = '$currentUser'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($blockedUser == $row['blocked_user_id']){
                    return true;
                }
                else{
                    false;
                }
            }
        }
    
        $conn->close();
    }

    function isUserExist($id){
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
       
        $sql = "SELECT id FROM User WHERE id = '$$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($id == $row['id']){
                    return true;
                }
                else{
                    false;
                }
            }
        }
    
        $conn->close();
    }
?>