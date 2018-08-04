<?php
$icon = $this->getOption('Image');
$link = $this->getOption('Link');
$background = $this->getOption('BannerColor');
$btn_color = $this->getOption('ButtonsColor');
$messages = $this->getOption('MessagesData');
?>

<div id="vk-cookies-wrapper" class="vk-cookies-wrapper" <?php if($background) echo 'style="background: '.$background.'"'; ?> >
    <div class="vk-cookies-content">
        
        <?php if($icon): ?>
        <img class="vk-cookies-icon" src="<?php echo $icon; ?>">
        <?php endif; ?>
        
        <?php echo $messages['default']; ?>
        
    </div>
    
    <?php if($link): ?>
    <p class="vk-cookies-lnk-wrapper"><a href="<?php echo $link; ?>" target="_blank">Full version of terms and conditions of the cookies usage</a></p>
    <?php endif; ?>
    
    <div class="vk-cookies-buttons-wrapper">
        <button id="vk-cookies-button-close" class="vk-cookies-button-close" <?php if($background) echo 'style="background: '.$btn_color.'"'; ?> >Close</button>
        <button id="vk-cookies-button-accept" class="vk-cookies-button-accept" <?php if($background) echo 'style="background: '.$btn_color.'"'; ?> >Accept</button>
    </div>
</div>