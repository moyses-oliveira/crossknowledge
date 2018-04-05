$(document).ready(function (){
   $('a.new-register').click(function(e) {
        e.preventDefault();
        var formUrl =$(this).attr('href');
        $('body').faLoading();
        $.get(formUrl, [], function (html) {
            window.bootbox.dialog({title: 'Registro', message: html, size: 'large'});    
        }).always(function () {
            $('body').faLoading();
        }); 
   });
});