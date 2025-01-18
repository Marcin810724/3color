jQuery(document).ready(function ($) {
    $("#video1").mouseenter(function () {
        $("#video2").addClass('bigger');
        $("#video3").addClass('bigger');
    });
    $("#video1").mouseleave(function () {
        $("#video2").removeClass('bigger');
        $("#video3").removeClass('bigger');
    });
    $("#video2").mouseenter(function () {
        $("#video1").addClass('bigger');
        $("#video3").addClass('bigger');
    });
    $("#video2").mouseleave(function () {
        $("#video1").removeClass('bigger');
        $("#video3").removeClass('bigger');
    });
    $("#video3").mouseenter(function () {
        $("#video1").addClass('bigger');
        $("#video2").addClass('bigger');
    });
    $("#video3").mouseleave(function () {
        $("#video1").removeClass('bigger');
        $("#video2").removeClass('bigger');
    });

});