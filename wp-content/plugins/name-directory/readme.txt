=== Plugin Name ===
Contributors: jeroenpeters1986, mpmarinov, mastababa
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=T284NKYDFC8PE&lc=US&item_name=WordPress%2dPlugin&item_number=Name%2dDirectory&currency_code=USD
Tags: glossary, index, name, directory, names, NameDirectory, Name Directory, telephonebook, glossaries, directories, dictionary, dictionaries
Requires at least: 3.0.1
Requires PHP: 5.3
Tested up to: 5.3
Stable tag: 1.15.2

Name directory (glossary) with lots of options. Very easy to add to your site with a simple shortcode. It can have multiple directories. Supports multibyte characters (Chinese, Russian, Arabic, Danish/Nordic alphabet, etc).

== Description ==

### Name Directory: Build your own glossary!

This plugin adds name/term directories (glossaries) to your WordPress installation.
The output on your website is like a glossary/index, including a search function.
This plugin supports **multiple directories** in one WordPress installation.
I recommend you to take a look at the screenshots, they illustrate more than words.

The Name Directory plugin was orginally developed for [ParkietenVilla.nl](https://www.parkietenvilla.nl/namenlijst/) to show a directory of names to name your budgies.

#### Create multiple directories and customize them!

You can create multiple directories with this plugin.
Every directory can be embedded with a very simple shortcode which you can just copy-and-paste
in your own pages and posts. Every directory has a few configuration options that customize
the layout and functionality of the directory:

 - Show/Hide title
 - Show/Hide description
 - Enter the subject of the directory (i.e.: movies, birds, countries, names)
 - Show/Hide suggestion form
 - Show/Hide submitter name
 - Show/Hide search function (searches names/titles and description)
 - Show/Hide a horizontal rule between the entries
 - Show/Hide all entries when the user has not chosen an index-letter yet
 - Show/Hide the newest entries (and choose an amount of newest entries to show)
 - Choose the amount of columns to display
 - Whether to jump to the name directory when a visitor is using the search box (for onepage websites)
 - When you embed a directory, you can configure it to start with a letter of your choosing. E.g.: start on letter J.
 - You can limit the amount of words in the description (and display a "Read more" link which reveals the rest of the text

The administration view of this plugin has the familiar look and feel of (the rest of) the WordPress Administration panel.
I have done my best to enable some AJAX-features in the administration panel, so you can work efficiently while adding new entries.

Since v1.7 and v1.8, import and export functionality is also supported through .csv-files.

#### Embed the directory in the WordPress default search engine
When you go to the General Settings of the plugin, you can enable WordPress search compatibility.
This will include the pages who have a matching entry of Name Directory in the search results

#### Language support
Do you want Name Directory to be available in your language?
Please help us translate!
You can translate directly by going to https://translate.wordpress.org/projects/wp-plugins/name-directory,
login with your WordPress account and click Select your language and click 'Contribute Translation'.


== Installation ==

= Displaying a directory on your site =

1. Go to the Name Directory settings page
1. Hover over the directory you want to add to the page.
1. A few options should show now, like Delete, Manage and Shortcode (see screenshot https://ps.w.org/name-directory/assets/screenshot-2.png).
1. Click 'Shortcode', a little textbox will show now.
1. Copy-and-paste the content of the textbox into the page you want the plugin to show up.
1. Save and view the page to see the result.

= What does the shortcode look like? =

The shortcode for this Name Directory plugin is like this:
`[namedirectory dir=1]`

= Installing the plugin =
Installation is very easy. You can just download this plugin through the Plugin Finder in your WordPress Administration Panel.

If you download the zip-file, installation isn't that difficult either:

1. Unzip the file which results into a directory called `name-directory`
1. Upload that directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create a new name directory and add some names
1. Copy the shortcode and paste it into a post or page to show it on your website


== Frequently Asked Questions ==

= What does the shortcode look like? =

The shortcode for this Name Directory plugin is like this:
`[namedirectory dir=1]`

The `1` in this example is the internal ID of the directory, the rest of the shortcode should always look like this.

= I created a directory, how do I show it on my site? =

1. Go to the Name Directory settings page
1. Hover over the directory you want to add to the page.
1. A few options should show now, like Delete, Manage and Shortcode - see screenshot https://ps.w.org/name-directory/assets/screenshot-2.png
1. Click 'Shortcode', a little textbox will show now.
1. Copy-and-paste the content of the textbox into the page you want the plugin to show up.
1. Save and view the page to see the result.

= Can I customize the appearance / styling of the Name Directory? =

Yes you can, with CSS. If you know your way around CSS you might already know that you can style elements by their class name or HTML structure.
This plugin was written with styling / CSS in mind. Using the HTML inspector of your favourite browser you should be able to discover the classnames, but here are a few popular classes:

* `.name_directory_index`: Index links (the letters A-Z)
* `.name_directory_name_box > strong`: Name / Entry title
* `.name_directory_name_box > div`: Name / Entry descriptiong
* `.name_directory_total`: Total count of names / entries
* `.name_directory_index > form`: Search form
* `.name_directory_submit_bottom_link`: Link to submit form
* `.name_directory_active`: Currently active character on index
* `.name_directory_empty`: Indicates that there a no entries for character
* `#name-directory-search-input-box`: Search input box
* `#name-directory-search-input-button`: Search button

I do offer help on styling / CSS if you are willing to make a small donation.

= Is there a bulk-add or csv import in this plugin? =

Since v1.7, yes there is! You can import a .csv-file into a directory.

1. Go to the Name Directory settings page
1. Hover over the directory you want to import names into.
1. A few options should show now, like Delete, Manage and Import - [see this screenshot](https://ps.w.org/name-directory/assets/screenshot-2.png) for an example
1. Click 'Import'
1. Select your .csv-file
1. Upload

You can add names, descriptions and submitter entries, just the first column (name) is required. Good to know: the first row is always ignored (they should be headers).
You can download an [example import file](http://ps.w.org/name-directory/assets/name-directory-import-example.csv) to take a look at the format.

Might your first try does not work, please use https://www.freefileconvert.com to convert your file into a valid CSV file.
Also, importing works best if you export the files with 'UTF-8' character set, ANSI does not always work.

If you need any help, contact me on the forums.

= Can I export my directory? =

Since v1.8, yes you can! This export is also compatible with the import-functionality offcourse. If you want to export, use the following steps:

1. Go to the Name Directory settings page
1. Hover over the directory you want to export.
1. A few options should show now, like Delete, Manage, Import and also Export - [see this screenshot](https://ps.w.org/name-directory/assets/screenshot-2.png) for an example
1. Click 'Export'
1. On the new page click the button and your .csv-file will be downloaded

= Are there examples to see the plugin in action? =

Yes, every now and then I come across an installed version of the plugin. Here is an incomplete list, all customized and made personal.

1. [Dutch Budgie website - How to name your bird](http://www.parkietenvilla.nl/namenlijst/)
1. [French website - Kitchen-terms](https://goutu.org/cuisine-alimentation/lexique-de-cuisine/)
1. [Skill glossary](http://www.teachaskill.in/glossary/)
1. [Dutch website - How to name your pet rat](http://ratten.nl/fun/namenlijst/)
1. [Whakapapa club - Maori Genealogy Site, with lots of Name Directories](http://www.whakapapaclub.nz/category/lists/)
1. [Balkums plat - Translations](https://joekelvanunnekwek.nl/blaouw-buukske-2-0/)
1. [Dutch Choir - Reportoire list](http://koor-excelsior.nl/repertoire/)
1. [Dutch Pregnancy - Term List](https://allesoverzwanger.nl/woordenlijst/)
1. [Belgian Artisan shop - Product list](http://www.artisanshop.be/producten-abc/)
1. [Alabama Orthopaedic Society - Member list](http://aosdocs.com/directory/)
1. [Convertus - Paid Search Terms](https://www.convertus.com/search-glossary/)
1. [Sailing for Water - Classic Yacht Registry](https://sailingforwater.org/classic-yacht-registry-of-heritage/)
1. [SBS ShopRI - Vendor List](http://sbsshopri.com/vendors/vendor-listing-2018/)
1. [Coin Collector Blog](http://coinsblog.ws/collectors-reference/numismatic-dictionary)

If you see a dead link, would you please [let me know](https://wordpress.org/support/plugin/name-directory)?

= Can I use HTML in the name description? =

Yes, this is possible!

= Can I use a WYSIWYG editor to edit the name description? =

Yes, this is possible! Since v1.14.1. You can enable this yourself when you go to the General Settings (also see screenshot 7)

= Can I also display a random name? =

Yes, since v1.12 this is possible. You can use this shortcode for that:
`[namedirectory_random dir=1]`

The `1` in this example is the internal ID of the directory.

= Can I also display a single name? =

Yes, since v1.13 this is possible. You can use this shortcode for that:
`[namedirectory_single id=10]`

The `10` in this example is the internal ID of the name, you can find it in the last column when you view all names for a directory in the WordPress admin.

= How can I contact you? =

If you have questions about the plugin or if you have ideas to share, the best way to contact me is through the [Support Forums](https://wordpress.org/support/plugin/name-directory)

= Do you also offer customizations? =

Yes, I do. For this I offer paid help. Please contact me at jeroenpeters1986@gmail.com to discuss.


== Screenshots ==

1. The output of a name directory on a standard WordPress website. It's a full-featured name directory (search form, index links, descriptions and submit button)
2. Overview of all the name directories in the WordPress Administration screen for this plugin
3. List of all names in the selected directory and the 'Add name' form
4. Settings screen for a name directory
5. Where to find the Name Directory plugin settings page
6. Another example of the plugin on a website
7. Overview of the new General Settings page, which allows you to embed search results from Name Directory in your WordPress site search and since v1.14.1 also to enable the HTML editor


== Changelog ==

= 1.15.2 | October 13, 2019 =
 * Feature: Added an option to the import screen to empty a directory before importing (useful for people who use a spreadsheet for name management)
 * Enhancement: Added a special import-option the import screen which uses UTF8 import.
 * Maintenance: WordPress 5.3 compatible

= 1.15.1 | August 16, 2019 =
 * Bugfix: Added an exact match query to the "exact" search functionality

= 1.15 | August 14, 2019 =
 * Feature: You can now choose (per-directory) whether to search in the description
 * Enhancement: Added extra explaination / documentation on the subject of importing to the plugin
 * Enhancement: Refined the "exact" search functionality in the directories
 * Maintenance: Cleaned up the plugins CSS
 * Maintenance: Changed the way the database is installed and kept in sync on updating, way less code

= 1.14.2 | August 1, 2019 (my nephew's birthday) =
 * Improvement: Empty the edit form on Ajax submit and scroll to the top to see the success message

= 1.14.1 | August 1, 2019 (my nephew's birthday) =
 * Feature: You can now use a visual editor! You just have to enable this on the General Settings (the one of Name Directory) screen
 * Bugfix: Fixed small import bug with accent characters
 * Bugfix: htmlspecialchars sometimes issued a warning to the error_log

= 1.14 | July 17, 2019 =
 * Feature: Added Quick Import from menu, imports into a new directory
 * Enhancement: Translations/naming
 * Enhancement: When searching with (double) quotation marks, it will not perform a wildcard search. So searching for "media" will not return 'mediator'.
 * Bugfix: Directory sorting in the admin is now on most recent added named, but with empty directories on top

= 1.13.7 | June 2, 2019 =
 * Bugfix: SQL improvement for selecting and grouping

= 1.13.6 | June 1, 2019 =
 * Feature: sort name directory on most recent added name
 * Bugfix: also show empty directories

= 1.13.5 | May 28, 2019 =
 * Refactored some code
 * Javascript is handled cleaner (more WordPress-alike)
 * Bugfix: Fixed One-click status toggle (published/unpublished)

= 1.13.4 | May 28, 2019 =
 * Feature: sort name directory on most recent added name
 * Bugfix: remove debug output

= 1.13.3 | May 16, 2019 =
 * Bugfix: utf8_encode in import functionality, so non-latin characters are supported too

= 1.13.2 | April 18, 2019 =
 * mb_string enhancement, this is used on non-latin character sets.
 * Bugfix: Do not use mb_string functionality when it's not available (so it does not crash)
 * Feature: Test whether the mb_string extension in PHP is enabled and display a notice when it's not
 * Tested WordPress v5.2 (beta)

= 1.13.1 | February 28, 2019 (my birthday!) =
 * Bugfix: When exporting, rows were not properly separated
 * Bugfix: When exporting, HTML markup cannot support linebreaks

= 1.13 | February 20, 2019 =
 * Introduced `[namedirectory_single]`, to display a single name entry on the website. Useful for widgets
 * Bugfix: When exporting, HTML markup is now saved to the CSV
 * Added ID's in the admin (so you can actually use the new shortcode)
 * Created a render-helper for nameboxes to be reused by `[namedirectory]`, `[namedirectory_random]` and the new `[namedirectory_single]`
 * Finally using separate .js and .css for the admin!
 * Numurous small enhancements to the admin

= 1.12 | January 31, 2019 =
 * Added search in the backend -> Code kindly provided by @mpmarinov
 * Added shortcode for displaying a random name (`[namedirectory_random]`) from a given directory -> Code kindly provided by @mastababa

= 1.11.6 | January 21, 2019 =
 * Also added the 'jump to' functionality when clicking on index letters. Earlier, this was only done at the searchbox (Thanks Ana!)

= 1.11.5 | January 12, 2019 =
 * Better support for your own name term
 * Admin link to the add-form

= 1.11.4 | December 27, 2018 =
 * Fixes bug in WordPress site search hook when no preferences for site search were set

= 1.11.3 | December 27, 2018 =
 * Temporary disabled the search because of bug reports

= 1.11.2 | December 26, 2018 =
 * Fixes bug in WordPress site  search hook where all posts were included on no results

= 1.11.1 | December 26, 2018 =
 * Temporary disabled the search because of bug reports

= 1.11 | December 18, 2018 =
 * Added the ability to give your own term for 'names'. So it does not have to be a 'name' directory, you can customize it to be like 'movies'. It'll state "There are currently 10 movies in this directory", instead of "There are currently 10 names in this directory".
 * WordPress 5.0.1 compatible

= 1.10 | December 17, 2018 =
 * It's now possible to include Name Directory in your WordPress (site wide) search results. Offcourse, Name Directory still has it's own searchbox!
 * Added a new General Settings page which allows you to enable and tweak the search-behaviour. You can also choose to search in descriptions and whether it should be a wildcard search.
 * Added a screenshot of the new General Settings page
 * Updated screenshot #2 (Directory overview)
 * Updated Frequently Asked Questions

= 1.9.7 =
 * PHP 5.3 compatibility
 * WordPress 5.0 compatible

= 1.9.6 =
 * Cleaned up code to prevent errors in debug-mode

= 1.9.5 =
 * Startswith character can now be non-latin

= 1.9.4 =
 * Confirm-delete message did show an alert, but no text

= 1.9.3 =
 * Added a confirm-delete message when deleting a directory.

= 1.9.2 =
 * Sorted index characters when they were not shown by default: A-Z

= 1.9.1 =
 * Compatible with WordPress 4.9.1
 * Ability to limit the amount of words in the description, shown on the frontend of the website. You can manage this in the directory settings. Names with a description which exceeds the setting, are limited with a "Show more" link.
 * Optimized code, rewritten the directory options screen to prevent lots of duplicate code and make it easier for myself to maintain
 * Added some more descriptions to what the directory settings do
 * Updated screenshots

= 1.9.0 =
 * You can now use words that start with non-latin characters (like Chinese, Arabic, Nordic/Danish, etc)
 * Updated Readme, which includes the Description, Changelog and the Frequently Asked Questions
 * Updated php code to follow development guidelines

= 1.8.2 =
 * Compatible with WordPress 4.9 final
 * Update php code to follow development guidelines

= 1.8.1 =
 * Compatible with WordPress 4.9b3
 * Removed old translation file, since Name Directory uses the WordPress translation platform
 * Moved an admin `add_action` hook
 * Updated Export to work with Javascript, possible denying Internet Explorer 9 (and lower) users export
 * Fixed compatibility with AJAX Front-end plugins
 * WordPress moves all divs with class 'updated' to the top of the page, which isn't very handy for the Add-Name form, which is on the bottom of the page. Created a workaround, all success-messages will be displayed above the add-form again.

= 1.8 =
 * Added export function, export your name directory to .csv file. Offcourse, it's compatible with the upload function

= 1.7.15 =
 * WND-46: Created a new option the admin for jumping to the searchbox on the front-end, useful on long page or onepage website
 * Support bumped to WordPress 4.8.2

= 1.7.14 =
 * WND-45: Better multisite support

= 1.7.13 =
 * WND-44: Front-end submit form now requires at least a name

= 1.7.12 =
 * WND-42: Option to use latest was broken, treated as L

= 1.7.11 =
 * WND-41: Verified translation from translate.wordpress.org
 * WND-40: Fixed bug there selecting only names that start with numbers, everything was shown

= 1.7.10 | July 23, 2016 =
 * WND-39: Added `name_directory_active` class on index to indicate which character was activated
 * WND-39: Added `name_directory_empty` class on index to indicate there are no entries for a character
 * Started working with the Stable tag: https://wordpress.org/plugins/about/svn/#task-3
 * Removed translations so we can benefit from translate.wordpress.org :)
 * Do you want to help me translate this plugin in your own language? Let me know in the support forums! I will credit you!

= 1.7.9 =
 * WND-38: Database structure adjust

= 1.7.8 =
 * WND-35: Fixed CVS import
 * WND-36: Tested WP 4.4.2

= 1.7.7 =
 * WND-24: Fixed Possible XSS vulnerability

= 1.7.6 =
 * WordPress 4.3 compatible
 * Added Arabic translation (Thanks Ahmad from http://www.ams.ly)
 * Updated some PHP-code
 * Prevent possible function collisions
 
= 1.7.5 =
 * Updated Norwegian translation (Thanks Mikael!)
 * Some improvements for English language
 * Synced .pot and .po files

= 1.7.4 =
 * WND-25: Send e-mailnotification to WordPress admin when a new name is submitted
 * Generated new .pot file and synced all .po files

= 1.7.3 =
 * Ordering enhancements
 * Generated new .pot file and synced all .po files

= 1.7.2 =
 * WND-32: Show X latest (most recent) names
 * Updated Dutch Translation

= 1.7.1 =
 * Added Norwegian translation thanks to Mikael
 * WND-31: Search for searchterm in description (but only if show_description is enabled)
 * Moved common code to helpers, preparing for better code

= 1.7 =
 * WND-11: Import names and descriptions by csv-upload, find this option at the manage-screen
 * WND-24: Toggle published-status for name (easily show or hide names)
 * Name in WordPress settings menu is now "Name Directory" instead of "Name Directory Plugin"
 * Extended FAQ
 * Code improvements
 * Updated Dutch Translation

= 1.6.16 =
 * WND-26 & WND-28: Honour the Show Description setting in frontend

= 1.6.15 =
 * Added little spacers in the admin on the Manage names screen
 * Every name on the front-end got an anchor name

= 1.6.14 =
 * Added new translation file
 * Updated Dutch translation

= 1.6.13 =
 * WND-23: New option to only show letters on the index when there are entries, so A B D E when there is no entry with C
 * Fixed small legacy db-convert bug
 * Gave the admin panel for directory settings some space

= 1.6.12 =
 * Expanded FAQ
 * Updated documentation / edited screenshots
 * Updated information displayed at the WordPress Plugin Repository page

= 1.6.11 =
 * Search URL's didn't function properly
 * Search argument didn't work together (selected name and input filter)
 * function didn't work when WordPress was running without SEO tools
 * URL improvements (also tested with Yoast SEO plugin)

= 1.6.10 =
 * URLencoded the # sign, so entries starting with a number will show up

= 1.6.9 =
 * WND-21: Checked translation strings. Also edited two fussy strings in the Dutch translation
 * WND-22: Fixed wp-admin paths for WP Multisite users

= 1.6.8 =
 * WND-17: Added option which let's the user choose a default starting-character when displaying the name directory. For example: use [namedirectory dir="X" start_with="j"] to start with the letter J.
 * WordPress 4.0 compatibility
 * Added Icon to the installer gallery

= 1.6.7 =
 * Updated Russion Translation (Thanks to: Rig Kruger http://rodichi.org)

= 1.6.6 =
 * Fixed small display bug

= 1.6.5 =
 * Showed submitted name

= 1.6.4 =
 * Updated French translations
 * Fixed too-many-slashes issue

= 1.6.3 =
 * Updated Dutch translations
 * Fixed display bug. 
 * The All-link is hidden when you a visitor HAS to choose a letter from the index

= 1.6 =
* Added option 'Show all names by default', this can be disabled to hide all entries if a user hasn't chosen a letter from the index.

= 1.5.2 =
* Fixed bug in CREATE TABLE and backlink in form, thank you very much MerlIAV for the patch!

= 1.5.1 =
* Fixed bug that prevent saving searchform preference in admin

= 1.5 =
* Added search box on front-end (You can enable this in the name-directory settings)
* Added support for four-column layout
* Added Russion Translation (Translated by: Rig Kruger http://rodichi.org)

= 1.4.3 =
* Fixed bug which allowed non-published items to be shown

= 1.4.2 = 
* Fixed support for Chinese characters
* Added French Translation (Translated by: Patrick BARDET http://www.web-studio-creation.fr)

= 1.4.1 = 
* Fixed sorting issue at the frontend

= 1.4 = 
* WND-19: Added support for HTML in the name description

= 1.3 =
* Name lists can now have multiple columns at the frontend
* Added css in a separate file
* Added database upgrade module

= 1.2.1 =
* Plugin url's are now compatible with third party SEO modules

= 1.2 =
* Added support for submission form on the front-end
* Added possibility for admin to filter on published/unpublished names
* Rearranged directory overview for admin, overview now shows totals for published/unpublished

= 1.1 =
* Added double name detection

= 1.0 | November 8, 2013 =
* First major public release

= 0.5 =
* First version for private use

