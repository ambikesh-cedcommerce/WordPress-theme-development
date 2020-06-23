jQuery(document).ready(function($) {

    // We'll pass this variable to the PHP function example_ajax_request
    var fruit = 'Banana';

    // This does the ajax request
    $.ajax({
        url: helloworld_ajax_obj.ajaxurl, // url of the file where it will request
        data: {
            'action': 'helloworld_ajax_action', // 'example_ajax_request' is functions name which will recieve these values .
            'fruit': fruit, // Noraml value which key fruit.
            'nonce': helloworld_ajax_obj.nonce // object name which has been declared while localizing script .
        },
        success: function(response) {
            // This outputs the result of the ajax request
            console.log(response);
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
});