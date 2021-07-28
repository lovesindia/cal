=== FC's Savings Calculator ===
Contributors: financialcalculators
Donate link:
Tags: calculator, saving, savings calculator, future value calculator, savings schedule, retirement saving, college saving, plugin, sidebar, widget
Requires at least: 2.9.0
Tested up to: 5.6
Stable tag: 1.4.4
License: GNU General Public License
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

This plugin calculates the result (FV) of making periodic deposits or investments. Create a schedule and charts. Supports international conventions.

== Description ==

[FC's Savings Calculator Plugin](https://financial-calculators.com/calculator-plugins/savings-calculator-plugin) answers the question "How much will I have after I make a series of deposits assuming a fixed rate of interest?". It creates a detail saving schedule with date based deposits as well as a set of charts. A site's users can select their own currency and date convention used in the future value schedule. This is ideal if your attracts visitors from around the globe. Select from one of four predefined sizes or modify the CSS file to customize size and change colors. Supports touch devices and a responsive designed website. This plugin is based on and uses the code from my [Savings Calculator](https://financial-calculator.com/savings-calculator).

*Rebranding with your site's brand name is supported and encouraged.*

The plugin may be used (a) in a post or page's content area via a *shortcode*; or (b) used in a *sidebar widget area*; or (c) called from any template file. See __usage__ under installation for details.

**Installation**

Either (a) upload the *fc-savings-calculator* folder with all its files to the */wp-content/plugins/* folder or (b) unzip the plugin's zip file in the */wp-content/plugins/* folder.

Activate the plugin through the *Plugins -> Installed Plugins* menu in WordPress


*Usage*

There are 3 mutually exclusive ways you can deploy the calculator to an individual page (though you can use all three methods on different pages within a site):

1. If you are using widgets, just add the plugin to the sidebar through the Appearance -> Widgets menu in WordPress. Be sure to click *Save*.
1. Add the following code *&lt;?php show_fcsavings_plugin(); ?&gt;* to your template where you want the calculator to appear. See below for options.
1. Add the shortcode *[fcsavingsplugin]* in the content area of your page or post and configure shortcode parameters.

__Shortcode parameters__

	* sc_size= tiny | small | medium | large
	* sc_custom_style= No | Yes
	* sc_add_link= No | Yes
	* sc_brand_name= 
	* sc_hide_resize= No | Yes
	* sc_save_amt=
	* sc_n_months=
	* sc_rate=
	* sc_currency=
	* sc_date_mask=

Examples (1st includes all options):

`[fcsavingsplugin sc_size="medium" sc_custom_style="No" sc_add_link="No" sc_brand_name="" sc_hide_resize="No" sc_save_amt="1200.0" sc_n_months="240" sc_rate="5.5" sc_currency="83" sc_date_mask="2"]`

`[fcsavingsplugin sc_size="small" sc_custom_style="Yes" sc_hide_resize="Yes" sc_currency="83" sc_date_mask="2"]`

`[fcsavingsplugin sc_custom_style="No" sc_add_link="Yes" sc_brand_name="Friendly Financial Planners" sc_hide_resize="Yes" sc_save_amt="1050.0" sc_n_months="180" sc_rate="5.5"]`

__Optional array parameter passed to *show_fcsavings_plugin()*__

Valid values for options are the same as the shortcode above.

	<?php show_fcsavings_plugin(array('op_size' => "medium",
			'op_custom_style' => "No",
			'op_add_link' => "Yes",
			'op_brand_name' => "Karl's",
			'op_hide_resize' => "No",
			'op_save_amt' => "1000.00",
			'op_n_months' => "180",
			'op_rate' => "5.5",
			'op_currency' => "999",
			'op_date_mask' => "999"
			)); ?>

*Notes:*

1. If you want to add your brand to the calculator, the *_add_link option must be set to "Yes" (i.e. create a subtle follow link to financial-calculators.com). 
1. When branding, the brand name will be added before "Savings Calculator".
1. If _custom_style is set to "Yes", the plugin will load fin-calc-widgets-custom.css located in the plugin's CSS folder. If you set the option to "Yes" without making any changes, the calculator will change to a horrendous red which indicates the custom css is being used.
1. The plugin is built and tested on HTML5/CSS3 pages.
1. size (max-width): large: 440px, medium: 340px, small: 290px, tiny: 150px
1. The modal dialog that allows users to select a default currency and date format is NOT compatible with some other dialogs. If you have a modeal on the webpage you want to install this calculator on, either your modal or the calculator's modal may not work.
1. Website developers can set a default currency sign and preferred date format by setting <op/sc>_currency and <op/sc>_date_mask respectively. Set one or both to an integer value. For the list of integers to support 90 plus currency symbols and 6 date format options, see the file __currency_and_date_conventions.txt__ in the plugin's root folder. (example: India, Indian Rupee: ₹1,23,45,678.99 = 83)

*Enhanced Internationalization*

New: Support for over 90 currency signs (using appropriate nummber formatting conventions) and 6 date formats (mm/dd/yyyy, dd/mm/yyyy, yyyy.mm.dd etc.). If neither the website developer or the user makes a selection, the calculator will read the browser's default currency and date options and automatically use them. Without doing anything, a website visitor from Japan visiting a website hosted in France will initially see a floating yen sign. The website developer can easily override this default behavior by setting either shortcodes or function options. The user (if the website designer keeps the feature enabled) can override both and select a currency and date format.

*To summarize, the plugin determines what currency symbol (and date format) to use by applying the following rules:*

1. If a website allows a user to select a symbol, and the user makes a selection, the plugin uses the visitor's choice first.
2. Otherwise, if a user has not made a selection, and the website owner has set a default currency (i.e., currency does not equal 999), the calculator uses the website's selection.
3. Otherwise, the calculator plugin will attempt to read the browser's currency default and pick a currency symbol.
4. Otherwise, the plugin defaults to using the '$' symbol.


*Roadmap:*

1. Redesign that allows multiple calculators to work on the same web page - completed v.1.2.0.
1. Allow website owner to select a default currency and date format - completed v.1.4.0
1. Give website owners the ability to not let their visitors change the default date format or currency - completed v.1.3.0
	
Contact me if you would like to help test any of these new features.

*Other Calculators*

As of this writing, financial-calculators.com has seven plugins listed in the WordPress Plugin Directory with several more available on the website. All plugins have the same general feature set and are consistent in their styling and the way they work. This means you can install all these plugins and maintain a consistent look and feel across your website or blog. If you blog about money, you are encouraged to install all the plugins on your site. It's simple. The more pages, the more opportunity.

Below links take you to the indicated WordPress Plugin Directory page.

1. [Auto Loan Calculator](https://wordpress.org/plugins/fc-auto-loan-calculator/) - solves for several unknowns and creates a payment schedule.
1. [Loan Calculator](https://wordpress.org/plugins/fc-loan-calculator/) - a general purpose loan calculator with amortization schedule and charts.
1. [Mortgage Calculator](https://wordpress.org/plugins/fc-mortgage-calculator/) - optionally incorporates points and insurance and creates a payment schedule
1. [Retirement Age Calculator](https://wordpress.org/plugins/fc-retirement-age-calculator/) - answers, at what age will I be able to retire given my investment plan?
1. [Retirement Nest Egg Calculator](https://wordpress.org/plugins/fc-retirement-nest-egg-calculator/) - answers, what will be the value of my retirement fund when I retire?
1. [Retirement Savings Calculator](https://wordpress.org/plugins/fc-retirement-savings-calculator/) - how much do I have to invest periodically to reach my retirement goal?


== Frequently Asked Questions ==

__Can the Savings Calculator plugin be used on a commercial website?__

Yes. I would be honored. Thanks.

Also, if you happen to be a financial blogger, I would encourage you to add a "Calculators" or "Tools" section to your site and include all my calculators. More content equals more opportunity. I expect to have seven free plugins by early 2017.

__Does your plugin have any embed advertising?__

Absolutely not.

__Is your plugin self contained?__

Yes. 100% of the plugin is installed on your server. There are no external dependencies.

__Does the plugin include any backlinks?__

No, not by default. If you decide to brand the calculator with your brand and / or set the *add_link* option to *Yes*, one discreet link is added to my site. (User will not know there is a link unless their mouse passes over it.) The link is around the copyright in the lower left. :)

__Is the calculator plugin responsive?__

Yes. In fact, I use it on a Bootstrap responsive site. 

__Does the calculator support touch devices?__

Yes. Users use the calculator with all types of devices. (A previous issue with some Android devices is fixed.)

__Do you offer other calculator plugins?__

Yes. Besides those included in the WordPress directory, I'm offering a "Plus" versions of my plugins on my website. They are free for a limited time.

__I like your plugin and I'd like to contribute something but I notice you don't have a link for contributions, why not?__

Thank you. That's very kind of you. Actually, you can contribute, and it won't cost you a cent. Please stop by my [website](https://financial-calculators.com) and check it out. In addition to providing some very advanced calculators, I think that I'm the only one that provides free support via a public forum. Take a look, and if you like what you see, please spread the word. That's better than any monetary compensation.



== Screenshots ==

1. The Savings Calculator's front end showing 2 of the 4 configurable sizes, one with custom brand and no sizing buttons.
2. Deposit schedule shown in a lightbox. User can select how date is displayed from 3 international date conventions.
3. Three charts shown in a lightbox.
4. Plugin's settings dialogue, as seen under *Appearance* *Widgets* page in WordPress's administration area.

== Changelog ==
= 1.4.4 =
* Fixed a style which made the calculator way too tall on some themes (specifically Neve Theme by Themeisle).
* Fixed a calculation error in the chart. Not all prior values were cleared.
= 1.4.3 =
* Fixed a display bug that only impacted some sites if they installed plugin via a sidebar.
* Tweaked styling to make it cleaner.
= 1.4.2 =
* Fixed a bug that prevented your website users from selecting a currency of their choice in some situations.
* Added support for Nigeria's Naira currency symbol
= 1.4.1 =
* Internal change. Never released.
= 1.4.0 =
* Added currency sign support for 80 plus additional currencies.
* Added three additional date styles.
* Now the first time a visitor tries the calculator, the calculator will detect their browser's currency symbol and date style and use them.
* Website owner has the ability to set a preferred currency sign and date format for all first time visitors.
* Website owner can give the visitor an option to select their preferred currency symbol and date format.
* IMPROVEMENT: on mobile devices calculator opens numeric keyboard by default.
* UPDATE: some layout and style settings
* BUG FIX: Fixed an input issue on Android devices that required a long press to input numbers for some Android users.

= 1.3.0 =
* Slight style changes
* Tweaks to work better with WordPress 5.0
* Switched from Bootstrap v3 to Bootstrap v4 utilities. If your site is built using Bootstrap 3, this may cause conflicts. Test on a dev machine.
* Since there are no user enhancements, I would only upgrade if you have experienced a style issue.

= 1.2.0 =
* Multiple fc calculators can now be used on a single web page.
* On a few sites, the text in the dropdowns was cut off - fixed.
* Previously, if site had opted to allow backlinks, 2 had been inserted. Now one is inserted.

= 1.1.2 =
* Updated the CSS so as to resolve a few reported compatibility issues with some sites.
* Improved layout of international date and currency selection dialogue.

= 1.1.1 =
* Fixed - some installations the currency / date dialogue was not accessible because the background overlay was on top of the dialogue.
* Fixed - some installations the Help text was visible on the main page and not just when the Help button was clicked
* Fixed - missing "+" "-" signs for the optional resizing feature

= 1.1 =
* Improved styling
* Converted project to use a single file CSS regardless of calculator size selected. Single file will be compatible across all financial-calculator.com plugins so site owners can modify style once and copy to all other plugins.

= 1.0 =
*	First release

== Upgrade Notice ==
No upgrades.
