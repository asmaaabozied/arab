$(document).ready(function() {
    "use strict";
    $(".repeater-default").repeater(), $(".repeater-custom-show-hide").repeater({
        show: function() {
            $(this).slideDown()
        },
        hide: function(e) {
            confirm("آيا مى خواهيد اين آيتم را حذف كنيد") && $(this).slideUp(e)
        }
    })
});
