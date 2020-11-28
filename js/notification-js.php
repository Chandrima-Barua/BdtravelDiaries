<?php
global $final_result;
?>
<script>

    // console.log($("#admin tr"));
    table_row = parseInt($("#admin tr").last().attr("id"));
    console.log(table_row);
    console.log($("#admin tr").last());
    number = [];
    $("#admin tr").each(function () {

        number.push(parseInt($(this).attr("id")));
    });

    console.log(number);
    objects = {};
    var timeOutID = 0;

    function doAjax() {
        $.ajax({
            type: 'POST',
            url: 'notification.php',
            dataType: "text",
            data: ({table_row: table_row, number: number}),

            success: function (data) {
                console.log(data);
                console.log("running");
                // $("#admin tr").last().after("hi");
                var objects = data;
                var main = eval(objects);
                console.log(main);
                if (typeof main !== "undefined") {
                    after_update = [];
                    for (i = 0; i < Object.keys(main).length; i++) {
                        after_update.push(main[i]);
                        // console.log(after_update[i]['flagspam']);


                        console.log(after_update);
                        // if (after_update[i]['flagspam'] === true) {
                        //     string = "<b> spam.</b>";
                        // }
                        // $("#admin tr").last().after("hi");
                         if(after_update[i]['flagspam'] == true && after_update[i]['flagcopyright'] == true && after_update[i]['flagabusive'] == true)

                        {
                            string = "<b> spam,copyrighted and abusive.</b>";
                        }
                        else if
                        (after_update[i]['flagspam'] == true && after_update[i]['flagabusive'] == true)
                        {
                            string = "<b> spam and abusive.</b>";
                        }

                        else if
                        (after_update[i]['flagabusive'] == true && after_update[i]['flagcopyright'] == true)
                        {
                            string = "<b>  abusive and copyrighted.</b>";
                        }

                        else if
                        (after_update[i]['flagspam'] == true && after_update[i]['flagcopyright'] == true)
                        {
                            string = "<b>  spam and copyrighted.</b>";
                        }

                        else if
                        (after_update[i]['flagcopyright'] == true)
                        {
                            string = "<b>  copyrighted.</b>";
                        }
                        else if
                        (after_update[i]['flagabusive'] == true)
                        {
                            string = "<b>  abusive.</b>";
                        }
                        else if
                        (after_update[i]['flagspam'] == true)
                        {
                            string = "<b>  spam.</b>";
                        }
                        $("#admin tr").last().after("<tr><td>" + after_update[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + after_update[i]['reportedby'] + "</b> has flagged the article '<b>" + after_update[i]['title'] + "</b>' posted by <b>" + after_update[i]['postedby'] + "</b> as" + string + "</td></tr>");


                    }

                    table_row = table_row + 1;

                    console.log(table_row);

    }
    }

    });
    }

    timeOutID = setInterval(doAjax, 5000);

    // $("#admin tr").last().after("<tr><td>" + after_update[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + after_update[i]['reportedby'] + "</b> has flagged the article '<b>" + after_update[i]['title'] + "</b>' posted by <b>" + after_update[i]['postedby'] + "</b> as + if(after_update[i]['flagspam']== true && after_update[i]['flagcopyright'] && after_update[i]['flagabusive'] ){"<b> spam,copyrighted and abusive.</b>";}+"</td></tr>");

</script>
