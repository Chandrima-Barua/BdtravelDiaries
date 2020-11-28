$strings = "<div class='all_post'><ul><li>'+title+'<input type='button' value='Flag' style='float: right' id='flag'><div id='opt' style='display: none'><ul class='li_op'><li><input type='checkbox' id='one' />Abusive<span id='close'>X</span></li><li><input type='checkbox' id='two' />Spam</li><li><input type='checkbox' id='three' />Copyrighted<button id='report'>Report</button></li></ul></div></li><li>'+ name+ '|' + update_time+'</li><br><li>'+art +'</li></ul></div>";


<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!--        $(".all_post ul li ").on("click", "input",function (event) {-->
<!--        // $(".flag").click(function(e) {-->
<!--        var art_number = parseInt($(this).attr('number'));-->
<!--        console.log(art_number);-->
<!--        // $("#opt").append(' <ul class="li_op"><li><input type="checkbox" id="one" />Abusive<span id="close"><b>x</b></span></li> <li><input type="checkbox" id="two" />Spam</li><li><input type="checkbox" id="three" />Copyrighted<button id="report">Report</button></li></ul>');-->
<!--        $("[id^=opt_"+ art_number).show();-->
<!---->
<!--    $("[id^=close_"+ art_number).click(function(e) {-->
<!--        $("[id^=opt_"+ art_number).hide();-->
<!--    });-->
<!--        });-->
<!--    $("#post").click(function () {-->
<!--        var title = $("#title").val();-->
<!--        console.log(title);-->
<!--        var art = $("#art").val();-->
<!--        console.log(art);-->
<!---->
<!--        var time = new Date();-->
<!--        var month = time.getMonth() + 1;-->
<!--        update_time = time.getUTCDate() + "/" + month + "/" + time.getUTCFullYear() + "-" + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() + '' + 'GMT';-->
<!--        console.log(update_time);-->
<!--        $strings = '<div class="all_post"><ul><li>'+title+'<input type="button" value="Flag" style="float: right" id="flag"><div id="opt" style="display: none"><ul class="li_op"><li><input type="checkbox" id="one" />Abusive<span id="close">X</span></li><li><input type="checkbox" id="two" />Spam</li><li><input type="checkbox" id="three" />Copyrighted<button id="report">Report</button></li></ul></div></li><li>'+ name+ "|" + update_time+'</li><br><li>'+art +'</li></ul></div>';-->
<!--        $(".all_post").parent().children().last().after($strings);-->
<!---->
<!--    });-->
<!--    });-->
<!--</script>-->



<?php

require "includes/connection.php";


function total_row()
{
    global $connection;
    $result = ("select COUNT(*) as rows from `flags`") or die("Error: " . mysqli_error($connection));
    if ($try = mysqli_query($connection, $result)) {

        $data = mysqli_fetch_array($try);
        $count = (int)$data['rows'];
    }
    return $count;

}
$db_row = (int)($_POST['table_row']);
var_dump($db_row);
//echo $db_row;
$total = total_row();
var_dump($total);
//if($total > $db_row ){
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

$last= [];
$records =  "SELECT `flagnumber`,`username`,`articlenumber`,`flagabusive`,`flagspam`,`flagcopyright`,`time`  FROM `flags` order by time desc limit 1";

$stmt = $connection->stmt_init();
if ($stmt->prepare($records)) {
    $stmt->execute();
    $stmt->bind_result($flagnumber, $username, $articlenumber,$flagabusive,$flagspam,$flagcopyright,  $time);
    while ($stmt->fetch()) {

        $last[$flagnumber]['flagnumber'] = $flagnumber;
        $last[$flagnumber]['reportedby'] = $flagnumber;
        $last[$flagnumber]['articlenumber'] = $articlenumber;
        $last[$flagnumber]['flagabusive'] = (int)check_abusive($flagnumber);
        $last[$flagnumber]['flagspam'] = (int)check_spam($flagnumber);
        $last[$flagnumber]['flagcopyright'] = (int)check_copyrighted($flagnumber);
        $last[$flagnumber]['time'] = $time;


    }
}
//    $stmt = $connection->stmt_init();
//    if ($stmt->prepare($query)) {
//        $stmt->execute();
//        $stmt->bind_result($final_result['flagnumber'], $final_result['username'], $final_result['articlenumber'], $final_result['flagabusive'],$final_result['flagspam'],$final_result['flagcopyright'],$final_result['time']);
//        $stmt->fetch();
//        $stmt->close();
//
//    }
//    echo '<pre>';
//    print_r($last);
print json_encode($last);
var_dump(json_encode($last));
//    echo '<br>';
//    echo "greater";
//    include "js/notification-js.php";
//}

?>