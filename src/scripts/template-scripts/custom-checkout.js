// @ts-ignore

jQuery(document).ready(function ($) {

    function getCurrentLanguage() {
        if (typeof pll_current_language === 'function') {
            return pll_current_language();
        } else {
            console.warn('Polylang не знайдено');
            return 'uk';
        }
    }
    
    function updateCheckoutTitle() {
        var title = (pll_current_language() === 'uk') ? 'Оформлення замовлення' : 'Checkout';
        $('.woocommerce-billing-title').text(title);
    }

    function updateSectionTitle() {
        var title = (pll_current_language() === 'uk') ? 'Контактні дані' : 'Contact Information';
        $('.contact-details-header').text(title); 
    }

    function updatePlaceholders() {
        var lang = pll_current_language();
        
        var placeholders = {
            'billing_first_name': lang === 'uk' ? 'Ім’я*' : 'First Name*',
            'billing_last_name': lang === 'uk' ? 'Прізвище*' : 'Last Name*',
            'billing_phone': lang === 'uk' ? 'Номер телефону*' : 'Phone Number*',
            'billing_email': lang === 'uk' ? 'Email*' : 'Email*',
            'order_comments': lang === 'uk' ? 'Коментар (не обов’язково)' : 'Order Comment (optional)'
        };

        for (var field in placeholders) {
            if (placeholders.hasOwnProperty(field)) {
                $('input[name="' + field + '"], textarea[name="' + field + '"]').attr('placeholder', placeholders[field]);
            }
        }
    }

    function updateCheckoutButton() {
        var buttonText = (pll_current_language() === 'uk') ? 'Оформити' : 'Order';
        $('.checkout-button-title').text(buttonText);
    }

    function removeAdditionalInfoHeader() {
        const additionalInfoHeader = document.querySelector(".woocommerce-additional-fields h3");
        if (additionalInfoHeader) {
            additionalInfoHeader.remove();
        }
    }

    updateCheckoutTitle();
    updateSectionTitle();
    updatePlaceholders();
    updateCheckoutButton();
    removeAdditionalInfoHeader();

    $(document.body).on('language_changed', function() {
        updateCheckoutTitle();
        updateSectionTitle();
        updatePlaceholders();
        updateCheckoutButton();
        removeAdditionalInfoHeader();
    });
});
