<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.efficiencyofmovement.com
 * @since      1.0.0
 *
 * @package    Eom_Designate_Primary_Post_Category
 * @subpackage Eom_Designate_Primary_Post_Category/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eom_Designate_Primary_Post_Category
 * @subpackage Eom_Designate_Primary_Post_Category/admin
 * @author     Josh Smith <joshsmith01.contact@gmail.com>
 */
class Eom_Designate_Primary_Post_Category_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }

    /**
     * Swap out the default categories meta box with this plugin's version
     * Remove the Screen Options for the core Categories option
     * Remove the Yoast Primary terms if the Yoast SEO plugin is activated
     *
     * @since 1.0.0
     */
    public function primary_category_meta_box_add() {
        global $wp_meta_boxes;

        $args = array(
            'public' => true,
            '_builtin' => false,
        );

        // Get all of the registered post types and add the built in 'post' to the array
        $post_types = array_merge( get_post_types( $args ), array( 'post' => 'post' ) );

        // Loop through the post type array and update
        foreach ( $post_types as $post_type ) {
            unset( $wp_meta_boxes[ $post_type ]['side']['core']['categorydiv'] );
            remove_meta_box( 'categorydiv', $post_type, 'core' );
            add_meta_box( 'primary-category', 'Categories', [
                $this,
                'primary_category_meta_box'
            ], $post_type, 'side',
                'default' );
        }

        add_filter( 'wpseo_primary_term_taxonomies', '__return_empty_array' );

    }

    /**
     * Create a dropdown of the currently selected categories
     *
     * @param $post
     */
    public function primary_category_meta_box( $post ) {
        // Display the core Categories
        post_categories_meta_box( $post, array() );

        // Get the value of the primary category key for comparison later
        $value = get_post_meta( $post->ID, '_primary_category', true );
        ?>

        <label for="primary-category-select"><?php _e( 'Primary Category', 'eom-designate-primary-post-category' ); ?>
            <select id="primary-category-select" class="components-select-control__input
            widefat" name="primary-category">
                <option
                        value=""><?php _e( 'No Primary Category', 'eom-designate-primary-post-category' ); ?>
                </option>
                <?php $categories = get_the_category( $post->ID );
                foreach ( $categories as $cat ) { ?>
                    <option
                        <?php
                        selected( $value, $cat->name, true ); ?>
                            value="<?php echo esc_attr( $cat->name ); ?>"><?php echo esc_html( $cat->name ); ?>
                    </option>
                <?php } ?>
            </select>
        </label>

        <?php
    }

    /**
     * Save the primary category to the post's meta data if a primary category is selected
     *
     * @param $post_id
     */
    public function primary_category_save_postdata( $post_id ) {
        if ( array_key_exists( 'primary-category', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_primary_category',
                $_POST['primary-category']
            );
        }
    }


    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eom-designate-primary-post-category-admin.js', array( 'jquery' ), $this->version, false );

    }

}
