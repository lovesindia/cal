<?php
// financial-calculators.com savings calculator plugin
//
// Copyright (c) 2021 financial-calculators.com
// https://financial-calculators.com
//
// This is an add-on for WordPress
// http://wordpress.org/
//
// **********************************************************************
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// The copyright and this notice must remain intact with any derivations
// of this plugin.
// **********************************************************************
/*
Plugin Name: FC Savings Calculator
Plugin URI: https://financial-calculators.com/calculator-plugins/savings-calculator-plugin
Description: A responsive savings calculator with cumulative schedule and charts. Rebrand with your brand name. Supports multiple currency and date conventions.
Version: 1.4.4
Author: financial-calculators.com
Author URI: https://financial-calculators.com
License: GPL2
*/

// [KT] 02/05/2020 - added options for website owner to set default currency and date mask 

/*
	Prefixes:
	fc or fc_ : financial calculators
	op_ : option, set via plugin's admin panel or passed in options object
	sc_ : a shortcode parameter

	Function call:
	<?php show_fcsavings_plugin(<option array>); ?>

Option array:
array('op_size' => "large",
'op_custom_style' => "No",
'op_add_link' => "No",
'op_brand_name' => "",
'op_hide_resize' => "No",
'op_save_amt' => "950.0",
'op_n_months' => "180",
'op_rate' => "5.5",
// [KT] 02/05/2020 - new options below
'op_currency' => "0",
'op_date_mask' => "0")

Shortcode - all options:
[fcsavingsplugin sc_size="medium" sc_custom_style="No" sc_add_link="No" sc_brand_name="" sc_hide_resize="No" sc_save_amt="1200.0" sc_n_months="240" sc_rate="5.5", sc_currency="999", sc_date_mask="999"]

Function call:
<?php show_fcsavings_plugin(<option array>); ?>

*/


/* Function: activate_fcsavings_plugin
** activation hook
** Initializes the options in the WordPress database when
** plugin is activated
**
** args: none
** returns: nothing
*/
function activate_fcsavings_plugin() {

/* activation code here */
/* as options are added to widget, this array must be updated to update db */
update_option('fcsavingscalc_plugin', array(
'op_size' => null,
'op_custom_style' => "No",
'op_add_link' => "No",
'op_brand_name' => "",
'op_hide_resize' => "No",
'op_save_amt' => "1200.0",
'op_n_months' => "240",
'op_rate' => "5.5",
'op_currency' => "999",
'op_date_mask' => "999"
));

}
register_activation_hook( __FILE__, 'activate_fcsavings_plugin' );


/* Function: show_fcsavings_widget
** Shows the plugin in a WordPress widget area / sidebar
**
** args: $args (environment variables handled automatically by the hook)
** returns: nothing
*/
function show_fcsavings_widget( $args ) {
extract( $args );
$options = get_option( 'fcsavingscalc_plugin' );
$title = null;

//production
echo $before_widget;
echo $before_title . $title . $after_title;

show_fcsavings_plugin($options);

echo $after_widget;

} // show_fcsavings_widget



/* Function: show_fcsavings_plugin
** Show the plugin's GUI, not in sidebar
**
** args: $options
** returns: nothing
*/
function show_fcsavings_plugin($options = array(), $content = null, $code = "") {

$shortcode = null; // The actual shortcode : fcsavingsplugin

$language = "en";

$WL_DIR_PREFIX = $language."/";

$size = null; // tiny, small, medium, null default large
$custom_style = null;
$add_link = null;
$brand_name = null;
$hide_resize = null;


$WL_DIR_PREFIX = $language."/";


// array_key_exists (0, $options) true only if shortcode is used
if (!empty($code) || (!empty($options) && array_key_exists (0, $options) && (strtolower($options[0]) == 'fcsavingsplugin'))){
$shortcode = true;

//[fcsavingsplugin sc_size="medium" sc_custom_style="No" sc_add_link="No" sc_brand_name="" sc_hide_resize="No" sc_save_amt="1050.0" sc_n_months="360" sc_rate="5.5", sc_currency="999", sc_date_mask="999"]
extract( shortcode_atts( array(
'sc_size' => null,
'sc_custom_style' => "No",
'sc_add_link' => "No",
'sc_brand_name' => "",
'sc_hide_resize' => "No",
'sc_save_amt' => "1050.0",
'sc_n_months' => "120",
'sc_rate' => "5.5",
'sc_currency' => "0",
'sc_date_mask' => "0"
), $options ) );

$size = $sc_size;
$custom_style = $sc_custom_style;
$add_link = $sc_add_link;
$brand_name = $sc_brand_name;
$hide_resize = $sc_hide_resize;
$save_amt= $sc_save_amt;
$n_months = $sc_n_months;
$rate = $sc_rate;
// [KT] 02/05/2020
$currency = $sc_currency;
$date_mask = $sc_date_mask;

if (!is_numeric($save_amt)) {
$save_amt= '0';
echo('Please enter a valid number for "sc_save_amt".'."<br>");
}
if (!is_numeric($n_months)) {
$n_months = '0';
echo('Please enter a valid number for "sc_n_months".'."<br>");
}
if (!is_numeric($rate)) {
$rate = '0';
echo('Please enter a valid number for "sc_rate".'."<br>");
}
// [KT] 02/05/2020 - added validation checks for new options
if (!is_numeric($currency)) {
$currency = '999';
}
if (!is_numeric($date_mask)) {
$date_mask = '999';
}
// [KT] - end change

if (strtolower($add_link) != 'yes') {
$brand_name = '';
}



} else {
$shortcode = false;

// process any optional parameters that may have been passed in
$size = empty( $options["op_size"] ) ? null : strip_tags(stripslashes($options["op_size"]));
$custom_style = empty( $options['op_custom_style'] ) ? null : strip_tags(stripslashes($options['op_custom_style']));
$hide_resize = empty( $options['op_hide_resize'] ) ? null : strip_tags(stripslashes($options['op_hide_resize']));
$add_link = empty( $options['op_add_link'] ) ? null : strip_tags(stripslashes($options['op_add_link']));
$brand_name = empty( $options['op_brand_name'] ) ? null : strip_tags(stripslashes($options['op_brand_name']));
$brand_name = preg_replace("/[^\w#&'\-,. ]/", '', $brand_name);
$save_amt= empty( $options['op_save_amt'] ) ? null : strip_tags(stripslashes($options['op_save_amt']));
$n_months = empty( $options['op_n_months'] ) ? null : strip_tags(stripslashes($options['op_n_months']));
$rate = empty( $options['op_rate'] ) ? null : strip_tags(stripslashes($options['op_rate']));
// [KT] 02/05/2020
$currency = empty( $options['op_currency'] ) ? null : strip_tags(stripslashes($options['op_currency']));
$date_mask = empty( $options['op_date_mask'] ) ? null : strip_tags(stripslashes($options['op_date_mask']));

// pickup plugin's stored settings and use only if not a function parameter
$options = get_option( 'fcsavingscalc_plugin' );

if ($size == null) {
$size = empty( $options["op_size"] ) ? 'large' : $options["op_size"];
}
if ($custom_style == null) {
$custom_style = empty( $options['op_custom_style'] ) ? __('No') : $options['op_custom_style'];
}
if ($hide_resize == null) {
$hide_resize = empty( $options['op_hide_resize'] ) ? __('No') : $options['op_hide_resize'];
}
if ($add_link == null) {
$add_link = empty( $options['op_add_link'] ) ? __('No') : $options['op_add_link'];
}
if ($brand_name == null) {
$brand_name = empty( $options['op_brand_name'] ) ? null : $options['op_brand_name'];
}
if ($save_amt== null) {
$save_amt= empty( $options['op_save_amt'] ) ? '32500.0' : $options['op_save_amt'];
}
if ($n_months == null) {
$n_months = empty( $options['op_n_months'] ) ? '48' : $options['op_n_months'];
}
if ($rate == null) {
$rate = empty( $options['op_rate'] ) ? '5.5' : $options['op_rate'];
}
if (!is_numeric($save_amt)) {
$save_amt= '0';
echo('Please enter a valid number for "op_save_amt".'."<br>");
}
if (!is_numeric($n_months)) {
$n_months = '0';
echo('Please enter a valid number for "op_n_months".'."<br>");
}
if (!is_numeric($rate)) {
$rate = '0';
echo('Please enter a valid number for "op_rate".'."<br>");
}
if (strtolower($add_link) != 'yes') {
$brand_name = '';
}
// [KT] 02/05/2020 - checks added
if ($currency == null) {
$currency = empty( $options['op_currency'] ) ? '999' : $options['op_currency'];
}
if ($date_mask == null) {
$date_mask = empty( $options['op_date_mask'] ) ? '999' : $options['op_date_mask'];
}

//echo "<br>" . "not a shortcode";
//echo "$size " . $size . "<br>";
//echo $custom_style . "<br>";
//echo $add_link . "<br>";
//echo $brand_name . "<br>";
//echo $hide_resize . "<br>";
//echo $save_amt. "<br>";
//echo $n_months . "<br>";
//echo $rate . "<br>";

} // $shortcode = false;


//
// REGISTER STYLES
//


// wp_register_style( 'fc-reboot', plugins_url('css/fc-reboot.min.css', __FILE__), array(), false, 'all' );
wp_register_style( 'fc-featherlight', plugins_url('css/featherlight.min.css', __FILE__), array(), false, 'screen' );

wp_register_style( 'fincalcs-style', plugins_url('css/fin-calc-widgets.min.css', __FILE__), array(), false, 'screen' );

if (strtolower($custom_style) === 'yes') {
wp_register_style( 'fincalcs-custom-style', plugins_url('css/fin-calc-widgets-custom.css', __FILE__), array(), false, 'screen' );
}


wp_register_style( 'fc-printer-style', plugins_url('css/printer.widget.min.css', __FILE__), array(), false, 'print');


// wp_enqueue_style( 'fc-reboot' );
wp_enqueue_style( 'fc-featherlight' );
wp_enqueue_style( 'fc-printer-style' );
wp_enqueue_style( 'fincalcs-style' );


// load a custom stylesheet so defaults can be easily overridden
if (strtolower($custom_style) === 'yes') {
wp_enqueue_style( 'fincalcs-custom-style' );
}


if($shortcode) ob_start();


// displays the widget
include($WL_DIR_PREFIX."calculator.gui.php");



//
// REGISTER SCRIPTS
//

// is jQuery enqueued?
if (!wp_script_is( 'jquery')) {
wp_enqueue_script( 'jquery' );
}

// register supporting JavaScript libraries and Bootstrap
wp_register_script('fc-supporting', plugins_url('js/supporting.WIDGETS.min.js', __FILE__), array('jquery'), '', true);
wp_register_script('fc-custom-bootstrap', plugins_url('js/bootstrap.custom.min.js', __FILE__), array( 'jquery' ), '', true);
// load the JavaScript math library
wp_register_script('fc-savings-interface', plugins_url('js/interface.SAVINGS-WIDGET.min.js', __FILE__), array( 'jquery', 'fc-custom-bootstrap', 'fc-supporting'), '', true);



wp_enqueue_script( 'fc-savings-interface' );

if($shortcode){
$result = ob_get_contents();
ob_end_clean();
if(is_null($content)){
return $result;
} else {
return $content . $result;
}
}

} // show_fcsavings_plugin



/* Function: fcsavingsplugin_options
**
** Show/process options on the Wordpress admin's widget page
**
** args: nothing
** returns: nothing
*/
function fcsavingsplugin_options() {

// financial-calculators.com savings calculator widget options
$options = $newoptions = get_option('fcsavingscalc_plugin');

// [KT] 02/05/2020 - updated for 2 new parameters op_currency, op_date_mask
// in event admin updated plugin but did not deactivate / activate, pickup possible new options
if (!array_key_exists('op_size', $options) || !array_key_exists('op_custom_style', $options) || !array_key_exists('op_add_link', $options) || !array_key_exists('op_brand_name', $options) || !array_key_exists('op_hide_resize', $options) || !array_key_exists('op_save_amt', $options) || !array_key_exists('op_n_months', $options) || !array_key_exists('op_rate', $options) || !array_key_exists('op_currency', $options) || !array_key_exists('op_date_mask', $options)) {
// echo('Updated options'. implode(" ", $options));
update_option('fcsavingscalc_plugin', array(
'op_size' => null,
'op_custom_style' => "No",
'op_add_link' => "No",
'op_brand_name' => "",
'op_hide_resize' => "No",
'op_save_amt' => "1200.0",
'op_n_months' => "240",
'op_rate' => "5.5",
'op_currency' => '999',
'op_date_mask' => '999'
));
$options = $newoptions = get_option('fcsavingscalc_plugin'); // keep everything in sync
}


// if widget's options have previously been set/saved in current session
if (!empty($_POST['fcsavingscalc_opts'])) {
$newoptions['op_size'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_size']));
if (strtolower($newoptions['op_size']) != 'tiny' && strtolower($newoptions['op_size']) != 'small' && strtolower($newoptions['op_size']) != 'medium') {
$newoptions['op_size'] = 'large';
}
$newoptions['op_custom_style'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_custom_style']));
if (strtolower($newoptions['op_custom_style']) != 'yes') {
$newoptions['op_custom_style'] = 'No';
}
$newoptions['op_add_link'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_add_link']));
if (strtolower($newoptions['op_add_link']) != 'yes') {
$newoptions['op_add_link'] = 'no';
}
// allow word characters, numbers, ampersand, dash, apostrophe, space and number sign
$newoptions['op_brand_name'] = preg_replace("/[^\w#&'\-,. ]/", '', $_POST['fcsavingscalc-op_brand_name']);
if (strtolower($newoptions['op_add_link']) != 'yes') {
$newoptions['op_brand_name'] = '';
}
$newoptions['op_hide_resize'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_hide_resize']));
if (strtolower($newoptions['op_hide_resize']) != 'yes') {
$newoptions['op_hide_resize'] = 'no';
}
$newoptions['op_save_amt'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_save_amt']));
$newoptions['op_n_months'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_n_months']));
$newoptions['op_rate'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_rate']));
// [KT] 02/05/2020 - new options
$newoptions['op_currency'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_currency']));
$newoptions['op_date_mask'] = strip_tags(stripslashes($_POST['fcsavingscalc-op_date_mask']));

//////////ctype_digit
//echo(is_numeric($newoptions['op_save_amt']));
//echo(is_numeric($newoptions['op_n_months']));
//echo(is_numeric($newoptions['op_rate']));
if (!is_numeric($newoptions['op_save_amt'])) {
$newoptions['op_save_amt'] = '0';
echo('Please enter a valid number for "Default savings amount".'."<br>");
}
if (!is_numeric($newoptions['op_n_months'])) {
$newoptions['op_n_months'] = '0';
echo('Please enter a valid number for "Default number of months:".'."<br>");
}
if (!is_numeric($newoptions['op_rate'])) {
$newoptions['op_rate'] = '0';
echo('Please enter a valid number for "Default interest rate".'."<br>");
}
// [KT] 02/05/2020 - new options
if (!is_numeric($newoptions['op_currency'])) {
$newoptions['op_currency'] = '999';
echo('Please enter a valid value for "Default Currency".'."<br>");
}
if (!is_numeric($newoptions['op_date_mask'])) {
$newoptions['op_date_mask'] = '999';
echo('Please enter a valid number for "Default Default Date Format".'."<br>");
}

}
//debug
//else {
// echo('Options not yet posted.');
//}


// 1st check if options changed and if valid session
if ( $options != $newoptions && (wp_verify_nonce($_POST['fcsavingscalc_opts'], 'fc_options'))) {
// 2nd check permissions
if ( is_user_logged_in() && current_user_can('update_plugins') ) {
$options = $newoptions;
update_option('fcsavingscalc_plugin', $options);
}
//debug
//else if (array_key_exists('fcsavingscalc_opts', $_POST) && (!wp_verify_nonce($_POST['fcsavingscalc_opts'], 'fc_options'))) {
// echo ('Update failed. Session expired. Please log in again.');
//}
}

$brand_name = esc_attr($options['op_brand_name']);
$save_amt = esc_attr($options['op_save_amt']);
$n_months = esc_attr($options['op_n_months']);
$rate = esc_attr($options['op_rate']);
// [KT] 02/05/2020
$currency = esc_attr($options['op_currency']);
$date_mask = esc_attr($options['op_date_mask']);

//echo empty( $options['op_size']) . "<br>";
//echo empty( $options['op_custom_style']) . "<br>";
//echo empty( $options['op_add_link']) . "<br>";
//echo empty( $options['op_brand_name']) . "<br>";
//
//echo $options['op_size'] . "<br>";
//echo $options['op_custom_style'] . "<br>";
//echo $options['op_add_link'] . "<br>";
//echo $options['op_brand_name'] . "<br>";

?>

<!--HTML for widget's option page in WordPress' admin panel-->
<p>
	<label for="fcsavingscalc-op_size"><?php _e( 'Widget\'s size?:' ); ?>
		<select name="fcsavingscalc-op_size" id="fcsavingscalc-op_size" class="widefat">
			<option value="tiny" <?php selected( $options['op_size'], 'tiny' ); ?>><?php _e('Tiny (max width = 150px)'); ?></option>
			<option value="small" <?php selected( $options['op_size'], 'small' ); ?>><?php _e('Small (max width = 290px)'); ?></option>
			<option value="medium" <?php selected( $options['op_size'], 'medium' ); ?>><?php _e('Medium (max width = 340px)'); ?></option>
			<option value="large" <?php selected( $options['op_size'], 'large' ); ?>><?php _e('Large (max width = 440px)'); ?></option>
		</select>
	</label>
</p>

<p>
	<label for="fcsavingscalc-op_custom_style"><?php _e( 'Load custom style sheet?:' ); ?>
		<select name="fcsavingscalc-op_custom_style" id="fcsavingscalc-op_custom_style" class="widefat">
			<option value="No" <?php selected( $options['op_custom_style'], 'No' ); ?>><?php _e('No'); ?></option>
			<option value="Yes" <?php selected( $options['op_custom_style'], 'Yes' ); ?>><?php _e('Yes'); ?></option>
		</select>
	</label>
</p>
<p>
	If &quot;Yes&quot; loads &lt;site&gt;\wp-content\plugins\fc-savings-calculator\css\fin-calc-widgets-custom.css. Entries in <b>fin-calc-widgets-custom.css</b> modify the widget's look. Editing the provided custom stylesheet is the best way to change colors.
</p>

<!--[KT] 02/05/2020 new options-->
<p>
	<!--select default currency-->
	<label for="fcsavingscalc-op_currency"><?php _e( 'Set a default currency?:' ); ?>
		<select name="fcsavingscalc-op_currency" id="fcsavingscalc-op_currency" class="widefat">
			<option value="999" <?php selected($options['op_currency'], '999'); ?>><?php _e('Use visitor\'s browser\'s settings to set currency - do not override.'); ?></option>
			<option value="59" <?php selected($options['op_currency'], '59'); ?>><?php _e('Albania&nbsp;&nbsp;&nbsp;&nbsp;(Lek)&nbsp;&nbsp;&nbsp;&nbsp;Lek12,345,678.99'); ?></option>
			<option value="90" <?php selected($options['op_currency'], '90'); ?>><?php _e('Algeria&nbsp;&nbsp;&nbsp;&nbsp;(Algerian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;DZD12,345,678.99'); ?></option>
			<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php _e('Argentina&nbsp;&nbsp;&nbsp;&nbsp;(Argentine Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
			<option value="88" <?php selected($options['op_currency'], '88'); ?>><?php _e('Armenia&nbsp;&nbsp;&nbsp;&nbsp;(Armenian Dram)&nbsp;&nbsp;&nbsp;&nbsp;AMD12,345,678.99'); ?></option>
			<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php _e('Australia&nbsp;&nbsp;&nbsp;&nbsp;(Australian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="43" <?php selected($options['op_currency'], '43'); ?>><?php _e('Austria&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
			<option value="84" <?php selected($options['op_currency'], '84'); ?>><?php _e('Azerbaijan&nbsp;&nbsp;&nbsp;&nbsp;(Manat)&nbsp;&nbsp;&nbsp;&nbsp;₼12,345,678.99'); ?></option>
			<option value="89" <?php selected($options['op_currency'], '89'); ?>><?php _e('Bahrain&nbsp;&nbsp;&nbsp;&nbsp;(Bahraini Dinar)&nbsp;&nbsp;&nbsp;&nbsp;BHD12,345,678.994'); ?></option>
			<option value="54" <?php selected($options['op_currency'], '54'); ?>><?php _e('Belarus&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;Br12,345,678.99'); ?></option>
			<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php _e('Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="42" <?php selected($options['op_currency'], '42'); ?>><?php _e('Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
			<option value="53" <?php selected($options['op_currency'], '53'); ?>><?php _e('Belize&nbsp;&nbsp;&nbsp;&nbsp;(Belize Dollar)&nbsp;&nbsp;&nbsp;&nbsp;BZ$12,345,678.99'); ?></option>
			<option value="38" <?php selected($options['op_currency'], '38'); ?>><?php _e('Bolivia&nbsp;&nbsp;&nbsp;&nbsp;(Boliviano)&nbsp;&nbsp;&nbsp;&nbsp;$b12.345.678,99'); ?></option>
			<option value="28" <?php selected($options['op_currency'], '28'); ?>><?php _e('Bosnia/Herzegovina&nbsp;&nbsp;&nbsp;&nbsp;(Mark)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99KM'); ?></option>
			<option value="40" <?php selected($options['op_currency'], '40'); ?>><?php _e('Brazil&nbsp;&nbsp;&nbsp;&nbsp;(Brazilian Real)&nbsp;&nbsp;&nbsp;&nbsp;R$12.345.678,99'); ?></option>
			<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php _e('Brunei&nbsp;&nbsp;&nbsp;&nbsp;(Brunei Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="27" <?php selected($options['op_currency'], '27'); ?>><?php _e('Bulgaria&nbsp;&nbsp;&nbsp;&nbsp;(Bulgarian Lev)&nbsp;&nbsp;&nbsp;&nbsp;12345678,99лв'); ?></option>
			<option value="50" <?php selected($options['op_currency'], '50'); ?>><?php _e('Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="13" <?php selected($options['op_currency'], '13'); ?>><?php _e('Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99$'); ?></option>
			<option value="35" <?php selected($options['op_currency'], '35'); ?>><?php _e('Chile&nbsp;&nbsp;&nbsp;&nbsp;(Chilean Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.679'); ?></option>
			<option value="73" <?php selected($options['op_currency'], '73'); ?>><?php _e('China&nbsp;&nbsp;&nbsp;&nbsp;(Yuan Renminbi)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,678.99'); ?></option>
			<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php _e('Colombia&nbsp;&nbsp;&nbsp;&nbsp;(Colombian Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
			<option value="26" <?php selected($options['op_currency'], '26'); ?>><?php _e('Costa Rica&nbsp;&nbsp;&nbsp;&nbsp;(Colon)&nbsp;&nbsp;&nbsp;&nbsp;₡12 345 678,99'); ?></option>
			<option value="29" <?php selected($options['op_currency'], '29'); ?>><?php _e('Croatia&nbsp;&nbsp;&nbsp;&nbsp;(Kuna)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kn'); ?></option>
			<option value="15" <?php selected($options['op_currency'], '15'); ?>><?php _e('Czechia&nbsp;&nbsp;&nbsp;&nbsp;(Czech Koruna)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Kč'); ?></option>
			<option value="30" <?php selected($options['op_currency'], '30'); ?>><?php _e('Denmark&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kr'); ?></option>
			<option value="63" <?php selected($options['op_currency'], '63'); ?>><?php _e('Dominican Republic&nbsp;&nbsp;&nbsp;&nbsp;(DR Peso)&nbsp;&nbsp;&nbsp;&nbsp;RD$1,234.99'); ?></option>
			<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php _e('Ecuador&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
			<option value="70" <?php selected($options['op_currency'], '70'); ?>><?php _e('Egypt&nbsp;&nbsp;&nbsp;&nbsp;(Egyptian Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
			<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php _e('El Salvador&nbsp;&nbsp;&nbsp;&nbsp;(El Salvador Colon)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php _e('Estonia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="68" <?php selected($options['op_currency'], '68'); ?>><?php _e('Faroe Islands&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99'); ?></option>
			<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php _e('Finland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php _e('France&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="91" <?php selected($options['op_currency'], '91'); ?>><?php _e('Georgia&nbsp;&nbsp;&nbsp;&nbsp;(Lari)&nbsp;&nbsp;&nbsp;&nbsp;GEL12,345,678.99'); ?></option>
			<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php _e('Germany&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php _e('Greece&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="61" <?php selected($options['op_currency'], '61'); ?>><?php _e('Guatemala&nbsp;&nbsp;&nbsp;&nbsp;(Quetzal)&nbsp;&nbsp;&nbsp;&nbsp;Q12,345,678.99'); ?></option>
			<option value="58" <?php selected($options['op_currency'], '58'); ?>><?php _e('Honduras&nbsp;&nbsp;&nbsp;&nbsp;(Lempira)&nbsp;&nbsp;&nbsp;&nbsp;L12,345,678.99'); ?></option>
			<option value="56" <?php selected($options['op_currency'], '56'); ?>><?php _e('Hong Kong&nbsp;&nbsp;&nbsp;&nbsp;(HK Dollar)&nbsp;&nbsp;&nbsp;&nbsp;HK$12,345,678.99'); ?></option>
			<option value="14" <?php selected($options['op_currency'], '14'); ?>><?php _e('Hungary&nbsp;&nbsp;&nbsp;&nbsp;(Forint)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Ft'); ?></option>
			<option value="67" <?php selected($options['op_currency'], '67'); ?>><?php _e('Iceland&nbsp;&nbsp;&nbsp;&nbsp;(Iceland Krona)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,679'); ?></option>
			<option value="83" <?php selected($options['op_currency'], '83'); ?>><?php _e('India&nbsp;&nbsp;&nbsp;&nbsp;(Indian Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₹12,345,678.99'); ?></option>
			<option value="41" <?php selected($options['op_currency'], '41'); ?>><?php _e('Indonesia&nbsp;&nbsp;&nbsp;&nbsp;(Rupiah)&nbsp;&nbsp;&nbsp;&nbsp;Rp12.345.678,99'); ?></option>
			<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php _e('Iran&nbsp;&nbsp;&nbsp;&nbsp;(Iranian Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
			<option value="92" <?php selected($options['op_currency'], '92'); ?>><?php _e('Iraq&nbsp;&nbsp;&nbsp;&nbsp;(Iraqi Dinar)&nbsp;&nbsp;&nbsp;&nbsp;IQD12,345,678.994'); ?></option>
			<option value="80" <?php selected($options['op_currency'], '80'); ?>><?php _e('Ireland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99'); ?></option>
			<option value="78" <?php selected($options['op_currency'], '78'); ?>><?php _e('Israel&nbsp;&nbsp;&nbsp;&nbsp;(Sheqel)&nbsp;&nbsp;&nbsp;&nbsp;₪12,345,678.99'); ?></option>
			<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php _e('Italy&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="57" <?php selected($options['op_currency'], '57'); ?>><?php _e('Jamaica&nbsp;&nbsp;&nbsp;&nbsp;(Jamaican Dollar)&nbsp;&nbsp;&nbsp;&nbsp;J$12,345,678.99'); ?></option>
			<option value="72" <?php selected($options['op_currency'], '72'); ?>><?php _e('Japan&nbsp;&nbsp;&nbsp;&nbsp;(Yen)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,679'); ?></option>
			<option value="93" <?php selected($options['op_currency'], '93'); ?>><?php _e('Jordan&nbsp;&nbsp;&nbsp;&nbsp;(Jordanian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;JOD12,345,678.994'); ?></option>
			<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php _e('Kazakhstan&nbsp;&nbsp;&nbsp;&nbsp;(Tenge)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
			<option value="94" <?php selected($options['op_currency'], '94'); ?>><?php _e('Kenya&nbsp;&nbsp;&nbsp;&nbsp;(Kenyan Shilling)&nbsp;&nbsp;&nbsp;&nbsp;KES12,345,678.99'); ?></option>
			<option value="77" <?php selected($options['op_currency'], '77'); ?>><?php _e('Korea (South)&nbsp;&nbsp;&nbsp;&nbsp;(Won)&nbsp;&nbsp;&nbsp;&nbsp;₩12,345,679'); ?></option>
			<option value="95" <?php selected($options['op_currency'], '95'); ?>><?php _e('Kuwait&nbsp;&nbsp;&nbsp;&nbsp;(Kuwaiti Dinar)&nbsp;&nbsp;&nbsp;&nbsp;KWD12,345,678.994'); ?></option>
			<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php _e('Kyrgyzstan&nbsp;&nbsp;&nbsp;&nbsp;(Som)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
			<option value="21" <?php selected($options['op_currency'], '21'); ?>><?php _e('Latvia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="70" <?php selected($options['op_currency'], '70'); ?>><?php _e('Lebanon&nbsp;&nbsp;&nbsp;&nbsp;(Lebanese Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
			<option value="96" <?php selected($options['op_currency'], '96'); ?>><?php _e('Libya&nbsp;&nbsp;&nbsp;&nbsp;(Libyan Dinar)&nbsp;&nbsp;&nbsp;&nbsp;LYD12,345,678.994'); ?></option>
			<option value="103" <?php selected($options['op_currency'], '103'); ?>><?php _e('Liechtenstein&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
			<option value="19" <?php selected($options['op_currency'], '19'); ?>><?php _e('Lithuania&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php _e('Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php _e('Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="98" <?php selected($options['op_currency'], '98'); ?>><?php _e('Macao&nbsp;&nbsp;&nbsp;&nbsp;(Pataca)&nbsp;&nbsp;&nbsp;&nbsp;MOP12,345,678.99'); ?></option>
			<option value="64" <?php selected($options['op_currency'], '64'); ?>><?php _e('Malaysia&nbsp;&nbsp;&nbsp;&nbsp;(Ringgit)&nbsp;&nbsp;&nbsp;&nbsp;RM12,345,678.99'); ?></option>
			<option value="99" <?php selected($options['op_currency'], '99'); ?>><?php _e('Maldives&nbsp;&nbsp;&nbsp;&nbsp;(Rufiyaa)&nbsp;&nbsp;&nbsp;&nbsp;MVR12,345,678.99'); ?></option>
			<option value="79" <?php selected($options['op_currency'], '79'); ?>><?php _e('Malta&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99'); ?></option>
			<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php _e('Mexico&nbsp;&nbsp;&nbsp;&nbsp;(Mexican Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php _e('Monaco&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="81" <?php selected($options['op_currency'], '81'); ?>><?php _e('Mongolia&nbsp;&nbsp;&nbsp;&nbsp;(Tugrik)&nbsp;&nbsp;&nbsp;&nbsp;₮12,345,678.99'); ?></option>
			<option value="97" <?php selected($options['op_currency'], '97'); ?>><?php _e('Morocco&nbsp;&nbsp;&nbsp;&nbsp;(Dirham)&nbsp;&nbsp;&nbsp;&nbsp;MAD12,345,678.99'); ?></option>
			<option value="44" <?php selected($options['op_currency'], '44'); ?>><?php _e('Netherlands&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
			<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php _e('New Zealand&nbsp;&nbsp;&nbsp;&nbsp;(NZ Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="55" <?php selected($options['op_currency'], '55'); ?>><?php _e('Nicaragua&nbsp;&nbsp;&nbsp;&nbsp;(Cordoba Oro)&nbsp;&nbsp;&nbsp;&nbsp;C$12,345,678.99'); ?></option>
			<option value="104" <?php selected($options['op_currency'], '104'); ?>><?php _e('Nigeria&nbsp;&nbsp;&nbsp;&nbsp;(Naira)&nbsp;&nbsp;&nbsp;&nbsp;₦12,345,678.99'); ?></option>
			<option value="25" <?php selected($options['op_currency'], '25'); ?>><?php _e('Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12 345 678,99'); ?></option>
			<option value="68" <?php selected($options['op_currency'], '68'); ?>><?php _e('Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99'); ?></option>
			<option value="86" <?php selected($options['op_currency'], '86'); ?>><?php _e('Oman&nbsp;&nbsp;&nbsp;&nbsp;(Rial Omani)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.994'); ?></option>
			<option value="76" <?php selected($options['op_currency'], '76'); ?>><?php _e('Pakistan&nbsp;&nbsp;&nbsp;&nbsp;(Pakistan Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₨12,345,678.99'); ?></option>
			<option value="52" <?php selected($options['op_currency'], '52'); ?>><?php _e('Panama&nbsp;&nbsp;&nbsp;&nbsp;(Balboa)&nbsp;&nbsp;&nbsp;&nbsp;B/.12,345,678.99'); ?></option>
			<option value="39" <?php selected($options['op_currency'], '39'); ?>><?php _e('Paraguay&nbsp;&nbsp;&nbsp;&nbsp;(Guarani)&nbsp;&nbsp;&nbsp;&nbsp;Gs12.345.679'); ?></option>
			<option value="65" <?php selected($options['op_currency'], '65'); ?>><?php _e('Peru&nbsp;&nbsp;&nbsp;&nbsp;(Sol)&nbsp;&nbsp;&nbsp;&nbsp;S/.12,345,678.99'); ?></option>
			<option value="82" <?php selected($options['op_currency'], '82'); ?>><?php _e('Philippines&nbsp;&nbsp;&nbsp;&nbsp;(Philippine Peso)&nbsp;&nbsp;&nbsp;&nbsp;₱12,345,678.99'); ?></option>
			<option value="17" <?php selected($options['op_currency'], '17'); ?>><?php _e('Poland&nbsp;&nbsp;&nbsp;&nbsp;(Zloty)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99zł'); ?></option>
			<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php _e('Portugal&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php _e('Qatar&nbsp;&nbsp;&nbsp;&nbsp;(Qatari Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
			<option value="31" <?php selected($options['op_currency'], '31'); ?>><?php _e('Romania&nbsp;&nbsp;&nbsp;&nbsp;(Romanian Leu)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99lei'); ?></option>
			<option value="23" <?php selected($options['op_currency'], '23'); ?>><?php _e('Russian Federation&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₽'); ?></option>
			<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php _e('Saudi Arabia&nbsp;&nbsp;&nbsp;&nbsp;(Saudi Riyal)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
			<option value="51" <?php selected($options['op_currency'], '51'); ?>><?php _e('Singapore&nbsp;&nbsp;&nbsp;&nbsp;(Singapore Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php _e('Slovakia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
			<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php _e('Slovenia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="62" <?php selected($options['op_currency'], '62'); ?>><?php _e('South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12,345,678.99'); ?></option>
			<option value="62" <?php selected($options['op_currency'], '62'); ?>><?php _e('South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12 345 678,99'); ?></option>
			<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php _e('Spain&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
			<option value="16" <?php selected($options['op_currency'], '16'); ?>><?php _e('Sweden&nbsp;&nbsp;&nbsp;&nbsp;(Swedish Krona)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99kr'); ?></option>
			<option value="103" <?php selected($options['op_currency'], '103'); ?>><?php _e('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
			<option value="47" <?php selected($options['op_currency'], '47'); ?>><?php _e('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678.99CHF'); ?></option>
			<option value="102" <?php selected($options['op_currency'], '102'); ?>><?php _e('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
			<option value="" <?php selected($options['op_currency'], ''); ?>><?php _e('Syrian Arab Republic&nbsp;&nbsp;&nbsp;&nbsp;(SYP)&nbsp;&nbsp;&nbsp;&nbsp;SYP 12,345,679'); ?></option>
			<option value="60" <?php selected($options['op_currency'], '60'); ?>><?php _e('Taiwan&nbsp;&nbsp;&nbsp;&nbsp;(Taiwan Dollar)&nbsp;&nbsp;&nbsp;&nbsp;NT$12,345,678.99'); ?></option>
			<option value="75" <?php selected($options['op_currency'], '75'); ?>><?php _e('Thailand&nbsp;&nbsp;&nbsp;&nbsp;(Baht)&nbsp;&nbsp;&nbsp;&nbsp;฿12,345,678.99'); ?></option>
			<option value="66" <?php selected($options['op_currency'], '66'); ?>><?php _e('Trinidad & Tobago&nbsp;&nbsp;&nbsp;&nbsp;(T/T Dollar)&nbsp;&nbsp;&nbsp;&nbsp;TT$1,234.99'); ?></option>
			<option value="100" <?php selected($options['op_currency'], '100'); ?>><?php _e('Tunisia&nbsp;&nbsp;&nbsp;&nbsp;(Tunisian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;TND12,345,678.994'); ?></option>
			<option value="45" <?php selected($options['op_currency'], '45'); ?>><?php _e('Turkey&nbsp;&nbsp;&nbsp;&nbsp;(Turkish Lira)&nbsp;&nbsp;&nbsp;&nbsp;₺12.345.678,99'); ?></option>
			<option value="22" <?php selected($options['op_currency'], '22'); ?>><?php _e('Ukraine&nbsp;&nbsp;&nbsp;&nbsp;(Hryvnia)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₴'); ?></option>
			<option value="87" <?php selected($options['op_currency'], '87'); ?>><?php _e('United Arab Emirates&nbsp;&nbsp;&nbsp;&nbsp;(UAE Dirham)&nbsp;&nbsp;&nbsp;&nbsp;AED12,345,678.99'); ?></option>
			<option value="71" <?php selected($options['op_currency'], '71'); ?>><?php _e('United Kingdom&nbsp;&nbsp;&nbsp;&nbsp;(GBP)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
			<option value="48" <?php selected($options['op_currency'], '48'); ?>><?php _e('United States&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
			<option value="37" <?php selected($options['op_currency'], '37'); ?>><?php _e('Uruguay&nbsp;&nbsp;&nbsp;&nbsp;(Peso Uruguayo)&nbsp;&nbsp;&nbsp;&nbsp;$U12.345.678,99'); ?></option>
			<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php _e('Uzbekistan&nbsp;&nbsp;&nbsp;&nbsp;(Uzbekistan Sum)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
			<option value="46" <?php selected($options['op_currency'], '46'); ?>><?php _e('Venezuela&nbsp;&nbsp;&nbsp;&nbsp;(Bolívar Soberano)&nbsp;&nbsp;&nbsp;&nbsp;VES12.345.678,99'); ?></option>
			<option value="32" <?php selected($options['op_currency'], '32'); ?>><?php _e('Viet Nam&nbsp;&nbsp;&nbsp;&nbsp;(Dong)&nbsp;&nbsp;&nbsp;&nbsp;12.345.679₫'); ?></option>
			<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php _e('Yemen&nbsp;&nbsp;&nbsp;&nbsp;(Yemeni Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
			<option value="101" <?php selected($options['op_currency'], '101'); ?>><?php _e('Zimbabwe&nbsp;&nbsp;&nbsp;&nbsp;(ZWL)&nbsp;&nbsp;&nbsp;&nbsp;ZWL12,345,678.99'); ?></option>
		</select>
</p>
<p>When a user first visits your site, the calculator will use the browser's currency and number formatting conventions. If you wish, you may override the calculator and set a default currency. The user will have the ability to override either setting.
</p>

<!--[KT] 02/05/2020 new options-->
<p>
	<!--select default date format-->
	<label for="fcsavingscalc-op_date_mask"><?php _e( 'Set a date format convention?:' ); ?>
		<select name="fcsavingscalc-op_date_mask" id="fcsavingscalc-op_date_mask" class="widefat">
			<option value="999" <?php selected($options['op_date_mask'], '999'); ?>><?php _e('Use visitor\'s browser\'s settings to set date format - do not override.'); ?></option>
			<option value="0" <?php selected($options['op_date_mask'], '0'); ?>><?php _e('MM/DD/YYYY'); ?></option>
			<option value="1" <?php selected($options['op_date_mask'], '1'); ?>><?php _e('DD/MM/YYYY'); ?></option>
			<option value="2" <?php selected($options['op_date_mask'], '2'); ?>><?php _e('YYYY-MM-DD'); ?></option>
			<option value="3" <?php selected($options['op_date_mask'], '3'); ?>><?php _e('DD.MM.YYYY'); ?></option>
			<option value="4" <?php selected($options['op_date_mask'], '4'); ?>><?php _e('DD-MM-YYYY'); ?></option>
			<option value="5" <?php selected($options['op_date_mask'], '5'); ?>><?php _e('YYYY.MM.DD'); ?></option>
			<option value="6" <?php selected($options['op_date_mask'], '6'); ?>><?php _e('YYYY/MM/DD'); ?></option>

		</select>
</p>
<p>When a user first visits your site, the calculator will use the browser's date conventions to set the date format. If you wish, you may override the calculator and set a default format. The user will have the ability to override either setting.</p>



<p>
	<label for="fcsavingscalc-op_hide_resize"><?php _e( 'Hide the resize buttons?:' ); ?>
		<select name="fcsavingscalc-op_hide_resize" id="fcsavingscalc-op_hide_resize" class="widefat">
			<option value="No" <?php selected( $options['op_hide_resize'], 'No' ); ?>><?php _e('No'); ?></option>
			<option value="Yes" <?php selected( $options['op_hide_resize'], 'Yes' ); ?>><?php _e('Yes'); ?></option>
		</select>
	</label>
</p>


<p>
	<label for="fcsavingscalc-op_add_link"><?php _e( 'Allow plugin to add a link to financial-calculators.com?:' ); ?>
		<select name="fcsavingscalc-op_add_link" id="fcsavingscalc-op_add_link" class="widefat">
			<option value="No" <?php selected( $options['op_add_link'], 'No' ); ?>><?php _e('No'); ?></option>
			<option value="Yes" <?php selected( $options['op_add_link'], 'Yes' ); ?>><?php _e('Yes'); ?></option>
		</select>
	</label>
</p>
<p>
	If &quot;Yes&quot;, one discreet follow link will be inserted in the calculator. If you allow the link, you can rebrand the calculator to include your name or that of your business. Resetting this option to &quot;No&quot; at any time will remove the links. See FAQ's for details.
</p>



<p><label for="fcsavingscalc-op_brand_name"><?php _e('Add Your Brand Name:'); ?> <input class="widefat" id="fcsavingscalc-op_brand_name" name="fcsavingscalc-op_brand_name" type="text" value="<?php echo $brand_name; ?>" /></label>
</p>
<p>
	You may brand this widget with your brand. <b>Example: &quot;<b>Ben's</b>&quot;</b> will be preappended to &quot;Savings Calculator&quot; For this to work, the above &quot;add link&quot; option must be set to &quot;Yes&quot;.
</p>

<div style="width:100%; float:left; clear:both;">
	<div style="width:45%; float:left; margin-right:4px;"><label for="fcsavingscalc-op_save_amt"><?php _e('Default savings amount:'); ?> <input class="widefat" id="fcsavingscalc-op_save_amt" name="fcsavingscalc-op_save_amt" type="text" value="<?php echo $save_amt; ?>" /></label></div>
	<div style="width:45%; float:left"><label for="fcsavingscalc-op_n_months"><?php _e('Default number of months:'); ?> <input class="widefat" id="fcsavingscalc-op_n_months" name="fcsavingscalc-op_n_months" type="text" value="<?php echo $n_months; ?>" /></label></div>
</div>
<div style="width:100%; float:left; clear:both;">
	<div style="width:45%; float:left; margin-right:4px;"><label for="fcsavingscalc-op_rate"><?php _e('Default interest rate:'); ?> <input class="widefat" id="fcsavingscalc-op_rate" name="fcsavingscalc-op_rate" type="text" value="<?php echo $rate; ?>" /></label></div>
	<div style="width:45%; float:left">
		<p style="text-align:center"><?php _e('Enter only digits.<br>No formatting.'); ?></p>
	</div>
</div>


<p><b>Note:</b> Your visitors will be able to select the date and currency conventions they need by clicking on &quot<b>$ : MM/DD/YYYY</b>&quot; in the calculator's lower right corner.</p>

<input type="hidden" id="fcsavingscalc_opts" name="fcsavingscalc_opts" value="<?php echo wp_create_nonce('fc_options'); ?>" />


<?php

}



/* Function: fcsavingsplugin_register
**
** Registers the plugin to show in WordPress' admin's widget page.
**
** args: none
** returns: nothing
*/
function fcsavingsplugin_register() {
	$widget_ops = array('classname' => 'fcsavingscalc_plugin', 'description' => __('Savings Calculator by financial-calculators.com'));

	$name = __('Savings Calculator');

	// Register WordPress Widgets for use in your themes sidebars.
	// You can also modify your theme and start Customizing Your Sidebar. 
	// wp_register_sidebar_widget($id, $name, $output_callback, $options, $params, ... ); 
	wp_register_sidebar_widget( 'fcsavingsplugin', $name, 'show_fcsavings_widget', $widget_ops );


	// Draws the controls form on the WordPress's widget page in admin area
	// and saves the settings when the "Save" button is clicked
	// Registers widget control callback for customizing options.
	// wp_register_widget_control( int|string $id, string $name, callable $control_callback, array $options = array() )
	wp_register_widget_control( 'fcsavingsplugin', $name, 'fcsavingsplugin_options' );
} // fcsavingsplugin_register


// Hooks a function on to a specific action.
add_action( 'widgets_init', 'fcsavingsplugin_register' );

// Adds a hook for a shortcode tag.
add_shortcode( 'fcsavingsplugin', 'show_fcsavings_plugin' );


/* end of file */