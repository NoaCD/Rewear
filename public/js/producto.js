$(document).ready(function() {
    $('#p1').show();
    $('#p2').hide();
    $('#p3').hide();
    $('#p4').hide();
    $('#p5').hide();

    $('#i-1').click(function(){
        $('#p1').show();
        $('#p2').hide();
        $('#p3').hide();
        $('#p4').hide();
        $('#p5').hide();
    });

    $('#i-2').click(function(){
        $('#p1').hide();
        $('#p2').show();
        $('#p3').hide();
        $('#p4').hide();
        $('#p5').hide();
    });

    $('#i-3').click(function(){
        $('#p1').hide();
        $('#p2').hide();
        $('#p3').show();
        $('#p4').hide();
        $('#p5').hide();
    });
    $('#i-4').click(function(){
        $('#p1').hide();
        $('#p2').hide();
        $('#p3').hide();
        $('#p4').hide();
        $('#p5').show();
    });
});

