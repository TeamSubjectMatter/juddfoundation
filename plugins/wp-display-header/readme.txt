=== WP Display Header ===
Contributors: obenland
Tags: admin, custom header, header, header image, custom header image, display header, display dynamic header, custom, dynamic, fast, header, image, images, page, plugin, posts
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MWUA92KA2TL6Q
Requires at least: 3.2
Tested up to: 4.4.0
Stable tag: 3

Select a specific header or random header image for each content item or archive page.

== Description ==

This plugin lets you specify a header image for each post, page, custom post type or archive page individually, from your default headers and custom headers.

It adds a meta box in the post edit screens with the header selection and a settings field in the edit profile and each taxonomy edit screen.
If no specific header is specified for a post it will fall back to the default selection.
There is no change of template files necessary as this plugin hooks in the existing WordPress API to unfold its magic.


= Translations =
I will be more than happy to update the plugin with new locales, as soon as I receive them!
Currently available in:

* English
* Deutsch
* Italiano

Thanks to Erik T. for the idea to this plugin!

== Installation ==

1. Download WP Display Header.
2. Unzip the folder into the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress


== Frequently Asked Questions ==

= What do I need in the `header.php` file to make the plugin work seamlessly? =
To make it work in your `header.php` file all you need is a `header_image()` call like so:

`<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />`

See TwentyTwelve's `header.php` for reference.


= Plugin Filter Hooks =

**wpdh_show_default_header** (*bool*)
> Whether to show the default header (true) or to look for a specifically selected header for the current request.

**wpdh_get_header_posts** (*array*)
> All attachments with the meta key `_header_image`. An array with the query vars.

**wpdh_get_headers** (*array*)
> The array with all registered headers.

**wpdh_get_active_post_header** (*string*)
> The url to the currently active header image.


== Screenshots ==

1. The meta box in the main column.
2. The meta box in the side column.


== Changelog ==

= 3 =
* Maintenance release.
* Some minor code cleanups.
* Tested for WordPress 4.4.0.

= 2.2.0 =
* Maintenance release.
* Some minor code cleanups.
* Tested for WordPress 4.0.

= 2.1.0 =
* Added an option to not display a header at all.
* Updated utility class.
* Tested for WordPress 3.6.

= 2.0.1 =
* Fixed a bug, where the fallback to the default header did not work. Props carloscorrela.

= 2.0.0 =
* **IMPORTANT**: Version 2.0.0 breaks compatibility with WordPress versions **prior** to 3.2!
* Added the header selection field to Taxonomy and Author Edit screens.
* Fixed a minor bug for themes that have no header images registered.

= 1.5.3 =
* Improved user experience when current theme does not support custom headers, on activation of the plugin.
* Deprecated settings functions for WP Save Custom Header in preparation for overhaul in v2.0.0.
* Updated utility class.

= 1.5.2 =
* Fixed a bug, where a selected header wouldn't override the default selection on posts pages.

= 1.5.1 =
* Specific headers can now be reverted by selecting the default header.

= 1.5 =
* Adjusted meta box layout to WordPress core.
* Transfered CSS in external file.
* Updated FAQ section. Props Brian.
* Tested for WordPress 3.3.1.

= 1.4 =
* Added support for WordPress 3.2 core header uploads.

= 1.3 =
* Tested for WordPress 3.2-beta
* Fixed a minor bug where a PHP warning was issued in the edit-post-screen, when there are no header images registered.

= 1.2.1 =
* WordPress Plugin Repository update bug.

= 1.2 =
* Tested for WordPress 3.1.2.
* Now a custom folder name can be specified. See: Settings > Media.
* Added Italian translation. Props Pietro Rossi.

= 1.1 =
* Tested for WordPress 3.1.1
* Adopted [WP Save Custom Header](http://wordpress.org/extend/plugins/wp-save-custom-header/ "This plugin lets you save and reuse your uploaded header images.") multisite capability.
* Made HTML W3C valid.

= 1.0 =
* Initial Release.

== Upgrade Notice ==
Maintenance update