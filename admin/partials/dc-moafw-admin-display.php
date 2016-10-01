<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Cookie_Notice_Bar
 * @subpackage Dc_Cookie_Notice_Bar/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Minimum Order Amount for Woocommerce</h1>
<form method="post" action="options.php">
    <!--necessaria per il corretto aggiornamento dei dati-->
    <?php settings_fields('dc_moafw_options_group'); ?>
    <?php settings_errors(); ?>
    <h2>Configuration</h2>
    <table class="form-table">
       <tbody>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_activate">Enable / Disable</label>
                </th>
                <td>
                  <label for="dc_moafw_activate">
                      <input type="checkbox" id="dc_moafw_activate" value="1" <?php checked(get_option('dc_moafw_activate'), 1); ?> name="dc_moafw_activate"> Activate Options
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_minimum">Minimum Order</label>
                </th>
                <td>
                  <label for="dc_moafw_minimum">
                  	  <input type="text" id="dc_moafw_minimum" value="<?php echo get_option('dc_moafw_minimum'); ?>" name="dc_moafw_minimum" pattern="[0-9]+[.]?([0-9])*" class="regular-text">
                    <p class="description">The minimum amount with which you can place your order.</p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_message">Message</label>
                </th>
                <td>
                  <label for="dc_moafw_message">
                      <textarea id="dc_moafw_message" name="dc_moafw_message" class="large-text" cols="50" rows="5"><?php echo get_option('dc_moafw_message'); ?>
                      </textarea>
                      <p class="description">The notice message that appears if the minimum amount is not reached. Insert [minimum] in the position where you want to show the minimum value in the message.</p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_current_total_text">Minimum Order</label>
                </th>
                <td>
                  <label for="dc_moafw_current_total_text">
                      <input type="text" id="dc_moafw_current_total_text" value="<?php echo get_option('dc_moafw_current_total_text'); ?>" name="dc_moafw_current_total_text" class="regular-text">
                    <p class="description">The text of the current cart total. Insert [current] in the position where you want to show the current cart total.</p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
               <th scope="row"></th>
               <td>
                   <p>
                       <input type="submit" class="button-primary save-options" id="submit" name="submit" value="Save options">
                   </p>
               </td>
            </tr>
        </tbody>
   </table> 
</form>