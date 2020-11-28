<?php

error_reporting(E_ALL);
require "includes/connection.php";

//    $username = $_POST['name'];
//    echo json_encode($username);

function abusive_checked($username,$articlenumber)
{
    global $connection;
    $result = ("select COUNT(`flagabusive`) as abusive from `flags`  where `username`= '$username' and flagabusive = 1 and articlenumber ='$articlenumber' ") or die("Error: " . mysqli_error($connection));
    if ($try = mysqli_query($connection, $result)) {

        $data = mysqli_fetch_array($try);
        $count = (int)$data['abusive'];
        if ($count === 0) {

            return true;
        } else {
            return false;
        }
    }

}



function spam_checked($username, $articlenumber)
{
    global $connection;
    $result = ("select COUNT(`flagspam`) as spam from `flags`  where `username`= '$username' and flagspam = 1 and articlenumber ='$articlenumber' ") or die("Error: " . mysqli_error($connection));
    if ($try = mysqli_query($connection, $result)) {

        $data = mysqli_fetch_array($try);
        $count = (int)$data['spam'];
        if ($count === 0) {

            return true;
        } else {
            return false;
        }
    }

}

function copy_checked($username,$articlenumber)
{
    global $connection;
    $result = ("select COUNT(`flagcopyright`) as copy from `flags`  where `username`= '$username' and flagcopyright = 1 and articlenumber ='$articlenumber'") or die("Error: " . mysqli_error($connection));
    if ($try = mysqli_query($connection, $result)) {

        $data = mysqli_fetch_array($try);
        $count = (int)$data['copy'];
        if ($count === 0) {

            return true;
        } else {
            return false;
        }
    }

}



function get_articles()
{
    $username = $_POST['name'];
    global $connection;

 $flag_check = "SELECT COUNT(*) as flags FROM `flags` ";
    if ($try = mysqli_query($connection, $flag_check)) {

        $data = mysqli_fetch_array($try);
        $count_flag = (int)$data['flags'];
        $last = [];
        if ($count_flag === 0) {

            $stmt_sec = $connection->prepare("select articlenumber, username as postedby, articletitle, articletext,publishtime from articles");
            $stmt_sec->execute();
            $stmt_sec->bind_result($articlenumber, $postedby, $title, $text, $publishtime);
            $stmt_sec->store_result();

            while ($stmt_sec->fetch()) {
                $last[$articlenumber]['articlenumber'] = $articlenumber;
                $last[$articlenumber]['postedby'] = $postedby;
                $last[$articlenumber]['title'] = $title;
                $last[$articlenumber]['text'] = $text;
                $last[$articlenumber]['time'] = $publishtime;
                $last[$articlenumber]['flagabusive'] = abusive_checked($username, $articlenumber);
                $last[$articlenumber]['flagspam'] = spam_checked($username, $articlenumber);
                $last[$articlenumber]['flagcopyright'] = copy_checked($username, $articlenumber);
            }


            $stmt_sec->close();


        } else {
            $stmt_sec = $connection->prepare("select s.articlenumber, s.username as postedby , s.articletitle,s.articletext, s.publishtime,  i.flagabusive, i.flagspam, i.flagcopyright from articles INNER join ( select * from articles )s INNER join ( select articlenumber,flagabusive,flagspam,flagcopyright From flags  ) i");


            $stmt_sec->execute();
            $stmt_sec->bind_result($articlenumber, $postedby, $title, $text, $publishtime, $abusive, $spam, $copyrighted);
            $stmt_sec->store_result();

            while ($stmt_sec->fetch()) {

                $last[$articlenumber]['articlenumber'] = $articlenumber;
                $last[$articlenumber]['postedby'] = $postedby;
                $last[$articlenumber]['title'] = $title;
                $last[$articlenumber]['text'] = $text;
                $last[$articlenumber]['time'] = $publishtime;
                $last[$articlenumber]['flagabusive'] = abusive_checked($username, $articlenumber);
                $last[$articlenumber]['flagspam'] = spam_checked($username, $articlenumber);
                $last[$articlenumber]['flagcopyright'] = copy_checked($username, $articlenumber);
            }


            $stmt_sec->close();
        }
    }

    return $last;

}

$articles = get_articles();
//echo '<pre>';
//print_r($articles);
//if (!empty($articles)) {
    echo json_encode([$articles]);
//}

    ?>