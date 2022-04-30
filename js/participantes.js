

(
    function participants($) {
        var small_screen_heading = "Nombre";


       fetch("http://localhost/camerarooster/php/participantsResponse.php")
       .then(response => response.json())
       .then(data => {



           console.log(data);
           for (var i = 0; i < data.length ; i++) {

            var accordianhtml = "<button class='accordion'>" + data[i][small_screen_heading] + "<span class='arrow rarrow'>&#8594;</span><span class='arrow darrow'>&#8595;</span></button><div class='panel'><p><table class='accordian_table'>";
            var table_row = null;
            var table_header = null;
            for (var key in data[i]) {
                accordianhtml = accordianhtml + "<tr><th>" + key + "</th><td>" + data[i][key] + "</td></tr>";

                if (i === 0 && true) { table_header = table_header + "<th>" + key + "</th>"; }
                table_row = table_row + "<td>" + data[i][key] + "</td>"
            }

            if (i === 0 && true) {
                table_header = "<tr>" + table_header + "</tr>";
                $(".mv_table #simple_table").append(table_header);
            }
            table_row = "<tr>" + table_row + "</tr>";
            $(".mv_table #simple_table").append(table_row);
            accordianhtml = accordianhtml + "</table></p></div>";
            $(".mv_table .accordian_content").append(accordianhtml);
        }
        $(".mv_table .accordion").click(function() {
            $(".panel").slideUp();
            $('.rarrow').show();
            $('.darrow').hide();

            if (!$(this).hasClass("active")) {
                $(".mv_table .accordion").each(function() { $(this).removeClass('active'); });
                $(this).addClass('active');
                $(this).next().slideDown();
                $(this).find('.rarrow').hide();
                $(this).find('.darrow').show();
            } else { $(".mv_table .accordion").each(function() { $(this).removeClass('active'); }); }
        });

       })


    })(jQuery);


$(document).ready(function() {
    var window_height = $(window).height();
    var page_height = $('#header').height() + $('#content').height();
    var footer_height = $('#footer').height();

    if (page_height < window_height) {
        margin_footer = window_height - page_height - footer_height - 40;
        $('#footer').css('margin-top', margin_footer);
    }
});



function ajustarPie() {
    var winH = $(window).height();
    var docH = $("body").height();
    var pieH = $("footer").height();

    if (docH + pieH < winH) {
        $("footer").attr("class", "bottom");
    } else {
        $("footer").attr("class", "");
    }
}

$(document).ready(ajustarPie);
$(window).on("resize", ajustarPie);