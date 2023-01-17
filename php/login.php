<?php
    session_start();
    include "connect.php";
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
   
    $sql = "SELECT * FROM Users WHERE mail= '$mail' and pass= '$psw' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['mail'] = $mail;
        $user = $result->fetch_assoc();
        $_SESSION['nickname'] = $user['nick'];
        $_SESSION['rating'] = $user['rating'];
        echo "1";
        
    } else echo "0";

    
?>