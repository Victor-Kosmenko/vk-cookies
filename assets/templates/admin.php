<?php
defined('ABSPATH') or die('No script kiddies please!');

echo '<pre>'; var_dump($optionMetaData); echo '</pre>';
?>

<div class="vk_cookies_admin_wrapper wrap">
    <h2><?php _e('VK Cookies Settings', 'vk_cookies'); ?></h2>

    <form method="post" action="">
        
        <?php settings_fields($settingsGroup); ?>

        <table class="plugin-options-table">
            <tbody>
                <?php
                if ($optionMetaData != null) {
                    foreach ($optionMetaData as $OptionKey => $OptionMeta) {
                        foreach ($OptionMeta as $OptionMetaTitle => $OptionMetaType) {
                            ?>
                                <tr valign="top">
                                    <th scope="row"><p><label for="<?php echo $OptionKey ?>"><?php echo $OptionMetaTitle; ?></label></p></th>
                                    <td><?php $this->createCustomFormControl($OptionKey, $OptionMetaType, $this->getOption($OptionKey)); ?></td>
                                </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'vk_cookies') ?>"/>
        </p>
        
    </form>
    
</div>
