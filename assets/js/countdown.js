/**
 * Created by aptor on 09/02/17.
 */

$(document).on('ready', function () {
    var countDownDate = new Date("May 23, 2017 08:00:00").getTime();

    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));

    $("#dias").html(days + ' Dias');
});



