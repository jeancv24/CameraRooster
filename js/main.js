function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}


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