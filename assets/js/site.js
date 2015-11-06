;$(document).ready(function () {
    $('select.chosen').chosen({
        allow_single_deselect: true
    });
    $('#scrapping-search').on('submit', function (e) {
        $(this).find('input, select, button').prop('disabled', true).trigger('chosen:updated');
    });
});