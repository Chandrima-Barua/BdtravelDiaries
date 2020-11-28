<?php
global $final_result;
?>
<script>


    row = $("#admin tr").length;
    table_row = row - 1;

    console.log(table_row);
    objects = {};
    var interval = 5000;

    function doAjax() {
        $.ajax({
            type: 'POST',
            url: 'notification.php',
            dataType: "text",
            data: ({table_row: table_row}),

            success: function (data) {
                // strings = data['flagnumber'];

                // console.log(data);
                var objects = data;
                var main = eval(objects);
                console.log(main);
                //  let arr = objects.split(',');
                //  console.log(arr);

                // console.log(objects);
                // eval('var obj='+objects);
                // alert(obj.flagname);
                // console.log(JSON.parse(JSON.stringify(objects)));
                // console.log(jQuery.type(typeof main) );
                if (typeof main !== "undefined") {
                    after_update = [];
                    for (i = 0; i < Object.keys(main).length; i++) {
                        after_update.push(main[i]);
                        console.log(after_update[i]['flagspam']);


                        console.log(after_update);
                        if(after_update[i]['flagspam'] === true){
                            $("#admin tr").last().after("spam");
                        }

                        // $("#admin tr").last().after("<tr><td>" + after_update[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + after_update[i]['reportedby'] + "</b> has flagged the article '<b>" + after_update[i]['title'] + "</b>' posted by <b>" + after_update[i]['postedby'] + "</b> as + if(after_update[i]['flagspam']== true && after_update[i]['flagcopyright'] && after_update[i]['flagabusive'] ){"<b> spam,copyrighted and abusive.</b>";}+"</td></tr>");
                    }
                    table_row = table_row + 1;

                    console.log(table_row);
                    console.log("running");
                }
                // console.log(JSON.parse(objects));
                // obj = jQuery.parseJSON(objects);
                // console.log(jQuery.type(objects));
                // $(".table-container").after(flagnumber);
                // $('#hidden').text(data);
                // $("#span_dis_" + contribution_id).text(dislike);
            },

            complete: function (data) {
                // Schedule the next
                setTimeout(doAjax, interval);

                //  console.log(data);
                // console.log(table_row);
                //  console.log(data);

                console.log("running");

            }

        });
        // console.log($("#admin tr").last());
    }

    // table_row = update_row;
    setTimeout(doAjax, interval);
    // $(".table-container").after("hi");

    // });
</script>
<!--elseif (after_update[i]['flagspam'] && after_update[i]['flagabusive']){-->
<!--"<b> spam and abusive.</b>";-->
<!--}-->
<!---->
<!--elseif (after_update[i]['flagabusive']  && after_update[i]['flagcopyright']){-->
<!--"<b>  abusive and copyrighted.</b>";-->
<!--}-->
<!---->
<!--elseif (after_update[i]['flagspam'] && after_update[i]['flagcopyright']){-->
<!--"<b>  spam and copyrighted.</b>";-->
<!--}-->
<!---->
<!--elseif (after_update[i]['flagcopyright']){-->
<!--"<b>  copyrighted.</b>";-->
<!--}-->
<!--elseif (after_update[i]['flagabusive']){-->
<!--"<b>  abusive.</b>";-->
<!--}-->
<!--elseif(after_update[i]['flagspam']){-->
<!--"<b>  spam.</b>";-->
<!--}-->