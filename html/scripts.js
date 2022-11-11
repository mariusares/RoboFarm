$(document).ready(function(){
    $('.modal').modal();
});
$(".button-collapse").sideNav();
$('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: true, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });
$(document).ready(function(){
    $('ul.tabs').tabs();
});
$("#scroll-live-data").click(function(){
    $("html, body").animate({
        scrollTop: $('#live-data-anchor').offset().top - 64
    }, 500);
});
$("#scroll-comfort").click(function(){
    $("html, body").animate({
        scrollTop: $('#comfort-anchor').offset().top - 64
    }, 500);
});
$("#scroll-irrigation").click(function(){
    $("html, body").animate({
        scrollTop: $('#irrigation-anchor').offset().top - 64
    }, 500);
});
function submit1() {
  var checkbox = document.getElementById('mycheckbox');
  alert('checkbox value: ' + checkbox.checked);
}
