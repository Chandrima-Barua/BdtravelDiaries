<?php
    global $articles;
//global $user;
//echo $user;
    ?>
<script>
objects = <?php echo json_encode($articles); ?>;
console.log(objects);
$(".signin").click(function (e) {
    var name = $("#name").val();
    console.log(name);
    // var main = eval(objects);
    // console.log(main);
    $(".main").html("");
    //if(name == <?php //echo "'".$articles[1]['username']."'"; ?>//){
    //    $(".wrapper").html("<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'><?php //foreach ($articles as $key => $value) { ?>//");
    //    $(".wrapper").html("<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'><?php //foreach ($articles as $key => $value) { ?>//");
    // }
    header = "<h2>BANGLADESH TRAVEL DIARIES</h2>";
    $(".main").before(header);


    footer = "<div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session='"+name+"' >Signed in as: ["+name+"] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>";
    $(".main").after(footer);

    <?php foreach ($articles as $key => $value) { ?>
    if(name === <?php echo "'".$value['username']."'"; ?>) {
      strings = "<div class='all_post' id='art_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'><ul><li><span><?php echo $value['articletitle']; ?></span><li class='date'> <?php echo $value['username']; ?>| <?php echo $value['publishtime']; ?></li><br><li class='date'><?php echo $value['articletext']; ?></li></ul></div>";
      $(".main").append(strings);
    }

    else{
        strings = "<div class='all_post' id='art_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'><ul><li><span><?php echo $value['articletitle']; ?></span><input type='button' value='Flag' style='float: right' class='flag' id='flag_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'><div  class='opt' id='opt_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive' id='abusive_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'/>Abusive<span class='close' id='close_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'>X</span></li><li><input type='checkbox' class='spam' id='spam_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'/>Spam</li><li><input type='checkbox' class='copyrighted' id='copyrighted_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'/>Copyrighted<button class='report' id='report_<?php echo $value['articlenumber']?>' number='<?php echo $value['articlenumber'] ?>'>Report</button></li></ul></div></li><li class='date'> <?php echo $value['username']; ?>| <?php echo $value['publishtime']; ?></li><br><li class='date'><?php echo $value['articletext']; ?></li></ul></div>";
        $(".main").append(strings);
    }
    <?php } ?>

    //console.log(<?php //echo "'".$articles[1]['username']."'"; ?>//);
    //strings ="<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'><?php //foreach ($articles as $key => $value) { ?>//<div class='all_post' id='art_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><ul><li><span><?php //echo $value['articletitle']; ?>//</span><?php //if ( $value['username'] != "+name+") { ?>//<input type='button' value='Flag' style='float: right' class='flag' id='flag_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><div  class='opt' id='opt_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive' id='abusive_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Abusive<span class='close' id='close_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'>X</span></li><li><input type='checkbox' class='spam' id='spam_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Spam</li><li><input type='checkbox' class='copyrighted' id='copyrighted_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Copyrighted<button class='report' id='report_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'>Report</button></li></ul></div><?php //} ?>//</li><li class='date'> <?php //echo $value['username']; ?>//| <?php //echo $value['publishtime']; ?>//</li><br><li class='date'><?php //echo $value['articletext']; ?>//</li></ul></div><?php //} ?>//</div><div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session='" + name + "' >Signed in as: [" + name + "] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>";
    // $(".wrapper").html().show();
    $(".all_post ul li ").on("click", "input", function (event) {
        var art_number = parseInt($(this).attr('number'));

        // console.log(art_number);
        $("[id^=opt_" + art_number).show();

        $("[id^=close_" + art_number).click(function (e) {
            $("[id^=opt_" + art_number).hide();
        });
    });
    var username = $(".username").attr("session");
    console.log(username);
    var time = new Date();
    var month = time.getMonth() + 1;
    update_time = time.getUTCDate() + "/" + month + "/" + time.getUTCFullYear() + "-" + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() + '' + 'GMT';
    console.log(update_time);
    abusive = 0;
    spam = 0;
    copyrighted = 0;
    $(".abusive").click(function () {
        abusive = 1;
        // spam = 0;
        // copyrighted = 0;
    });

    $(".spam").click(function () {

        spam = 1;

    });
    $(".copyrighted").click(function () {

        copyrighted = 1;
    });
    $(".report").click(function () {
        // report_id = $(this).attr("number");
        art_number = parseInt($(this).attr('number'));
        // if(abusive == "" && spam == "" && copyrighted == "" ) {
        // console.log(username);
        // console.log(art_number);
        // console.log(abusive);
        // console.log(spam);
        // console.log(copyrighted);
        // console.log(update_time);

        $.ajax({
            type: "POST",
            url: "flag-add.php",
            dataType: 'json',
            data: {
                username: username,
                art_number: art_number,
                abusive: abusive,
                spam: spam,
                copyrighted: copyrighted,
                update_time: update_time
            },
            success: function (data) {
                console.log(data);
            }
        });
        $("[id^=opt_" + art_number).hide();
    });

    // $('#title').val('');
    // $('#art').val('');


    $("#post").click(function () {
        var title = $("#title").val();
        console.log(title);
        var username = $(".username").attr("session");
        console.log(username);

        var art = $("#art").val();
        console.log(art);

        var time = new Date();
        var month = time.getMonth() + 1;
        update_time = time.getUTCDate() + "/" + month + "/" + time.getUTCFullYear() + "-" + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() + '' + 'GMT';
        console.log(update_time);


        if (username == "" && title == "" && art == "") {
            $("#post").attr("disabled", true);
        } else {
            strings = "<div class='all_post'><ul><li>" + title + "</li><li>" + username + "|" + update_time + "</li><br><li>" + art + "</li></ul></div>";
            $(".all_post").parent().children().last().after(strings);

            $.ajax({
                type: "POST",
                url: "articles-add.php",
                dataType: 'json',
                data: {username: username, title: title, art: art, update_time: update_time},
                success: function (data) {
                    console.log(data);
                }
            });
            $('#title').val('');
            $('#art').val('');
        }
    });
});
// $(".abusive").click(function () {
//
// });

// $(".li_op li").on("click","input",function (event) {
//  console.log($(this).attr("class"));
//
//
// });


</script>