/*global jQuery, csrf_cookie_name */
jQuery(function ($) {
    var $csrf_field,
        save_and_close = false,
        csrf_field = null;

    $csrf_field = $('#crudForm>input[type=hidden]:first');

    if ($csrf_field.length === 1) {
        csrf_field = {
            name: $csrf_field.attr('name'),
            value: $csrf_field.val(),
            csrf_cookie_name: csrf_cookie_name
        };

        if (csrf_field.name === undefined || csrf_field.value === undefined || csrf_field.csrf_cookie_name === '') {
            csrf_field = null;
        }
    }

    $('.ptogtitle').click(function () {
        if ($(this).hasClass('vsble')) {
            $(this).removeClass('vsble');
            $('#main-table-box #crudForm').slideDown("slow");
        } else {
            $(this).addClass('vsble');
            $('#main-table-box #crudForm').slideUp("slow");
        }
    });

    $('#save-and-go-back-button').click(function(){
        save_and_close = true;

        $('#crudForm').trigger('submit');
    });

    $('#crudForm').submit(function(){
        var my_crud_form = $(this);

        if (csrf_field !== null) {
            $csrf_field.val(getCookie(csrf_field.csrf_cookie_name));
        }

        $(this).ajaxSubmit({
            url: validation_url,
            dataType: 'json',
            cache: 'false',
            beforeSend: function () {
                // $("#FormLoading").show();
                showModal();
                
            },
            success: function(data){
                // $("#FormLoading").hide();
                hideModal();

                if (csrf_field !== null) {
                    $csrf_field.val(getCookie(csrf_field.csrf_cookie_name));
                }

                if(data.success)
                {
                    $('#crudForm').ajaxSubmit({
                        dataType: 'text',
                        cache: 'false',
                        beforeSend: function () {
                            showModal();
                            // $("#FormLoading").show();
                            
                        },
                        success: function(result){
                            // $("#FormLoading").fadeOut("slow");
                            hideModal();
                            data = $.parseJSON( result );
                            if(data.success)
                            {
                                var data_unique_hash = my_crud_form.closest(".flexigrid").attr("data-unique-hash");

                                $('.flexigrid[data-unique-hash='+data_unique_hash+']').find('.ajax_refresh_and_loading').trigger('click');

                                if(save_and_close)
                                {
                                    if ($('#save-and-go-back-button').closest('.ui-dialog').length === 0) {
                                        window.location = data.success_list_url;
                                    } else {
                                        $(".ui-dialog-content").dialog("close");
                                        success_message(data.success_message);
                                    }

                                    return true;
                                }

                                $('.field_error').each(function(){
                                    $(this).removeClass('field_error');
                                });
                                clearForm();
                                form_success_message(data.success_message);
                            }
                            else
                            {
                                alert( message_insert_error );
                            }
                        },
                        error: function(){
                            alert( message_insert_error );
                            // $("#FormLoading").hide();
                            hideModal();
                        }
                    });
                }
                else
                {
                    $('.has-error').removeClass('has-error');
                    form_error_message(data.error_message);
                    $.each(data.error_fields, function(index,value){
                        $('input[name='+index+']').closest('.form-group').addClass('has-error');
                    });

                }
            },
            error: function(){
                if (csrf_field !== null) {
                    $csrf_field.val(getCookie(csrf_field.csrf_cookie_name));
                }

                error_message (message_insert_error);
                // $("#FormLoading").hide();
                hideModal();
            }
        });
        return false;
    });

    if( $('#cancel-button').closest('.ui-dialog').length === 0 ) {

        $('#cancel-button').click(function (){
            window.location = list_url;

            return false;
        });

    }
});

function clearForm()
{
    $('#crudForm').find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

    /* Clear upload inputs  */
    $('.open-file,.gc-file-upload,.hidden-upload-input').each(function(){
        $(this).val('');
    });

    $('.upload-success-url').hide();
    $('.fileinput-button').fadeIn("normal");
    /* -------------------- */

    $('.remove-all').each(function(){
        $(this).trigger('click');
    });

    $('.chosen-multiple-select, .chosen-select, .ajax-chosen-select').each(function(){
        $(this).trigger("chosen:updated");
        console.log("clear");
    });
}

function form_success_message(success_message)
{
    $('#report-success').slideUp('fast');
    $('#report-success').html(success_message);
    $('#report-success').slideDown('normal');
    $('#report-error').slideUp('fast').html('');
}

function form_error_message(error_message)
{
    $('#report-error').slideUp('fast');
    $('#report-error').html(error_message);
    $('#report-error').slideDown('normal');
    $('#report-success').slideUp('fast').html('');
}