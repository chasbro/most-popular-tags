=== Most Popular Tags ===
Contributors: maxpagels
Tags: widgets, tags, categories, popular, tagcloud
Requires at least: 2.9
Tested up to: 4.2.3
Stable tag: trunk

Most Popular Tags is a plugin that displays your WordPress site's most popular tags, categories and custom taxonomies as a sidebar widget.

== Description ==

Most Popular Tags is a WordPress plugin that allows you to display your blog's most popular tags or categories as a sidebar widget. The plugin takes advantage of the new Widget API introduced in WordPress 2.8, allowing multiple instances of the same widget, each with it's own unique configuration. You can specify how many tags/categories/link categories to show, the size of the smallest and largest ones, which unit and format to use as well as advanced ordering options.

== Installation ==

1. Upload `mostpopulartags.php` to the `/wp-content/plugins/` directory of your WordPress installation
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The Most Popular Tags widget can now be configured and used from the Appearance -> Widgets menu
4. If you want to embed a tag cloud in your posts or pages, use the [tagcloud] shortcode. See http://www.maxpagels.com/?p=6431 for detailed instructions

== Screenshots ==
1. Widget configuration

== Changelog ==

- 5.1: Hooray, no more PHP notices!
- 5.0: Added support for custom taxonomies. Thanks to everyone who requested it (and sorry for the delay!)
- 4.1: Added the option to use CSS viewport width/height (vw/vh) units
- 4.0: Added the option to include or exclude certain tags from the tag cloud / list. Sorry for the delay, I know this has been requested for ages!
- 3.2.3: No structural changes, just some code cleanup
- 3.2.0: Added the option to use CSS x-height (ex) units
- 3.1.0: Added the [tagcloud] shortcode, making it easy to embed tag clouds in posts and pages, not just as a widget.
- 3.0.0: Fixed bug where decimal unit sizes could not be added, added support for the Root em unit
- 2.86: Improved code formatting and minor code performance upgrades
- 2.85: Added the option to display link categories in addition to regular categories and tags
- 2.8: Added the option to choose a separator (when format is "flat") and a new "random" order option. Additionally, the plugin now displays all tags/categories by default, not 10. The 2.8 version requires WordPress 2.9 or higher.
- 2.6.1: Fixed a bug that appeared in some environments
- 2.6: The different unit options were causing some confusion, so a link to the W3Schools CSS unit reference has been added to the widget configuration view
- 2.5: Added a nifty uninstaller that removes all traces of the plugin when it's deleted via the Manage Plugins menu
- 2.0.1: Readme.txt spelling corrections
- 2.0: Added the option to display categories in addition to tags
- 1.1: Added millimeters, centimeters, inches and picas to the font unit menu. Additionally, all of the settings have been updated with more descriptive text.
