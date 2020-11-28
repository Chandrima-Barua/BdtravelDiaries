<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/articles.css">
    <script src="js/jquery.js"></script>
    <?php
//global $final_result;
//var_dump($final_result);
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


    function check_abusive($flag_id)
    {

        global $connection;


        $result = ("select `flagabusive` from `flags` where flagnumber=$flag_id") or die("Error: " . mysqli_error($connection));

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


        $result = ("select `flagcopyright` from `flags` where flagnumber=$flag_id") or die("Error: " . mysqli_error($connection));

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
function check_record($flag_id){
    global $connection;


    $result = ("select count(recorded) as record from `flags`  where  recorded = 1 and flagnumber ='$flag_id'") or die("Error: " . mysqli_error($connection));

    $try = mysqli_query($connection, $result);
    $row = mysqli_fetch_assoc($try);
    $rec = (int)$row['record'];


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


        $result = ("select count(flagspam) as flagspam from `flags` where flagnumber=$flag_id and flagspam=-1") or die("Error: " . mysqli_error($connection));

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


    function record_abusive($flag_id)
    {

        global $connection;


        $result = ("select count(flagabusive) as flagabusive from `flags` where flagnumber=$flag_id and flagabusive=-1") or die("Error: " . mysqli_error($connection));

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
    function record_copyrighted($flag_id)
    {

        global $connection;


        $result = ("select count(flagcopyright) as flagcopyright  from `flags` where flagnumber=$flag_id and flagcopyright=-1") or die("Error: " . mysqli_error($connection));

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

    function get_flags()
    {
        global $connection;

        $records = $connection->prepare("SELECT `articlenumber` FROM `articles`");

        $records->execute();
        $records->bind_result($articlenumber);
        $records->store_result();
        $last = [];
        if ($records->affected_rows) {
            while ($records->fetch()) {
                $stmt_sec = $connection->prepare("select i.flagnumber,i.username,i.articlenumber,i.flagabusive,i.flagspam, 
i.flagcopyright, i.time,i.recorded ,  s.articletitle  as title, s.username as postedby from flags 
INNER join ( select * From flags ) i ON (i.articlenumber = $articlenumber) 
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
    function sortByTime($a, $b)
    {
        $a = $a['flagnumber'];
        $b = $b['flagnumber'];

        if ($a == $b) return 0;
        return ($a < $b) ? -1 : 1;
    }


//    echo '<pre>';
//    $flags = get_flags();
//    print_r($flags);
        ?>
        <div class="table-container" style="width: 80%">
            <table id="admin">
                <tr style="padding-bottom: 10px;" id="0">
                    <th>File Reports</th>
                    <th class="title">Admin Page-Bangladesh Travel Diaries Website</th>

                </tr>

                <?php
                $flags = get_flags();
                if (!empty($flags)) {
                usort($flags, 'sortByTime');
                foreach ($flags

                         as $key => $value) {

                    $check_spam = check_spam($value['flagnumber']);

                    $check_abusive = check_abusive($value['flagnumber']);

                    $check_copyright = check_copyrighted($value['flagnumber']);
                    $check_recorded = check_record($value['flagnumber']);

                    $uncheck_spam = record_spam($value['flagnumber']);

                    $uncheck_abusive = record_abusive($value['flagnumber']);

                    $uncheck_copyright = record_copyrighted($value['flagnumber']);

                    ?>

                    <tr id="<?php echo $value['flagnumber'] ?>">
                        <td><?php echo $value['time'] ?></td>

                                <?php
                            if($check_recorded){
                                    ?>
                    <td class="title"><b style="text-decoration: underline;"><?php echo $value['reportedby'] ?></b>
                    has unflagged the article '<b><?php echo $value['title'] ?></b>' posted by
                    <b><?php echo $value['postedby'] ?></b>
                    as <?php

                                if ($uncheck_spam && $uncheck_copyright && $uncheck_abusive ) {
                                    echo "<b>" . " spam,copyrighted and abusive" . "</b>";
                                } elseif ($uncheck_spam && $uncheck_abusive ) {
                                    echo "<b>" . " spam and abusive " . "</b>";
                                } elseif ($uncheck_abusive && $uncheck_copyright ) {
                                    echo "<b>" . "  abusive and copyrighted " . "</b>";
                                } elseif ($uncheck_spam && $uncheck_copyright ) {
                                    echo "<b>" . "  spam and copyrighted" . "</b>";
                                } elseif ($uncheck_copyright ) {
                                    echo "<b>" . "  copyrighted" . "</b>";
                                } elseif ($uncheck_abusive ) {
                                    echo "<b>" . "  abusive " . "</b>";
                                } elseif ($uncheck_spam ) {
                                    echo "<b>" . "  spam " . "</b>";
                                }

                                if ($check_spam && $check_copyright && $check_abusive ) {
                                    echo " and flagged it as ". "<b>" . " spam,copyrighted and abusive." . "</b>";
                                } elseif ($check_spam && $check_abusive ) {
                                    echo " and flagged it as ". "<b>" . "  spam and abusive. " . "</b>";
                                } elseif ($check_abusive && $check_copyright ) {
                                    echo  " and flagged it as ". "<b>" . "  abusive and copyrighted. " . "</b>";
                                } elseif ($check_spam && $check_copyright ) {
                                    echo " and flagged it as ". "<b>" . "  spam and copyrighted." . "</b>";
                                } elseif ($check_copyright ) {
                                    echo " and flagged it as "."<b>" . "  copyrighted." . "</b>";
                                } elseif ($check_abusive ) {
                                    echo " and flagged it as ". "<b>" . "  abusive. " . "</b>";
                                } elseif ($check_spam ) {
                                    echo " and flagged it as ". "<b>" . "  spam. " . "</b>";
                                }
                            }



                            else {
                                ?>
                        <td class="title"><b style="text-decoration: underline;"><?php echo $value['reportedby'] ?></b>
                            has flagged the article '<b><?php echo $value['title'] ?></b>' posted by
                            <b><?php echo $value['postedby'] ?></b>
                            as <?php
                                if ($check_spam && $check_copyright && $check_abusive ) {
                                    echo "<b>" . " spam,copyrighted and abusive." . "</b>";
                                } elseif ($check_spam && $check_abusive ) {
                                    echo "<b>" . " spam and abusive. " . "</b>";
                                } elseif ($check_abusive && $check_copyright ) {
                                    echo "<b>" . "  abusive and copyrighted. " . "</b>";
                                } elseif ($check_spam && $check_copyright ) {
                                    echo "<b>" . "  spam and copyrighted." . "</b>";
                                } elseif ($check_copyright ) {
                                    echo "<b>" . "  copyrighted." . "</b>";
                                } elseif ($check_abusive ) {
                                    echo "<b>" . "  abusive. " . "</b>";
                                } elseif ($check_spam ) {
                                    echo "<b>" . "  spam. " . "</b>";
                                }
                            }
                            ?>
                        </td>

                    </tr>


                    <?php
                }

                ?>
            </table>

        </div>
        <?php
    }
    ?>
</head>

<?php
//include "js/notification-js.php";
include "js/notification-while-js.php";
?>



