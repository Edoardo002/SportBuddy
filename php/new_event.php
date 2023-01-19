<?php
session_start();

$creator = $_SESSION['nickname'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$time = $_POST['time'];
$place = $_POST['place'];
$max_part = $_POST['max_part'];

include "connect.php";

$sql = "INSERT INTO Events (creator, name, description, date, time, place, max_part, part) VALUES ('$creator', '$name', '$desc', '$date', '$time', '$place', '$max_part', 0)";
if ($conn->query($sql) === TRUE) {
    $sql2 = "SELECT id FROM Events WHERE creator = '$creator' AND name = '$name' AND description = '$desc' AND date = '$date' AND time = '$time' AND place = '$place' AND max_part = '$max_part' AND part = '0'";
    $res = $conn->query($sql2);
    $row = $res->fetch_assoc();
    $id = $row['id'];
    $sql3 = "INSERT INTO EventPart (user_nick, event_name, event_id) VALUES ('$creator', '$name', '$id')";
    if ($conn->query($sql3) === TRUE) {
        echo "1";
    } else echo  "0";
} else echo "0";

?>