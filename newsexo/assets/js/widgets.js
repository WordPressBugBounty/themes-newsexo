jQuery(document).ready( function($) {
    // upload field
    $( document ).on( "click", ".newsexo-media-upload", function(event) 
        {
            event.preventDefault();
            if ( frame ) {
                frame.open();
                return;
            }
            var _this = $(this), frame = wp.media({
                title: 'Select or Upload Image',
                button: {
                    text: 'Add Author Image'
                },
                multiple: false
            });
            frame.open();
            frame.on( 'select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                _this.siblings(".widefat").val( attachment.url ).trigger("change");
                _this.siblings('.newsexo_auth_img').val(attachment.url);
                 _this.siblings('.newsexo-widget-img').attr( "src", attachment.url );
            })
        }); 
});