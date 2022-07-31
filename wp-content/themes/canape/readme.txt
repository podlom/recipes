=== Canape ===

Contributors: automattic
Tags: black, white, light, two-columns, right-sidebar, custom-colors, infinite-scroll, responsive-layout, site-logo, custom-menu, featured-images, full-width-template, rtl-language-support, translation-ready, blog, business, food, wedding, clean, elegant, sophisticated, traditional, testimonials

Requires at least: 4.0
Tested up to: 4.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Canapé is a bold and refined theme, designed for restaurants and food-related businesses seeking a classic, elegant look. The carefully crafted Menu Template takes care of showcasing your food and drink menu, while integration with the Open Table widget makes it easy for your guests to make online reservations.

With full-width featured images, a featured menu items section, and three widget areas, the Front Page Template provides ample opportunity to build a unique welcome page for your visitors.


== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

= How to setup the front page like the demo site? =

The demo site URL: http://canapedemo.wordpress.com/?demo

When you first activate Canapé, your homepage will display posts in a traditional blog format. If you’d like to use the Front Page Template instead, follow these steps:

1. Create or edit a page that will serve as your front page.
2. Go to Settings > Reading and set "Front page displays" to "A static page."
3. Select the page created in Step One as "Front page", and choose another page as "Posts page" to display your blog posts.

This theme doesn’t need a front-page template — just set a static page as your front page, and you’re good to go. Out of the box, the page displays a full-screen featured image and your page content.

The Front Page includes the following:

* A featured area with a full-width featured image and front page content below.
* A Featured Menu Section, which displays up to three featured items, configured under Customize > Theme Options > Front Page. These items are linked to specific Food Menu sections. Using this option requires creating a Food Menu first — see instructions below. For best results, images uploaded should already be cropped and uniform in size. Recommended width is 345px if you wish to display three items, or 590px each if displaying two items.
* A Testimonials area, configured under Customize > Testimonials, which displays three newest testimonials. To add a testimonial, go to Testimonials > Add New in your WP Admin dashboard. If no testimonials are added, this section will not be displayed. This section can also be disabled on the front page under Customize > Theme Options > Front Page.
* Three Front Page widget areas, displayed side-by-side in columns, managed under Customize > Widgets.

= Food Menus =

This feature requires Jetpack plugin (http://jetpack.me) with Custom Content Types module activated.

Add your delicious food menus all at once, or edit them on the fly by going to Food Menus in your WP Admin dashboard.Reorder the food menu items at any time. Changing the order of items in the menu is as easy as dragging and dropping them up and down.

After you’ve added food menu items, simply create a new page, and assign it the Menu Page Template. This page will display the whole menu and can be added to a Custom Menu using the Links Panel.

= Footer Area =

The footer area is divided into two sections:
* Footer branding displays the site title, tagline, and Social Links menu. This section can be hidden via Customize > Theme Options > Footer.
* Footer widget areas, managed under Customize > Widgets.

To set up a full-width background image behind the footer area, navigate to Customize > Theme Options > Footer, where you’ll have the option to upload your custom image and set the overlay opacity.

= I don't see the Testimonials menu in my admin, where can I find it? =

This feature requires Jetpack plugin (http://jetpack.me) with Custom Content Types module activated.

Once Jetpack is active, the Testimonials menu will appear in your admin, in addition to standard blog posts. Testimonials will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

Canapé features Testimonials in two ways:

* The dedicated testimonial archive page displays all testimonials in reverse chronological order, with the newest displayed first. Your testimonial archive page can be found at http://yourgroovysite.wordpress.com/testimonial/
* The Front Page displays three newest testimonials.

To add a testimonial, go to Testimonials > Add New in your dashboard. Testimonials are composed of the testimonial text, and the name of the customer (added as testimonial title).


== Quick Specs (all measurements in pixels) ==

	1. The main column width is 620, except in the full-width layout where it’s 765.
	2. A widget in the sidebar is 250.
	3. A widget in the Footer Widget Area or Front Page Widget Area is 280.
	4. The featured image on the front page and on pages works best with images at least 1180 wide.
	5. Featured Images for posts should be at least 765 wide.
	6. The Site Logo is a maximum of 100 high.

== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Screenshot images licensed under CC0 Public Domain (http://creativecommons.org/publicdomain/zero/1.0/deed.en):
** https://pixabay.com/en/food-restaurant-dining-dine-plate-918743/ by Unsplash
** https://pixabay.com/en/mozzarella-tomatoes-food-italian-918909/ by Unsplash
** https://pixabay.com/en/tortelloni-pasta-tortellini-food-646680/ by AlexNut
** https://pixabay.com/en/waffle-dessert-maple-syrup-969794/ by TapisRouge

== Licensing ==

Canapé WordPress theme, Copyright 2016 Automattic
Distributed under the GNU GPL

Canapé WordPress theme bundles the following third-party resources:

jQuery Cycle2 script, Copyright 2014 M. Alsup
Dual licensed: MIT/GPL
Source: http://jquery.malsup.com/cycle2/

Genericons icon font, Copyright 2016 Automattic
Licensed under the terms of the GNU GPL, Version 2 (or later)
Source: http://www.genericons.com


== Changelog ==

= 2 March 2018 =
* Use wp_kses_post rather than wp_filter_post_kses.

= 21 November 2017 =
* Separating out flexslider function and loading it separately, and only on the static front page. Originally the theme was only loading the library there, but trying to fire the flexslider event on other pages, causing JavaScript errors.

= 29 September 2017 =
* Fix padding on inputs for OpenTable widget which was hiding the input text.
* Update version number in preparation for .org submission.

= 27 September 2017 =
* Better and more consistent styles for single menu items across browsers.

= 19 September 2017 =
* Update testimonials to use flexslider instead of jQuery cycle, to prevent it from clashing with the slideshow in Jetpack when used on the front page.
* Revert testimonial update, as it didn't take into account featured images.
* Update testimonials to use flexslider instead of jQuery cycle, to prevent it from clashing with the slideshow in Jetpack when used on the front page.

= 1 September 2017 =
* Remove list-style from menu sub-items.

= 20 July 2017 =
* Add headings in Open Table widget to font annotations, so that they size properly when custom fonts are used.
* Set max-width on Open Table widget when placed in front page widget area.

= 27 June 2017 =
* Removing top border from icons in the Jetpack Social Icons widget.
* Fixes Eventbrite widget event title color to match the theme's link color

= 8 June 2017 =
* Fixing visual issues with nested lists in text widget.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 6 March 2017 =
* Add Headstart annotation.

= 9 February 2017 =
* Make infinite scroll support rules more specific, to include only archives or the blog, as this was adding IS support to individual pages and other templates.

= 2 February 2017 =
* Add forgotten context and gettext function around comma separators for translators.

= 1 February 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 15 September 2016 =
* Remove border from social media widget in the footer.

= 9 September 2016 =
* Fix for broken lightbox behavior in OpenTable widget; props to @aduthie7 for the patch!

= 20 July 2016 =
* Use em instead of px for the overlay.
* New effect for the menu images on the front page to avoid text resize and flashes.

= 14 June 2016 =
* Only load the Cycle2 plugin on the front page if specific conditions are met: Testimonials are enabled, there are testimonials to display, and it's not the blog page.

= 12 May 2016 =
* Add new classic-menu tag.

= 22 April 2016 =
* Add testimonials tag to style.css and readme.txt.
* Update Copyright
* Define background image of the hero section just before it's used

= 21 March 2016 =
* Update readme.txt and version number
* Increase testimonial slide time to six seconds

= 9 March 2016 =
* Disable Infinite Scroll from menu CPT archive, and show all menu item instead.

= 23 February 2016 =
* Fix typo in testimonials fallback message;

= 18 February 2016 =
* Fix for fatal error when menu term does not exist.

= 5 February 2016 =
* Make sure long one-word titles don't obscure the menu button on mobile.

= 21 January 2016 =
* Update .site-main ID to make sure it's not being duplicated.

= 6 January 2016 =
* Adding .bypostauthor class as per Theme Check requirements.

= 4 January 2016 =
* Adding proper escaping for terms.

= 23 December 2015 =
* fix SVN properties.

= 22 December 2015 =
* Add 'empty' class to the pe-footer area, to hide it completely  when empty.
* Food menus - centering single item in a section; Adjusting top padding of the content;

= 18 December 2015 =
* Add theme description in the stylesheet; Fix trnasitions not working in FireFox; Tweaking styling of Follow Blog widget; Adding a post_type_exists check in Customizer to prevent errors on self-hosted sites without Jetpack enabled.
* Adding readme.txt; Adding theme tags to stylesheet header.
* Updating screenshot.
* Correct a typo in post type name, which prevented Testimonials from displaying on the front page.
* Fix links to Food Menu Sections in Customizer; Correct link output in 'No testimonials found' message on the front page; Swap esc_attr_e function for esc_attr where appropriate.

= 16 December 2015 =
* Adding conditional checks to see if food menu post type exists; Minor style adjustments.
* Minor spacing adjustments throughout.

= 15 December 2015 =
* Restoring some of the styles removed in previous commit.
* Moving away from the idea of table layout for food menus; Adjusting horizontal padding on mobile.

= 14 December 2015 =
* Removing support for custom background.
* Tweaks to front page featured menu sections - display term description only when it's not empty; Added function to truncate the description, so that it doesn't overflow the container on the front page.
* Remove canape_page_menu_args function, since the theme doesn't use wp_page_menu as fallback; Optimize the thumbnail resize function - call only when element exists;
* Added handling of front page featured menu section on touch devices; Calculate the height of front page featured menu sections w/o a thumbnail; Added missing font declaration found while doing font annotations;

= 12 December 2015 =
* Adding proper theme screenshot.
* Tinkering with featured menu sections on the front page.
* Adding RTL styles.
* Adjusting navigation script, since menu-toggle button has been moved in HTML.
* Fixed main menu on mobile; Lots of spacing tweaks to footer widget area.

= 9 December 2015 =
* Minor

= 8 December 2015 =
* Adding links to Food Menu Sections under Customizer controls.
* Adding Customizer options for footer sidebar background image and opacity. Minor
* Testimonials fine tuning. Indentation

= 7 December 2015 =
* Visual tweaks to author grid and milestone widgets.
* Small visual tweaks to front page menu section.
* Changing text-domain in Open Table widget.
* Switching to table layout for food menu archives.

= 26 November 2015 =
* Remove fallback to all-pages menu in main mavigation; Various CSS tweaks.
* Replacing underline on link hover with border bottom.
* Removing the default value for image inputs in customizer.

= 25 November 2015 =
* Adding missing escaping;

= 14 November 2015 =
* Open Table widget styling;
* Adding support for Open Table widget;
* Adding Open Table widget; Minor CSS tweaks;
* Adjustments for mobile - adjust vertical spacing on menu page template, move branding in the footer above the widgets on tablets in portrait mode; .com specific widget styling adjustments;

= 13 November 2015 =
* Code tweaks throught suggested by Code sniffer;
* More fixes for visual issue in Menu taxonomy archive;
* Fixes for visual issue in Menu taxonomy archive;
* Removing custom-header.php file since it's not supported in Canape;
* Fix inconsistent default value for featured menu items in Customizer;
* Customizer tweaks;
* Remove unsupported post formats; Changing sidebar IDs to fill the gap after removal of one footer widget area;
* Don't display empty div if menu item content is empty;
* Testimonials styling;

= 12 November 2015 =
* Removing 3rd footer widget area, as it feels too crowded;
* Adding support for site logo;
* Last round of fiddling with the menu display; Modified conditional check to enqueue cycle plugin on the front page (was broken for a while because of the switch away from custom front page template);
* Fiddling with menu styles - removing border & centering last element; Fixing broken testimonials slider on the front page;
* Small tweaks to meu page template;

= 10 November 2015 =
* Removing custom front page template; Fixing hero images on pages, switching to full size image;
* Switching to front-page.php instead of custom front page template; Tweaks for front page featured menu items and widgets sections;
* Minor visual tweaks to sub-menus; Removing image size for hero image, in an attempt to prevent blurry bg images;

= 9 November 2015 =
* Changing crop mode for hero thumbnail; Removing unused image size; Adjusting content width;
* Tweaks to No Testimonials Found message on the front page;
* Removing conditional check to display site title & description in footer even if no widgets are added to any of the footer widget areas;
* Adding wpcom.php;
* Navigation improvements - added arrows to indincate sub-menus, fixed animation of 2-nd level sub-menus, removed border aroud menu-toggle button;

= 6 November 2015 =
* Fixing typo in font name;
* Adding hero image element to properly display hero area;
* Add to .ignore file;
* Updating image size to correct value;
* Move to pub;
