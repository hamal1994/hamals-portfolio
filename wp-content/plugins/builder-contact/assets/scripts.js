jQuery(function ($) {

    $('body').on('submit', '.builder-contact', function () {
        var form = $(this);

        if (form.hasClass('sending')) {
            return false;
        }
        form.addClass('sending');
        form.find('.contact-message').fadeOut();

        send_form(form);

        return false;
    });

    function send_form(form) {
        var data = {
            action: 'builder_contact_send',
            'contact-name': $('[name="contact-name"]', form).val(),
            'contact-email': $('[name="contact-email"]', form).val(),
            'contact-subject': $('[name="contact-subject"]', form).val(),
            'contact-message': $('[name="contact-message"]', form).val(),
            'contact-sendcopy': $('[name="send-copy"]', form).val(),
            'contact-settings': $('.builder-contact-form-data', form).html()
        };
        if (form.find('[name="g-recaptcha-response"]').length > 0) {
            data['contact-recaptcha'] = form.find('[name="g-recaptcha-response"]').val();
        }
        $.ajax({
            url: form.prop('action'),
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data && data.themify_message) {
                    form.find('.contact-message').html(data.themify_message).fadeIn();
                    form.removeClass('sending');
                    if (data.themify_success) {
                        $('body').trigger('builder_contact_message_sent', [form, data.themify_message]);
                        form[0].reset();
                    } else {
                        $('body').trigger('builder_contact_message_failed', [form, data.themify_message]);
                    }
                    if (grecaptcha) {
                        grecaptcha.reset();
                    }
                }
            }
        });
    }
});