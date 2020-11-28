<?php

error_reporting(E_ALL);
require "includes/connection.php";
if (isset($_POST['username']) && isset($_POST['art_number']) && isset($_POST['abusive'])&& isset($_POST['spam']) && isset($_POST['copyrighted'])&& isset($_POST['update_time']) && isset($_POST['record']) && !empty($_POST['username']) && !empty($_POST['art_number']) && !empty($_POST['update_time'])) {

    $username = $_POST['username'];
    echo $username;
    $art_number = $_POST['art_number'];
    $abusive = $_POST['abusive'];
    $spam = $_POST['spam'];
    $copyrighted = $_POST['copyrighted'];
    $publishtime=$_POST['update_time'];
    $record = $_POST['record'];
    $collection = $connection->prepare("INSERT INTO `flags` (`username`,`articlenumber`,`flagabusive`, `flagspam`,`flagcopyright`,`time`, `recorded`) VALUES ('$username','$art_number','$abusive','$spam','$copyrighted','$publishtime','$record')");
    $collection->bind_param('siiiii', $username, $art_number, $abusive,$spam,$copyrighted, $publishtime, $record);

    $collection->execute();

    $collection->close();


}

?>