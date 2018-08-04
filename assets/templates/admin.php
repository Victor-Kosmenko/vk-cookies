<?php defined('ABSPATH') or die('No script kiddies please!'); ?>

<script>
    var vk_cookies_messages_data = <?php echo $this->getJSONMessagesData(); ?>;
</script>

<div class="vk_cookies_admin_wrapper wrap">
    <h2><?php _e('VK Cookies Settings', 'vk_cookies'); ?></h2>

    <form method="post" action="">
        
        <?php settings_fields($settingsGroup); ?>

        <table class="plugin-options-table">
            <tbody>
                <?php
                if ($optionMetaData != null) {
                    foreach ($optionMetaData as $OptionKey => $OptionMeta) {
                        
                        if($OptionKey == 'MessagesData') continue;
                        
                        foreach ($OptionMeta as $OptionMetaTitle => $OptionMetaType) {
                            ?>
                                <tr valign="top">
                                    <th scope="row">
                                        <p><label for="<?php echo $OptionKey ?>"><?php echo $OptionMetaTitle; ?></label></p>
                                        <?php if($OptionKey === "Message"): ?>
                                        <select id="vk_cookies_country_select">
                                            <option value="default" selected>Default</option>
                                            <?php foreach ($this->getCountriesArray() as $key => $value): ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php endif; ?>
                                    </th>
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
