/* $(function () {

    // Get the form.
    var form = $('#contact-form');

    // Get the messages div.
    var formMessages = $('.form-message');

    // Set up an event listener for the contact form.
    $(form).submit(function (e) {
        // Stop the browser from submitting the form.
        e.preventDefault();
        // Serialize the form data.
        var formData = $(form).serialize();
        // Submit the form using AJAX.
        $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function (response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');
                // Set the message text.
                $(formMessages).text(response);
                // Clear the form.
                $('#contact-form input,#contact-form textarea').val('');
            })
            .fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');
                // Set the message text.
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
    });

});

 */



// html setup...
// 01. At first set it your form element = <form id="contact-form" action="assets/php/mail.php" method="POST">
// 02. Then set your script link = <script src="assets/js/ajax-contact.js"></script>
// 03. Under the <form> element put it = <p class="form-message"></p>
// And enjoy :)