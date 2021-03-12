
$('#add_module_form_temperature').after('<div id="result">'+$('#add_module_form_temperature').val()+'°C</div>')

$('#add_module_form_temperature').on('input', function() {

    $('#result').remove();
   //je récupere la valeur du input et l'ajoute directement en dessous de celui-ci
    $(this).after('<div id="result">'+$(this).val()+'°C</div>')
});



$('#add_module_form_duree_fonctionnement').after('<div id="result2">'+$('#add_module_form_duree_fonctionnement').val()+'H</div>')

$('#add_module_form_duree_fonctionnement').on('input', function() {

    $('#result2').remove();
    $(this).after('<div id="result2">'+$(this).val()+'H</div>')
});



// Changement du lien HREF du logo dans le dashboard 
// document.getElementById("header-logo").href = "stylesheetxhtml.css";



$(document).ready(function(){


    $("h1, p").delay("1000").fadeIn();


    // hide #back-top first
    $("#back-top").hide();


    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
      
            }
        });


        // scroll body to 0px on click
        $('a#back-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });


});