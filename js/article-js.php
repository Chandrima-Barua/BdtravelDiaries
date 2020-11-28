<script>

    $(".signin").click(function (e) {
        var name = $("#name").val();
        console.log(name);
        $(".main").html("");
        // console.log($(".all_post"));
        $.ajax({
            type: "POST",
            url: "signin.php",
            dataType: 'json',
            data: {
                name: name,

            },

            success: function (data) {

                user = data;
                console.log(user);
                after_update = [];
                for (i = 0; i < Object.keys(user).length; i++) {
                    after_update.push(user[i]);
                    // console.log(after_update);
                }


                header = "<h2>BANGLADESH TRAVEL DIARIES</h2>";
                $(".main").before(header);


                footer = "<div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session='" + name + "' >Signed in as: [" + name + "] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>";
                $(".main").after(footer);


                for (i in after_update[0]) {
                    // console.log(Object.keys(user).length);
                    if (name === after_update[0][i]['postedby']) {
                        strings = "<div class='all_post' id=" + after_update[0][i]['articlenumber'] + " number=" + after_update[0][i]['articlenumber'] + "><ul><li><span>" + after_update[0][i]['title'] + "</span><li class='date'> " + after_update[0][i]['postedby'] + "| " + after_update[0][i]['time'] + "</li><br><li class='date'>" + after_update[0][i]['text'] + "</li></ul></div>";
                        $(".main").append(strings);
                    } else {
                        strings = "<div class='all_post' id='" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'><ul><li><span>" + after_update[0][i]['title'] + "</span><input type='button' value='Flag' style='float: right' class='flag' id='flag_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'><div  class='opt' id='opt_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "' style='display: none'><ul class='li_op'>";

                        if (after_update[0][i]['flagabusive'] === false) {

                            abusives = "<li><input type='checkbox' class='abusive checked' checked='checked' id='abusive_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "' />Abusive<span class='close' id='close_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'>X</span><span style='display: none' id='abs_" + after_update[0][i]['articlenumber'] + "'></span></li>";
                        } else {

                            abusives = "<li><input type='checkbox' class='abusive unchecked' id='abusive_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'/>Abusive<span class='close' id='close_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'>X</span></li>";
                        }
                        if (after_update[0][i]['flagspam'] === false) {

                            spams = "<li><input type='checkbox' class='spam checked' checked='checked' id='spam_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'/>Spam</li>";
                        } else {
                            spams = "<li><input type='checkbox' class='spam unchecked' id='spam_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'/>Spam</li>";
                        }
                        if (after_update[0][i]['flagcopyright'] === false) {

                            copyrighteds = "<li><input type='checkbox' class='copyrighted checked' checked='checked' id='copyrighted_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'/>Copyrighted<button class='report' id='report_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'>Report</button></li>";
                        } else {
                            copyrighteds = "<li><input type='checkbox' class='copyrighted unchecked' id='copyrighted_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'/>Copyrighted<button class='report' id='report_" + after_update[0][i]['articlenumber'] + "' number='" + after_update[0][i]['articlenumber'] + "'>Report</button></li>";
                        }

                        last = "</ul></div></li><li class='date'>" + after_update[0][i]['postedby'] + "|" + after_update[0][i]['time'] + "</li><br><li class='date'>" + after_update[0][i]['text'] + "</li></ul></div>";

                        $(".main").append(strings + abusives + spams + copyrighteds + last);

                    }
                }


                $(".all_post ul li ").on("click", "input", function (event) {
                    var art_number = parseInt($(this).attr('number'));

                    // console.log(art_number);
                    $("[id^=opt_" + art_number).show();

                    $("[id^=close_" + art_number).click(function (e) {
                        // abusive = 0;
                        // spam = 0;
                        // copyrighted = 0;


                        $("[id^=opt_" + art_number).hide();
                        // $('input[type=checkbox]').each(function () {
                        //     this.checked = false;
                        // });
                    });
                });
                var username = $(".username").attr("session");
                console.log(username);
                var time = new Date();
                var month = time.getMonth() + 1;
                var update_time = time.getUTCDate() + "/" + month + "/" + time.getUTCFullYear() + "-" + time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() + '' + 'GMT';
                record = 0;
                abusive = 0;
                spam = 0;
                copyrighted = 0;
                $(".abusive").click(function () {
                art_number = parseInt($(this).attr('number'));
                if ($(this).hasClass('unchecked')) {
                    $(this).addClass('checked').removeClass('unchecked');
                    // abusive = parseInt($("#abs_" + art_number).text());
                    abusive = 1;
                    console.log(abusive);
                    $("#abs_" + art_number).text(abusive);


                } else {
                    $(this).addClass('unchecked').removeClass('checked');
                    // abusive = parseInt($("#abs_" + art_number).text());
                    abusive = -1;
                    console.log(abusive);
                    $("#abs_" + art_number).text(abusive);
                    record = 1;
                }
                });
                // abusive = 0;



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
                        record = 1;
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
                        record = 1;
                    }
                    // copyrighted = 0;
                });


                $(".report").click(function () {

                    console.log(username);
                    console.log(art_number);
                    console.log(abusive);
                    console.log(spam);
                    console.log(copyrighted);
                    console.log(update_time);
                    console.log(record);
                    if (abusive !== 0 || spam !== 0 || copyrighted !== 0) {

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
                                update_time: update_time,
                                record: record
                            },
                            success: function (data) {
                                console.log(data);
                            }

                        });
                    }
                    // else
                    // {
                    //     alert("please select atleast one input");
                    // }
                    $("[id^=opt_" + art_number).hide();
                    abusive = 0;
                    spam = 0;
                    copyrighted = 0;
                    record = 0;
                    // $('input[type=checkbox]').each(function()
                    // {
                    //     this.checked = false;
                    // });


                });


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
                        strings = "<div class='all_post'><ul><li><span>" + title + "</span></li><li class='date'>" + username + "| " + update_time + "</li><br><li class='date'>" + art + "</li></ul></div>";
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


            }


        });




    });
    // });

    // $.cookie('name', null);

</script>