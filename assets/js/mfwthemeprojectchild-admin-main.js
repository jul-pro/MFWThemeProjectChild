( function( $ ) {
    $(function() {
       $( '#guest_book_shortcode_button' ).click(function( e ) {
           insertShortcode('[mfwthemeprojectchild_guest_book]');
       } );
    });
    
    function insertShortcode(shortcodes) {
        if(typeof tinyMCE  != "undefined"){
            if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
                if(QTags.insertContent(shortcodes) != true)
                    $('#content').value += shortcodes;
            } else if(tinyMCE && tinyMCE.activeEditor) {
                tinyMCE.activeEditor.selection.setContent(shortcodes);
            }
        } else{
            $('#description').value += shortcodes;
            ('#tag-description').value += shortcodes;
        }
    }
    
} )( jQuery );