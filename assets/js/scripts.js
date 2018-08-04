jQuery(function ($) {
    $(document).ready(function () {

        console.log('Ready');
        
        // Image uploader
        $.wpMediaUploader({

            target : '.vk-cookies-img-uploader', // The class wrapping the textbox
            uploaderTitle : 'Select or upload image', // The title of the media upload popup
            uploaderButton : 'Set image', // the text of the button in the media upload popup
            multiple : false, // Allow the user to select multiple images
            buttonText : 'Upload image', // The text of the upload button
            buttonClass : '.page-title-action', // the class of the upload button
            previewSize : '150px', // The preview image size
            modal : false, // is the upload button within a bootstrap modal ?
            buttonStyle : { // style the button
                               
            },

        });
        
        
        // Color picker
        $('.color-picker').wpColorPicker();


        // Country select functionality (messages update)
        $('#vk_cookies_country_select').change(function(){
            
            var MessageEditor =  tinyMCE.get('Message');
            
            if(vk_cookies_messages_data[$(this).val()]){
                $('#Message').attr('name', 'MessagesData['+ $(this).val() +']').html(vk_cookies_messages_data[$(this).val()]);
                MessageEditor.setContent(vk_cookies_messages_data[$(this).val()]);
            }
            else{
                $('#Message').attr('name', 'MessagesData['+ $(this).val() +']').html('');
                MessageEditor.setContent('');
            }
            
        });


    });
});
