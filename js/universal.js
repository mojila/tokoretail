$(document).ready(function () {
    $('#login').click(function () {
        $('#main-content').load('login.php');
    });
    $('#register').click(function () {
        $('#main-content').load('register.php');
    });
    $.golanding = function () {
        $('#main-content').load('landing.php');
    };
});