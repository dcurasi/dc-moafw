=== Minimum Order Amount for Woocommerce ===

Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KZRGHFSGGRXU6
Contributors: dcurasi
Tags: woocommerce, order, woocommerce order, minimum order, woocommerce minimum order, shop, cart, woocommerce cart, product, products, minimum order amount, amount, minimum amount
Requires at least: 3.2.0
Tested up to: 4.9.8
Stable tag: 1.5.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Minimum Order Amount for Woocommerce allows you to set easily and fast a minimum amount for the woocommerce orders.


== Description ==

Minimum Order Amount for Woocommerce allows you to set easily and fast a minimum amount for the woocommerce orders. Moreover, it is possible to set the notification message in the case in which the minimum amount is not reached. It is based on the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) and it is compatible with Woocommerce 2.1+, Polylang and WooCommerce Price Based on Country.


= Available Languages =

* English
* Italiano
* Polish
* French


= If you like the plugin, please give it a rating. =
If you have a feature request, let me know, they're always welcome!


== Installation ==

1. Unzip the downloaded zip file.
2. Upload `minimum-order-amount-for-woocommerce` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the \'Plugins\' menu in WordPress
4. Go to Woocommerce > Minimum Order for change the default options


== Frequently Asked Questions ==

= Can I contribute to the project? =

If you want to contribute to the project please contact me (curasi.d87@gmail.com).
This is the GitHub Repository [dc-moafw](https://github.com/dcurasi/dc-moafw).


== Screenshots ==

1. The admin panel


== Changelog ==

= 1.5.0 - 02/11/18 =
* New - Added compatibility with Polylang Pro, thanks to King Lui
* New - Added French translation, thanks to Steven Ray
* Fix - Fixex Polish translation, thanks to Steven Ray

= 1.4.0 - 04/03/18 =
* Fix - Now if the cart is empty, the minimum order notification is not shown
* New - Now the decimal and thousands separators are displayed as woocommerce settings
* New - Now the number of decimals in the price is the same as the woocommerce settings
* New - Now the currency position in the price is set as in the woocommerce settings

= 1.3.1 - 03/01/18 =
* Fix - Fix the fatal error on the cart page (if WCPBC_Customer class does not exist)

= 1.3.0 - 02/01/18 =
* New - Added the ability to choose how to display the currency
* Fix - Now the options are deleted when the plugin is uninstalled and not when the plugin is deactivate
* Fix - The cart total and the minimum order were formatted with two decimal places
* Dev - The function for set the minimum order has been restructured
* Dev - Update translations

= 1.2.0 - 12/03/17 =
* New - Added compatibility with WooCommerce Price Based on Country
* New - Added option for display notice message in the shop pages
* Dev - Removed the inclusion of css and js files not needed
* Fix - Fix the name and the group of strings registered in Polylang
* Dev - Update translations

= 1.1.1 - 21/01/17 =
* New - Added Polish translation, thanks to Jerzy Afanasjew

= 1.1.0 - 07/01/17 =
* New - Added compatibility with Polylang
* New - Added Italian translation
* Dev - Edit submit button of the admin panel for translations
* Fix - Fix Current Total Text
* Dev - Added donation link

= 1.0 =
* Initial public version