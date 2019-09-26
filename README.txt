=== EOM Designate Primary Post Category ===
Contributors: joshsmith01
Donate link: https://www.efficiencyofmovement.com
Tags: comments, category, primary
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Designate a primary category for posts.

== Description ==

Enhance post category taxonomies with a primary category. Use this plugin to add a dropdown of categories to the
Categories meta box in the Post edit screen. Content creators can determine the primary category from that dropdown list
.
This is the long description.  No limit, and you can use Markdown (as well as in the following sections).

For backwards compatibility, if this section is missing, the full length of the short description will be used, and
Markdown parsed.

A few notes about the sections above:

*   "Contributors" is a comma separated list of wp.org/wp-plugins.org usernames
*   "Tags" is a comma separated list of tags that apply to the plugin
*   "Requires at least" is the lowest version that the plugin will work on
*   "Tested up to" is the highest version that you've *successfully used to test the plugin*. Note that it might work on
higher versions... this is just the highest one you've verified.
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.

    Note that the `readme.txt` of the stable tag is the one that is considered the defining one for the plugin, so
if the `/trunk/readme.txt` file says that the stable tag is `4.3`, then it is `/tags/4.3/readme.txt` that'll be used
for displaying information about the plugin.  In this situation, the only thing considered from the trunk `readme.txt`
is the stable tag pointer.  Thus, if you develop in trunk, you can update the trunk `readme.txt` to reflect changes in
your in-development version, without having that information incorrectly disclosed about the current stable version
that lacks those changes -- as long as the trunk's `readme.txt` points to the correct stable tag.

    If no stable tag is provided, it is assumed that trunk is stable, but you should specify "trunk" if that's where
you put the stable version, in order to eliminate any doubt.

== Installation ==

#### Download
1. Visit the homepage for this plugin: https://github.com/joshsmith01/eom-designate-primary-post-category
2. Download the .zip file
3. Unzip the .zip to you computer
4. Upload `eom-designate-primary-post-category.php` to the `/wp-content/plugins/` directory
5. Activate the plugin through the 'Plugins' menu in WordPress

#### Git
1. Open a terminal and navigate to the `wp-content/plugins` directory
2. Clone the repo: `git clone git@github.com:joshsmith01/eom-designate-primary-post-category.git`

== Frequently Asked Questions ==

= Will I lose my categories if I stop using this plugin? =

No, this plugin essentially duplicates the existing categories meta data and adds a primary category to it.
If you delete this plugin, all of the categories will remain.

== Changelog ==

= 1.0.0 =
* Initial launch

== Query for posts with a Primary Category ==

Now that you have a Primary Category attached to your posts you will want to query for posts based on their Primary Category. Below is a quick snippet that uses the built-in WordPress Query to retrieve posts with the Primary Category of your specification. The important part of the query is the supplied arguments that use the Meta Key of `_primary_category`.

In the snippet below, the `meta_value` of "Happy" is supplied, but it should be whatever value of your Primary Category is that you want to display. The snippet below is also searching in the WordPress post type of "post", but also the WordPress Custom Post type of "book".

Find more information about querying by [Post Meta in the WordPress Developer Documentation](https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters).

Don't forget to check if the plugin is active first.
```php
<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'eom-designate-primary-post-category/eom-designate-primary-post-category.php' ) ) {
    // EOM designate Primary Post Category is active
    $args = array(
        'meta_value' => 'Happy',
        'meta_key' => '_primary_category',
        'post_type'  => array('book', 'post'),
    );
    $query = new WP_Query( $args );
}
```

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
