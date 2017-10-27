/**
 * Created by bohdan on 26.10.2017.
 */


$(document).ready ( function(){
    jQuery(function($){
        $(".input-mask").each(function(){
            var th = $(this);
            th.mask(th.attr('data-mask'));
        });
    });
});



if($('.createBook').length>0){
    $('.createBook').validate({
        errorClass:'error-input',
        validClass:'success-input',
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },
        rules: {
            title: {
                required: true
            },
            language: {
                required: true
            },
            author: {
                required: true
            },
            genre: {
                required: true
            },
            publication: {
                required: true,
                maxlength: 4,
                digits: true
            },
            isbn: {
                required: true,

            },
        }
    });
}


