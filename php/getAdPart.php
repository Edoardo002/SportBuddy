<?php
    //session_start();
    include "connect.php";
    $id = $_POST['id'];
    $list = "";
   
    $sql = "SELECT * FROM AdPart WHERE ad_id='$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $part = $row['user_nick'];
        $sql2 = "SELECT * FROM Users WHERE nick='$part'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $rating = $row2['rating'];
        $list .= $part.": ".$rating." <span class='fa fa-star checked'></span>\n";
    } 
    echo $list;  
?>