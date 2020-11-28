<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/articles.css">
    <script src="js/jquery.js"></script>
    <?php

    session_start();





    require "includes/connection.php";
    function get_articles()
    {
        global $connection;
        $records = "SELECT `articlenumber`,`username`,`articletitle`, `articletext`,`publishtime`  FROM `articles`";
        $result = mysqli_query($connection, $records);
        $article_array = [];
        $reply_array = [];


        while ($row = mysqli_fetch_assoc($result)) {


            $article_array[$row['articlenumber']]['articlenumber'] = (int)$row['articlenumber'];
            $article_array[$row['articlenumber']]['username'] = $row['username'];
            $article_array[$row['articlenumber']]['articletitle'] = $row['articletitle'];
            $article_array[$row['articlenumber']]['articletext'] = $row['articletext'];
            $article_array[$row['articlenumber']]['publishtime'] = $row['publishtime'];


        }
        return $article_array;
    }
    $articles = get_articles();


    function abusive_checked($username,$articlenumber)
    {
        global $connection;
        $result = ("select COUNT(`flagabusive`) as abusive from `flags`  where `username`= '$username' and flagabusive = 1 and articlenumber ='$articlenumber'") or die("Error: " . mysqli_error($connection));
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

    ?>

    <div class="container">
        <div class="wrapper">
           <?php $_SESSION['username'] = $_POST['name'];?>
            <h2>BANGLADESH TRAVEL DIARIES</h2>
            <div class="main">
            <?php foreach ($articles as $key => $value
            ) {
                ?>
            <div class="all_post" id="art_<?php echo $value['articlenumber']?>" number="<?php echo $value['articlenumber'] ?>">
                <ul>
                    <li><span><?php echo $value['articletitle']; ?></span>
                        <?php if ( $value['username'] !=   $_SESSION['username'])
                        {?>
                            <input type="button" value="Flag" style="float: right" class="flag" id="flag_<?php echo $value['articlenumber']?>" number="<?php echo $value['articlenumber'] ?>">
                        <div  class="opt" id="opt_<?php echo $value['articlenumber']?>" number="<?php echo $value['articlenumber'] ?>" style="display: none">
                            <ul class="li_op">
                                <?php
                                echo "'".$value['username']."'";
                                echo " ".$value['articlenumber']." ";


                                $spam = spam_checked( "'".$value['username']."'", $value['articlenumber']);
                                $abusive = abusive_checked("'". $value['username']."'", $value['articlenumber']);
                                $copyright = copy_checked("'". $value['username']."'", $value['articlenumber']);



                                if($abusive === false){

                                ?>
<li><input type="checkbox" class="abusive checked" checked="checked" id="abusive_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>"/>Abusive<span class="close" id="close_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>">X</span><span style='display: none' id='abs_<?php echo $value['articlenumber']?>'></span></li>

                                    <?php
                                    }
                                else {

                                    ?>
<li><input type="checkbox" class="abusive unchecked" id="abusive_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>"/>Abusive<span class="close" id="close_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>">X</span></li>


                                    <?php
                                }
                                if($spam === false){
                                    ?>
<li><input type="checkbox" class="spam checked" checked="checked" id="spam_<?php echo $value['articlenumber']?>" number="<?php echo $value['articlenumber'] ?>"/>Spam</li>
                                <?php
                                }
                                else{
                                ?>
<li><input type="checkbox" class="spam unchecked" id="spam_<?php echo $value['articlenumber']?>" number="<?php echo $value['articlenumber'] ?>"/>Spam</li>

                                <?php
                                }
                                if($copyright === false) {
                                    ?>

<li><input type="checkbox" class="copyrighted checked" checked="checked" id="copyrighted_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>"/>Copyrighted<button class="report" id="report_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>">Report</button></li>

                                    <?php
                                }
                                else {


                                    ?>
<li><input type="checkbox" class="copyrighted unchecked" id="copyrighted_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>"/>Copyrighted<button class="report" id="report_<?php echo $value['articlenumber'] ?>" number="<?php echo $value['articlenumber'] ?>">Report</button></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            </div><?php } ?></li>
                    <li class="date"> <?php echo $value['username']; ?>| <?php echo $value['publishtime']; ?></li>
                    <br>
                    <li class="date"><?php echo $value['articletext']; ?></li>
                </ul>
                </div><?php
            }
            ?>
        </div>
        <div class="form">
            <label style="padding-right: 30px"><b>Post a new Article: </b></label>
            <input type="text" id="title" placeholder="Enter your article title here" name="title">&nbsp
            <label  style="padding-left: 20px">
                <b class="username" session="<?php echo $_SESSION['username'] ?>" >Signed in as: [<?php echo $_SESSION['username'] ?>] </b>
            </label>
            <br><br>
            <input type="text" id="art" placeholder="Type your article here" name="article">
            <button type="submit" id="post">Post</button></div>
        </div>
    </div>


</head>

<?php
//include "js/article-js.php";
//?>


<script>

    $(".all_post ul li ").on("click", "input", function (event) {
        var art_number = parseInt($(this).attr('number'));

        // console.log(art_number);
        $("[id^=opt_" + art_number).show();

        $("[id^=close_" + art_number).click(function (e) {
            abusive = 0;
            spam = 0;
            copyrighted = 0;


            $("[id^=opt_" + art_number).hide();
            $('input[type=checkbox]').each(function()
            {
                this.checked = false;
            });
        });
    });
    var username = $(".username").attr("session");
    console.log(username);
    var time = new Date();
    var month = time.getMonth() + 1;
    var update_time = time.getUTCDate() + "/" + month + "/" + time.getUTCFullYear() + "-" + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() + '' + 'GMT';
    $(".abusive").click(function () {
        art_number = parseInt($(this).attr('number'));
        if ($(this).hasClass('unchecked')) {
            $(this).addClass('checked').removeClass('unchecked');
            // abusive = parseInt($("#abs_" + art_number).text());
            abusive =  1;
            console.log(abusive);
            $("#abs_" + art_number).text(abusive);
        } else {
            $(this).addClass('unchecked').removeClass('checked');
            // abusive = parseInt($("#abs_" + art_number).text());
            abusive = -1;
            console.log(abusive);
            $("#abs_" + art_number).text(abusive);
        }
        // abusive = 0;

    });

    $(".spam").click(function () {
        art_number = parseInt($(this).attr('number'));
        if ($(this).hasClass('unchecked')) {
            $(this).addClass('checked').removeClass('unchecked');
            // spam = parseInt($("#sp_" + art_number).text());
            spam = 1;
            console.log(spam);
            $("#sp_" + art_number).text(spam);
        } else {
            $(this).addClass('unchecked').removeClass('checked');
            // spam = parseInt($("#sp_" + art_number).text());
            spam = -1;
            console.log(spam);
            $("#sp_" + art_number).text(spam);
        }
        // spam = 0;
    });
    $(".copyrighted").click(function () {
        art_number = parseInt($(this).attr('number'));
        if ($(this).hasClass('unchecked')) {
            $(this).addClass('checked').removeClass('unchecked');
            // copyrighted = parseInt($("#copy_" + art_number).text());
            copyrighted = 1;
            console.log(copyrighted);
            $("#copy_" + art_number).text(copyrighted);
        } else {
            $(this).addClass('unchecked').removeClass('checked');
            // copyrighted = parseInt($("#copy_" + art_number).text());
            copyrighted = -1;
            console.log(copyrighted);
            $("#copy_" + art_number).text(copyrighted);
        }
        // copyrighted = 0;
    });


</script>

