<?php
session_start();
$user_nick = $_SESSION['nickname'];
$id = $_POST['id'];
$name = $_POST['name'];

include "connect.php";

$sql = "INSERT INTO AdPart (user_nick, ad_name, ad_id) VALUES ('$user_nick', '$name', '$id')";
if ($conn->query($sql) === TRUE) {
   echo "1";
} else echo "0";
          
?>