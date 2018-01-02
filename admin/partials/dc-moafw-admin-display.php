<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.3.0
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1><?php _e( 'Minimum Order Amount for Woocommerce', 'dc-moafw' ); ?></h1>
<form method="post" action="options.php">
    <!--necessaria per il corretto aggiornamento dei dati-->
    <?php settings_fields('dc_moafw_options_group'); ?>
    <?php settings_errors(); ?>
    <h2><?php _e( 'Configuration', 'dc-moafw' ); ?></h2>
    <table class="form-table">
       <tbody>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_activate"><?php _e( 'Enable / Disable', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <label for="dc_moafw_activate">
                      <input type="checkbox" id="dc_moafw_activate" value="1" <?php checked(get_option('dc_moafw_activate'), 1); ?> name="dc_moafw_activate"> <?php _e( 'Activate Options', 'dc-moafw' ); ?>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_minimum"><?php _e( 'Minimum Order', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <label for="dc_moafw_minimum">
                  	  <input type="text" id="dc_moafw_minimum" value="<?php echo get_option('dc_moafw_minimum'); ?>" name="dc_moafw_minimum" pattern="[0-9]+[.]?([0-9])*" class="regular-text">
                    <p class="description"><?php _e( 'The minimum amount with which you can place your order.', 'dc-moafw' ); ?></p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_message"><?php _e( 'Message', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <label for="dc_moafw_message">
                      <textarea id="dc_moafw_message" name="dc_moafw_message" class="large-text" cols="50" rows="5"><?php echo get_option('dc_moafw_message'); ?>
                      </textarea>
                      <p class="description"><?php _e( 'The notice message that appears if the minimum amount is not reached. Insert [minimum] in the position where you want to show the minimum value in the message.', 'dc-moafw' ); ?></p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_current_total_text"><?php _e( 'Current Total Text', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <label for="dc_moafw_current_total_text">
                      <input type="text" id="dc_moafw_current_total_text" value="<?php echo get_option('dc_moafw_current_total_text'); ?>" name="dc_moafw_current_total_text" class="regular-text">
                      <p class="description"><?php _e( 'The text of the current cart total. Insert [current] in the position where you want to show the current cart total.', 'dc-moafw' ); ?></p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_currency_display_type"><?php _e( 'Currency Display Type', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <select id="dc_moafw_currency_display_type" name="dc_moafw_currency_display_type">
                      <option value="symbol" <?php echo selected(get_option('dc_moafw_currency_display_type'), "symbol"); ?>><?php _e('Symbol', 'dc-moafw'); ?></option>
                      <option value="text" <?php echo selected(get_option('dc_moafw_currency_display_type'), "text"); ?>><?php _e('Text', 'dc-moafw'); ?></option>
                  </select>
                  <p class="description"><?php _e( 'The way the currency appears in the notification message (i.e. "&euro;" if is "symbol", "EUR" if is "text").', 'dc-moafw' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="dc_moafw_message_shop"><?php _e( 'Show message in the shop', 'dc-moafw' ); ?></label>
                </th>
                <td>
                  <label for="dc_moafw_message_shop">
                      <input type="checkbox" id="dc_moafw_message_shop" value="1" <?php checked(get_option('dc_moafw_message_shop'), 1); ?> name="dc_moafw_message_shop"> <?php _e( 'Enable', 'dc-moafw' ); ?>
                      <p class="description"><?php _e( 'Enable this option to show the notification message also in the shop pages. (Note: the message will not be displayed if the cart is empty)', 'dc-moafw' ); ?></p>
                  </label>
                </td>
            </tr>
            <tr valign="top">
               <th scope="row"></th>
               <td>
                   <p>
                       <?php submit_button(); ?>
                   </p>
               </td>
            </tr>
        </tbody>
   </table> 
</form>