<?php
defined('ABSPATH') or die('No script kiddies please!');
?>

<div class="wrap">
    <h2><?php /* echo $this->getPluginDisplayName(); echo ' '; */ _e('VK Cookies Settings', 'vk_cookies'); ?></h2>

    <form method="post" action="">
        <?php settings_fields($settingsGroup); ?>
        <style type="text/css">
            table.plugin-options-table {width: 100%; padding: 0;}
            table.plugin-options-table tr:nth-child(even) {background: #f9f9f9}
            table.plugin-options-table tr:nth-child(odd) {background: #FFF}
            table.plugin-options-table tr:first-child {width: 35%;}
            table.plugin-options-table td {vertical-align: middle;}
            table.plugin-options-table td+td {width: auto}
            table.plugin-options-table td > p {margin-top: 0; margin-bottom: 0;}
        </style>
        <table class="plugin-options-table"><tbody>
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
            </tbody></table>
        <p class="submit">
            <input type="submit" class="button-primary"
                   value="<?php _e('Save Changes', 'vk_cookies') ?>"/>
        </p>
    </form>
</div>
