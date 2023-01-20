<?php
session_start();
$user_nick = $_SESSION['nickname'];
$id = $_POST['id'];

include "connect.php";

$sql = "DELETE FROM AdPart WHERE ad_id = '$id' AND user_nick = '$user_nick'";
if ($conn->query($sql) === TRUE) {
   echo "1";
} else echo "0";
          
?>