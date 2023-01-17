<?php
session_start();
$mail_err="";

$nick = $_POST['nick'];
$mail = $_POST['mail'];
$psw = $_POST['psw'];

include "connect.php";

    $sql = "SELECT * FROM Users WHERE mail = '$mail' OR nick = '$nick'" ;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $mail_err = "Gia esiste un account con questo indirizzo email.";
    } else {

        $sql2 = "INSERT INTO Users (mail, pass, nick, rating) VALUES ('$mail', '$psw', '$nick', 0)";
        if ($conn->query($sql2) === TRUE) {
            $_SESSION['mail']= $mail;
            $_SESSION['nickname'] = $nick;
            $_SESSION['rating'] = 0;
            echo "1";
        } else echo "0";
    }
            
?>