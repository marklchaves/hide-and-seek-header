<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="hide-and-seek-header_options" action="options.php">
        <?php
        // Grab all options
        $options = get_option($this->plugin_name);

        $breakpoint_opts =
            (empty($options['breakpoint'])) ? 0 : 1;

        $animation_opts =
            (empty($options['animation'])) ? 0 : 1;

        $landing_opts =
            (empty($options['landing'])) ? 0 : 1;

        $sensitivity_opts =
            (empty($options['sensitivity'])) ? 0 : 1;

        ?>
        <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>

        <!-- Checkbox Fields for the Hide and Seek Header -->

        <fieldset>
            <legend class="screen-reader-text">
                <span>Responsive Setting</span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-breakpoint">
                <span>
                    <?php esc_attr_e('Disable on mobile', $this->plugin_name); ?>
                </span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-breakpoint" name="<?php echo $this->plugin_name; ?>[breakpoint]" value="1" <?php checked($breakpoint_opts, 1); ?>/>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text">
                <span>Animation Setting</span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-animation">
                <span>
                    <?php esc_attr_e('Enable animation', $this->plugin_name); ?>
                </span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-animation" name="<?php echo $this->plugin_name; ?>[animation]" value="1" <?php checked($animation_opts, 1); ?>/>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text">
                <span>Landing Setting</span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-landing">
                <span>
                    <?php esc_attr_e('Landing page mode', $this->plugin_name); ?>
                </span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-landing" name="<?php echo $this->plugin_name; ?>[landing]" value="1" <?php checked($landing_opts, 1); ?>/>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text">
                <span>Scroll-up Sensitivity Setting</span>
                <p class="hide-and-see-header-subheading">(check for lower sensitivity)</p>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-sensitivity">
                <span>
                    <?php esc_attr_e('Scroll-up Sensitivity', $this->plugin_name); ?>
                </span>
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-sensitivity" name="<?php echo $this->plugin_name; ?>[sensitivity]" value="1" <?php checked($sensitivity_opts, 1); ?>/>
                <span class="hide-and-see-header-subheading">
                    <?php esc_attr_e('(lowers the scroll-up sensitivity)',
                    $this->plugin_name); ?>
                </span>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

    </form>

</div>