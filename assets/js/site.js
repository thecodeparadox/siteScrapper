;$(document).ready(function () {
    $('select.chosen').chosen({
        allow_single_deselect: true
    });
    $('#scrapping-search').on('submit', function (e) {
        setTimeout(function() {
            $(this).find('input, select, button').prop('disabled', true).trigger('chosen:updated');
        }, 50);
    });
});