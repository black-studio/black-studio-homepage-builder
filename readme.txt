=== Black Studio Homepage Builder for Genesis ===
Contributors: black-studio, marcochiesi, thedarkmist
Donate link: https://www.blackstudio.it/en/wordpress-plugins/black-studio-homepage-builder/ 
Tags: genesis, home, homepage, home page, front page, front page, siteorigin, page builder, responsive
Requires at least: 4.0
Tested up to: 6.0
Stable tag: 1.0.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

Customize the home page of Genesis framework child themes using Page Builder by SiteOrigin.

== Description ==

The Genesis framework by StudioPress is the leading WordPress theme framework on the market. Unfortunately most of the available child themes have a prebuilt layout for the home page, that can't be easily customized, unless you are a developer, as it requires dealing with templates, hooks, etc.
On the other side Page Builder by SiteOrigin is a plugin that allows you to create responsive page layouts using widgets with simple drag and drop operations.
You may combine Genesis and Page Builder to build a flexible layout for your home page. To do so you have to configure a static page in your WordPress `Reading` Settings and build that page using Page Builder, but there are still some caveats when doing this, related to how Genesis handles static pages (page title, layout, styles, etc).
This plugin fills the gap between Genesis themes and Page Builder, providing a quick and ready-made solution to let the two play nicely together.

In particular this plugin does the following:

* Adds the Page Builder support to the current theme
* Adds the `Home Page` menu under `Appearance` in WordPress dashboard
* Forces the Genesis full width layout for the front page
* Replaces Genesis child theme loop with the page content generated with Page Builder
* Allows you to control some CSS variations to adjust layout in specific use cases
* Supports both Genesis XHTML and HTML5 child themes

= Requirements =

* A child theme based on the [Genesis framework by StudioPress](https://www.studiopress.com/)
* [Page Builder by SiteOrigin](https://wordpress.org/plugins/siteorigin-panels/) plugin

= Recommended additional plugins to use =

* [Black Studio TinyMCE Widget](https://wordpress.org/plugins/black-studio-tinymce-widget/)
* [SiteOrigin Widgets Bundle](https://wordpress.org/plugins/so-widgets-bundle/)
* [Genesis Sandbox Featured Content Widget](https://wordpress.org/plugins/genesis-featured-content-widget/)

= Links =

* [Black Studio web site](https://www.blackstudio.it/en/)
* [FAQ](https://wordpress.org/plugins/black-studio-homepage-builder/faq/)
* [Support forum](https://wordpress.org/support/plugin/black-studio-homepage-builder)
* Follow us on [Twitter](https://twitter.com/blackstudioita), [Facebook](https://www.facebook.com/blackstudiocomunicazione), [LinkedIn](https://www.linkedin.com/company/black-studio) and [GitHub](https://github.com/black-studio)

= Get involved =

* Developers can contribute to the source code on our [GitHub repository](https://github.com/black-studio/black-studio-homepage-builder).
* Users can contribute by leaving a 5 stars [review](https://wordpress.org/support/view/plugin-reviews/black-studio-homepage-builder#postform) or making a [donation](https://www.blackstudio.it/en/wordpress-plugins/black-studio-homepage-builder/).

== Installation ==

This section describes how to install and use the plugin.

1. Before installing the plugin please ensure that you are using a Genesis child theme and that you activated the Page Builder plugin.
2. You may install the plugin directly from your WordPress dasboard. Go to `Plugins` => `Add New` and search for `Black Studio Homepage Builder`. Alternatively you may download the ZIP package and upload it using the `Upload Plugin` button in the same screen. You may also upload the files using FTP, just ensure that the entire `black-studio-homepage-builder` folder is copied into the `/wp-content/plugins/` directory).
3. Activate the plugin.
4. In order to use the plugin, go to `Appearance` => `Home Page` in your WordPress dashboard.
5. Switch on the Custom Home Page and start to build your new home page, either from scratch or from one of the prebuilt layouts available in Page Builder. For further information about the usage, please refer to [Page Builder](https://wordpress.org/plugins/siteorigin-panels/) documentation.
6. If necessary adjust a few styling options at the bottom of the same screen.

== Screenshots ==

1. Admin screen for Custom Home Page
2. Front page sample made with Magazine child theme (XHTML) and a prebuilt layout by Page builder
3. Front page sample made with Centric child theme (HTML5) and a prebuilt layout by Page builder

== Frequently Asked Questions ==

No FAQ at this time. Please post your questions and issues to our [support forum](https://wordpress.org/support/plugin/black-studio-homepage-builder).

== Changelog ==

= 1.0.3 (2022-07-01) =
* Maintenance release

= 1.0.2 (2017-11-06) =
* Maintenance release to avoid the plugin marked as not up to date
* Updated documentation and translations

= 1.0.1 (2015-12-15) =
* Added support for child theme with custom home `genesis_loop` replacement

= 1.0.0 (2015-11-21) =
* First release
