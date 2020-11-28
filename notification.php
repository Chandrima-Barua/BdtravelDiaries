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
    } else {
        return false;
    }
}


function check_abusive($flag_id)
{

    global $connection;


    $result = ("select `flagabusive` from `flags` where flagnumber=$flag_id") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $abusive = (int)$row['flagabusive'];


    if ($abusive == 1) {
        return true;
    } else {
        return false;
    }
}

function check_copyrighted($flag_id)
{

    global $connection;


    $result = ("select `flagcopyright` from `flags` where flagnumber=$flag_id") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $copyrighted = (int)$row['flagcopyright'];


    if ($copyrighted == 1) {
        return true;
    } else {
        return false;
    }

}


function check_record($flag_id){
    global $connection;


    $result = ("select recorded  from `flags`  where  recorded = 1 and flagnumber ='$flag_id'") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $rec = (int)$row['recorded'];


    if ($rec == 1) {
        return true;
    }
    else{
        return false;
    }

}

function record_spam($flag_id)
{

    global $connection;


    $result = ("select flagspam from `flags` where flagnumber=$flag_id and flagspam=-1") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $spam = (int)$row['flagspam'];


    if ($spam == -1) {
        return true;
    }
    else{
        return false;
    }
}


function record_abusive($flag_id)
{

    global $connection;


    $result = ("select flagabusive from `flags` where flagnumber=$flag_id and flagabusive=-1") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $abusive = (int)$row['flagabusive'];


    if ($abusive == -1) {
        return true;
    }
    else{
        return false;
    }
}
function record_copyrighted($flag_id)
{

    global $connection;


    $result = ("select flagcopyright  from `flags` where flagnumber=$flag_id and flagcopyright=-1") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $copyrighted = (int)$row['flagcopyright'];


    if ($copyrighted == -1) {
        return true;
    }
    else{
        return false;
    }

}

function get_flags()
{
    $test_post = $_POST['number'];

    $implode = implode(',', $test_post);
    global $connection;

    $records = $connection->prepare("SELECT `flagnumber`, `articlenumber` FROM `flags` WHERE `flagnumber` NOT in ($implode)");

    $records->execute();
    $records->bind_result($flagnumber, $articlenumber);
    $records->store_result();
    $last = [];
    if ($records->affected_rows) {
        while ($records->fetch()) {
            $stmt_sec = $connection->prepare("select i.flagnumber,i.username,i.articlenumber,i.flagabusive,i.flagspam, 
i.flagcopyright, i.time,i.recorded ,  s.articletitle  as title, s.username as postedby from flags 
INNER join ( select * From flags ) i ON (i.flagnumber = $flagnumber) 
INNER join ( select username,articletitle from articles where articlenumber=$articlenumber )s ");

            $stmt_sec->execute();
            $stmt_sec->bind_result($flagnumber, $username, $articlenumber, $abusive, $spam, $copyrighted, $publishtime,$recorded, $title,$postedby);
            $stmt_sec->store_result();

            while ($stmt_sec->fetch()) {

                $last[$flagnumber]['flagnumber'] = $flagnumber;
                $last[$flagnumber]['reportedby'] = $username;
                $last[$flagnumber]['articlenumber'] = $articlenumber;
                $last[$flagnumber]['flagabusive'] = check_abusive($flagnumber);
                $last[$flagnumber]['flagspam'] = check_spam($flagnumber);
                $last[$flagnumber]['flagcopyright'] = check_copyrighted($flagnumber);
                $last[$flagnumber]['uncheck_flagabusive'] = record_abusive($flagnumber);
                $last[$flagnumber]['uncheck_flagspam'] = record_spam($flagnumber);
                $last[$flagnumber]['uncheck_flagcopyright'] = record_copyrighted($flagnumber);
                $last[$flagnumber]['time'] = $publishtime;
                $last[$flagnumber]['recorded'] = $recorded;
                $last[$flagnumber]['title'] = $title;
                $last[$flagnumber]['postedby'] = $postedby;


            }


            $stmt_sec->close();
        }

    }
    return $last;
}
//$final = get_flags();
//echo '<pre>';
//print_r($final);
//
global $connection;
for ($x = 0; $x < 5; $x++) {

    $result = ("select MAX(flagnumber) as rows FROM flags") or die("Error: " . mysqli_error($connection));
    $try = mysqli_query($connection, $result);

    $data = mysqli_fetch_array($try);

    $count = (int)$data['rows'];


    $db_row = (int)($_POST['table_row']);

    if ($count > $db_row) {
        $final = get_flags();
        sort($final);

    }

        sleep(5);


}

if (!empty($final)) {
    echo json_encode($final);
}

?>