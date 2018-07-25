<?php
defined('ABSPATH') or die('No script kiddies please!');

echo '<pre>'; var_dump($optionMetaData); echo '</pre>';
?>

<div class="vk_cookies_admin_wrapper">
    <h2><?php _e('VK Cookies Settings', 'vk_cookies'); ?></h2>

    <form method="post" action="">
<?php settings_fields($settingsGroup); ?>

        <table class="plugin-options-table">
            <tbody>
                <?php
                if ($optionMetaData != null) {
                    foreach ($optionMetaData as $aOptionKey => $aOptionMeta) {
                        $displayText = is_array($aOptionMeta) ? $aOptionMeta[0] : $aOptionMeta;
                        ?>
                        <tr valign="top">
                            <th scope="row"><p><label for="<?php echo $aOptionKey ?>"><?php echo $displayText ?></label></p></th>
                    <td>
                    <?php $this->createFormControl($aOptionKey, $aOptionMeta, $this->getOption($aOptionKey)); ?>
                    </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" class="button-primary"
                   value="<?php _e('Save Changes', 'vk_cookies') ?>"/>
        </p>
    </form>
</div>
