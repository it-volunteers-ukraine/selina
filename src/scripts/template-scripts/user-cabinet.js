jQuery(document).ready(function($) {
    // Функція для відправки AJAX запиту
    function loadACFRepeaterData() {
        $.ajax({
            url: my_ajax_object.ajax_url, // Адреса для AJAX запиту
            type: 'POST',
            data: {
                action: 'load_acf_repeater_data' // Назва дії
            },
            success: function(response) {
                $('#acf-repeater-container').html(response); // Вставка результату в контейнер
            }
        });
    }

    // Виклик функції
    loadACFRepeaterData();
});