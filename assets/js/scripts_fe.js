jQuery(function ($) {
    $(document).ready(function () {

        console.log('FE Ready');
        
        // Show popup cookies message if needed
        var ShowVKCookiesMessage = localStorage.getItem("show-vk-cookies-message");
        if(ShowVKCookiesMessage !== 'false'){
            $('#vk-cookies-wrapper').show();
        }
        
        // Cookies message buttons click
        $('#vk-cookies-button-close, #vk-cookies-button-accept').click(function(){
            localStorage.setItem('show-vk-cookies-message', false);
            $('#vk-cookies-wrapper').hide();
        });
        
    });
});
