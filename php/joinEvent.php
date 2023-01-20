<?php
session_start();
$user_nick = $_SESSION['nickname'];
$id = $_POST['id'];
$name = $_POST['name'];

include "connect.php";

$sql = "INSERT INTO EventPart (user_nick, event_name, event_id) VALUES ('$user_nick', '$name', '$id')";
if ($conn->query($sql) === TRUE) {
   echo "1";
} else echo "0";
          
?>