document.addEventListener("DOMContentLoaded", function () {
    lightGallery(document.getElementById("lightgallery"), {
        selector: ".gallery-item",
    });
});

$(document).ready(function () {
    $('#burgerMenu').click(function () {
        var nav = $('#nav421411044');
        if ($(window).width() <= 768) { // Assuming 768px as the breakpoint for mobile view
            if (nav.height() == 95) {
                nav.attr('class', 't228 t228__positionfixed tmenu-mobile__menucontent_hidden h-500');
            } else {
                nav.attr('class', 't228 t228__positionfixed tmenu-mobile__menucontent_hidden h-95');
            }
        }
    });
});
