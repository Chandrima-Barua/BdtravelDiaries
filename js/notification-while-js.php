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
                    after_update = [];
                    if (typeof main !== "undefined") {
                        // main = [];
                        for (i = 0; i < Object.keys(main).length; i++) {
                            after_update.push(main[i]);
                            console.log(after_update);


if(after_update[i]['recorded'] === 1) {

    if (after_update[i]['uncheck_flagspam'] === true && after_update[i]['uncheck_flagcopyright'] === true && after_update[i]['uncheck_flagabusive'] === true) {
        string1 = "<b> spam,copyrighted and abusive </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagspam'] === true && after_update[i]['uncheck_flagabusive'] === true) {
        string1 = "<b> spam and abusive </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagabusive'] === true && after_update[i]['uncheck_flagcopyright'] === true) {
        string1 = "<b>  abusive and copyrighted </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagspam'] === true && after_update[i]['uncheck_flagcopyright'] === true) {
        string1 = "<b>  spam and copyrighted </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagcopyright'] === true) {
        string1 = "<b>  copyrighted </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagabusive'] === true) {
        string1 = "<b>  abusive </b>";
        console.log(string1);
    } else if
    (after_update[i]['uncheck_flagspam'] === true) {
        string1 = "<b>  spam </b>";
        console.log(string1);

    }

    if (after_update[i]['flagspam'] === true && after_update[i]['flagcopyright'] === true && after_update[i]['flagabusive'] === true) {
        string = "<b> spam,copyrighted and abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true && after_update[i]['flagabusive'] === true) {
        string = "<b> spam and abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagabusive'] === true && after_update[i]['flagcopyright'] === true) {
        string = "<b>  abusive and copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true && after_update[i]['flagcopyright'] === true) {
        string = "<b>  spam and copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagcopyright'] === true) {
        string = "<b>  copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagabusive'] === true) {
        string = "<b>  abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true) {
        string = "<b>  spam.</b>";
        console.log(string);

    }


    $("#admin tr").last().after("<tr><td>" + after_update[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + after_update[i]['reportedby'] + "</b> has unflagged the article '<b>" + after_update[i]['title'] + "</b>' posted by <b>" + after_update[i]['postedby'] + "</b> as" + string1 + " and flagged it as " + string +"</td></tr>");


}
else {

    if (after_update[i]['flagspam'] === true && after_update[i]['flagcopyright'] === true && after_update[i]['flagabusive'] === true) {
        string = "<b> spam,copyrighted and abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true && after_update[i]['flagabusive'] === true) {
        string = "<b> spam and abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagabusive'] === true && after_update[i]['flagcopyright'] === true) {
        string = "<b>  abusive and copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true && after_update[i]['flagcopyright'] === true) {
        string = "<b>  spam and copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagcopyright'] === true) {
        string = "<b>  copyrighted.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagabusive'] === true) {
        string = "<b>  abusive.</b>";
        console.log(string);
    } else if
    (after_update[i]['flagspam'] === true) {
        string = "<b>  spam.</b>";
        console.log(string);

    }

    $("#admin tr").last().after("<tr><td>" + after_update[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + after_update[i]['reportedby'] + "</b> has flagged the article '<b>" + after_update[i]['title'] + "</b>' posted by <b>" + after_update[i]['postedby'] + "</b> as" + string + "</td></tr>");
}
                        }


                    }

            }

        });


    // timeOutID = setInterval(doAjax, 5000);

    // $("#admin tr").last().after("<tr><td>" + main[i]['time'] + "</td><td class='title'><b style='text-decoration: underline;'>" + main[i]['reportedby'] + "</b> has flagged the article '<b>" + main[i]['title'] + "</b>' posted by <b>" + main[i]['postedby'] + "</b> as + if(main[i]['flagspam']== true && main[i]['flagcopyright'] && main[i]['flagabusive'] ){"<b> spam,copyrighted and abusive.</b>";}+"</td></tr>");

</script>
