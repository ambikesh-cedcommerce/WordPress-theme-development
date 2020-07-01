jQuery(document).ready(function($) {
    $('#submit').click(function() {
        var name = $('#fname').val();
        var email = $('#email-a').val();
        var feedback = $('#feed_bk').val();
        $.ajax({
            url: feedback_ajax_obj.ajaxurl, // url of the file where it will request
            data: {
                'action': 'feedback_ajax_action', // 'example_ajax_request' is functions name which will recieve these values .
                'name': name,
                'email': email,
                'feedback': feedback,
                'nonce': feedback_ajax_obj.nonce // object name which has been declared while localizing script .
            },
            success: function(response) {
                // This outputs the result of the ajax request
                alert(response);
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });
    });

});