<?php

error_reporting(E_ALL);
require "includes/connection.php";
echo $_POST['username'];
if (isset($_POST['username']) && isset($_POST['title']) && isset($_POST['art']) && isset($_POST['update_time']) && !empty($_POST['username']) && !empty($_POST['title']) && !empty($_POST['art']) && !empty($_POST['update_time'])) {

    $name = $_POST['username'];
    $title = $_POST['title'];
    $art = $_POST['art'];
    $publishtime=$_POST['update_time'];

    $collection = $connection->prepare("INSERT INTO `articles` (`username`,`articletitle`,`articletext`, `publishtime`) VALUES ('$name','$title','$art','$publishtime')");
    $collection->bind_param('sss', $name, $title, $art, $publishtime);

    $collection->execute();

    $collection->close();


}



?>