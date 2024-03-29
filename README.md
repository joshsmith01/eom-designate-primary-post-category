# EOM Designate Primary Post Category #
Contributors: joshsmith01<br />
Donate link: https://www.efficiencyofmovement.com<br />
Tags: comments, category, primary<br />
Requires at least: 3.0.1<br />
Tested up to: 3.4<br />
Stable tag: trunk<br />
License: GPLv2 or later<br />
License URI: http://www.gnu.org/licenses/gpl-2.0.html<br />


Designate a primary category for posts.
## Description ##

Enhance post categories by adding a primary category. Use this plugin to add a dropdown of categories to the
Categories meta box in the Post edit screen. Content creators can determine the primary category from that dropdown list.

## Installation ##

#### Download
1. Visit the homepage for this plugin: https://github.com/joshsmith01/eom-designate-primary-post-category
2. Download the .zip file
3. Unzip the .zip to you computer
4. Upload `eom-designate-primary-post-category.php` to the `/wp-content/plugins/` directory
5. Activate the plugin through the 'Plugins' menu in WordPress

#### Git
1. Open a terminal and navigate to the `wp-content/plugins` directory
2. Clone the repo: `git clone git@github.com:joshsmith01/eom-designate-primary-post-category.git`


## Frequently Asked Questions ##
### Will I lose my categories if I stop using this plugin? ###

No, this plugin essentially duplicates the existing categories meta data and adds a primary category to it.
If you delete this plugin, all of the categories will remain.

## Changelog ##

### 1.0.0 ###
* Initial launch


## Query for posts with a Primary Category ##

Now that you have a Primary Category attached to your posts you will want to query for posts based on their Primary Category. Below is a quick snippet that uses the built-in WordPress Query to retrieve posts with the Primary Category of your specification. The important part of the query is the supplied arguments that use the Meta Key of `_primary_category`.
 
In the snippet below, the `meta_value` of "Happy" is supplied, but it should be whatever value of your Primary Category is that you want to display. The snippet below is also searching in the WordPress post type of "post", but also the WordPress Custom Post type of "book".

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

Find more information about querying by [Post Meta in the WordPress Developer Documentation](https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters).

## A brief Markdown Example ##

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
