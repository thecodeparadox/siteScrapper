<<<<<<< HEAD
/**
 * Created by abdullah on 10/28/15.
 */

$(document).ready(function () {

    // validation
    function activateValidation() {
        $('form').validationEngine({
            prettySelect: true,
            useSuffix: '_chosen'
        });
    }
    activateValidation();

    // enable chosen for all select
    function applyChosen(cb) {
        $('select.chosen').chosen({
            allow_single_deselect: true
        });

        if( cb && typeof cb === 'function' ) cb();
    }
    applyChosen();


    // Menu Toggle
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });

    $('#category_id').on('change', function() {
        console.log(this.value);
        if ( !this.value ) return false;

        var value = this.value,
            product_id = $('input[name="_product_id"]:hidden').val() || 0;

        $('.product-specifications').load('/attributes-categories/get_attributes/' + value + (product_id > 0 ? ('/' + product_id) : '') + '.html', function (html) {
            $('.product-specifications').find('select.chosen').chosen();
            $('form').validationEngine('detach').validationEngine('attach');
        });
    }).change();

    // add more details button
    $('#add-more-details').on('click', function () {
        var input = $('input[name="details[_names][]"]:first').clone(true).val('');
        $('.cloned-detail').append( $('<div class="form-group"><label></label>').append(input).append('<i class="fa fa-times remove-detail"></i>') );
    }).parent('div.form-group').css('text-align', 'right');

    $(document).on('click', '.remove-detail', function () {
        $(this).parent('.form-group').remove();
    });

    // Load users on department change for requisitions
    $('#department_id_chosen').on('change', function () {
        var department_id = this.value;
        var users = $('#user_ids_chosen');
        if ( !this.value ) {
            users.empty().prop('disabled', true).val('').attr('data-placeholder', 'No User to select').trigger('chosen:updated');
            return false;
        }

        users.empty().trigger('chosen:updated');
        $.ajax({
            url: '/departments/get-users/' + department_id + '.html',
            dataType: 'html',
            success: function(html) {
                if ( html.length ) {
                    users.prop('disabled', false).html(html).find('option').prop('selected', true).end().attr('data-placeholder', 'Choose User(s)').val('').trigger('chosen:updated');
                }
            }
        });
    });

    // get Requisition details
    var requisition = null, derequisitions = null, due_amount = 0;
    $('#derequisition_requisition_id_chosen').on('change', function() {
        var value = this.value, dreq_details = $('.derequisitions-details');
        dreq_details.hide(0).find('.drequisitions').empty();
        if ( !this.value ) {
            $('#due-amount, #derequisition-quantity').val('').prop('disabled', true);
            return false;
        }

        $.get('/requisitions/get-by-id/' + value + '.json', function (data) {
            requisition = data.requisition[0];
            derequisitions = requisition.derequisitions;
            due_amount = requisition.quantity;

            // Show derequisitions
            var html = '';
            if ( derequisitions.length ) {
                //derequisitions-details
                html += '<table class="table table-striped">' +
                            '<tr><th>Qty. Given</th><th>Qty. Due</th><th>Date</th></tr>';
                $.each(derequisitions, function (i, d) {
                    html += '<tr><td>' + d.quantity + '</td><td>' + d.due_amount + '</td><td>' + new Date(d.created).toString("MM/d/yyyy, hh:mm tt") + '</td></tr>'
                });
                html += '</table>';
                due_amount = derequisitions[derequisitions.length-1].due_amount;
            } else {
                html = '<div class="alert alert-danger">No derequisition found</div>';
            }
            dreq_details.find('.drequisitions').html(html).end().slideDown(100);

            $('#derequisition-quantity').val('').prop('disabled', false);
            $('#due-amount').val(due_amount);
        });
    });

    $('#due-amount').on('keydown input', function (e) {
        e.preventDefault();
    });

    $('#derequisition-quantity').on('input change', function () {
        var d = $('#due-amount');
        if( !this.value ) d.val(due_amount);
        var qty =  +this.value;
        if ( qty < 0 || qty > due_amount ) {
            this.value = qty = due_amount;
            d[0].value = 0;
            $(this).validationEngine('showPrompt', 'Quantity must be less or equal to due amount', 'error');
            return false;
        }

        d.val(function (i, val) {
            return Math.abs(due_amount - +qty);
        });
    });

    // datepicker
    $('#back-at-picker, #replace-at-picker').on('keypress paste', function () {
        return false;
    }).datepicker({
        format: 'mm/dd/yyyy',
        clearBtn: true,
        todayHighlight:  true
    }).on('changeDate', function () {
        var id = this.id, target = this.id.replace('-picker', '');
        $('#' + target).val( this.value.length ? (new Date(this.value).toString('yyyy-MM-dd')) : '' );
=======
;$(document).ready(function () {
    $('select.chosen').chosen({
        allow_single_deselect: true
    });
    $('#scrapping-search').on('submit', function (e) {
        $(this).find('input, select, button').prop('disabled', true).trigger('chosen:updated');
>>>>>>> master
    });
});