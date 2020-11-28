<?php
require "includes/connection.php";

function check_spam($flag_id)
{

    global $connection;


    $result = ("select `flagspam` from `flags` where flagnumber=$flag_id") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $spam = (int)$row['flagspam'];


    if ($spam == 1) {
        return true;
    }
    else{
        return false;
    }
}

//$check = check_spam(3);
//echo $check;
function check_abusive($flag_id)
{

    global $connection;


    $result = ("select `flagabusive` from `flags` where articlenumber=$flag_id") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $abusive = (int)$row['flagabusive'];


    if ($abusive == 1) {
        return true;
    }
    else{
        return false;
    }
}
function check_copyrighted($flag_id)
{

    global $connection;


    $result = ("select `flagcopyright` from `flags` where articlenumber=$flag_id") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $copyrighted = (int)$row['flagcopyright'];


    if ($copyrighted == 1) {
        return true;
    }
    else{
        return false;
    }

}

?>