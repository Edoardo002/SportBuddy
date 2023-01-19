<?php
session_start();

$creator = $_SESSION['nickname'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$max_part = $_POST['max_part'];

include "connect.php";

$sql = "INSERT INTO Ads (creator, name, description, needed_people, joined_people, price) VALUES ('$creator', '$name', '$desc', '$max_part', 0, '$price')";
if ($conn->query($sql) === TRUE) {
    $sql2 = "SELECT id FROM Ads WHERE creator = '$creator' AND name = '$name' AND description = '$desc' AND needed_people = '$max_part' AND joined_people = 0 AND price = '$price'";
    $res = $conn->query($sql2); 
    $row = $res->fetch_assoc();
    $id = $row['id'];
    $sql3 = "INSERT INTO AdPart (user_nick, ad_name, ad_id) VALUES ('$creator', '$name', '$id')";
    if ($conn->query($sql3) === TRUE) {
        echo "1";
    } else echo  "0";
} else echo "0";
          
?>