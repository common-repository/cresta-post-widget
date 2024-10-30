=== Cresta Post Widget FREE ===
Contributors: crestaproject
Donate link: http://crestaproject.com/downloads/cresta-post-widget/
Tags: recent, random, post, wordpress, plugin, thumbnails, widget, recent posts, random posts
Requires at least: 2.8
Tested up to: 3.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Widget for show all posts or filter by category. Many options available including show thumbnail, excerpt, date and comments count.

== Description ==

<p>FREE Crest Posts Widget is a simple but powerful Wordpress Widget which displays your posts with thumbnail and many other options like the ability to show the date, the number of comments, to change the length of the excerpt, change the size of thumbnails and much more.</p>

<strong>Some features</strong>:
<ul>
	<li>Easy to use interface</li>
	<li>Change post title heading tag</li>
	<li>Display the date</li>
	<li>Display the comments count</li>
	<li>Choose thumbnail size</li>
	<li>Choose excerpt lenght</li>
	<li>Order posts by date, title, comment count and random</li>
	<li>Filter posts by category</li>
</ul>

<p>
<strong>Plugin Homepage</strong><br />
http://crestaproject.com/downloads/cresta-post-widget/
</p>

== Installation ==

1. Upload the folder 'cresta-post-widget' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In the Widgets section create a new 'Cresta Post Widget FREE' widget

== Frequently Asked Questions ==

= Where can I change the image size? =

The image sizes are definied in the Media Settings of Wordpress options. The default are:
<ul>
<li>Thumbnail 150px x 150px max</li>
<li>Medium 300px x 300px max</li>
<li>Large 640px x 640px max</li>
</ul>
You can change the image size directly from Wordpress Media Settings.

= How can I change the styles? = 

You can define the stylesheet in your style.css file (located in <i>wp-content/themes/your-theme/style.css</i>), the widget has its own CSS classes (<i>you can see it with Firebug, Web Inspector, Dragonfly or tools like that</i>).
For example if you want to change the position of thumbnail you can define a class like:

`
.cresta-post-widget img {
	margin: 0 auto;
	display: block;
}
`

Or if you want to change some options of the post title (<i>H3 is the default post title heading tag, but it can be changed from the widget settings</i>):

`
.cresta-post-widget h3 {
	text-transform: uppercase;
	text-decoration: underline;
}
`

= Can I change the date format? =
The date format is taken directly from the Wordpress General Settings. To change it just go to Wordpress Main Menu -> Settings -> General -> Date Format

== Screenshots ==

1. The widget options
2. Example of Cresta Post Widget FREE on Semplicemente Theme
3. Example of Cresta Post Widget FREE on Twenty Fourteen Theme


== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
This is the first version of the plugin
