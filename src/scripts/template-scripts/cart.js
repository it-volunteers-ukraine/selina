// Add ability to change quantity of product with custom buttons - and + 
jQuery(document).ready(function($){
    $('main.main').on('click', '.quantity button', function() {
        let btn = $(this);
        let inputQty = btn.parent().find('.qty');
        let prevValue = +(inputQty.val());
        let newValue = 1;
        if (btn.hasClass('btn-plus')) {
            newValue = prevValue + 1;
        } else {
            if (prevValue > 1) {
                newValue = prevValue - 1;
            }
        }
        inputQty.val(newValue);
        $( '.update-cart' ).prop( 'disabled', false );
    });
});