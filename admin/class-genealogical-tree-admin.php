<?php

namespace Genealogical_Tree\Genealogical_Tree_Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/genealogical-tree
 * @since      1.0.0
 *
 * @package    Genealogical_Tree
 * @subpackage Genealogical_Tree/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Genealogical_Tree
 * @subpackage Genealogical_Tree/admin
 * @author     ak devs <akdevs.fr@gmail.com>
 */
class Genealogical_Tree_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private  $plugin_name ;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Genealogical_Tree_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Genealogical_Tree_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/genealogical-tree-admin.css',
            array(),
            $this->version,
            'all'
        );
    }
    
    /**
     * Register theavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Genealogical_Tree_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Genealogical_Tree_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/genealogical-tree-admin.js',
            array( 'jquery' ),
            $this->version,
            false
        );
    }
    
    /**
     * Register theavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function admin_menu()
    {
        add_menu_page(
            __( 'Genealogical Tree', 'genealogical-tree' ),
            __( 'Genealogical Tree', 'genealogical-tree' ),
            'manage_options',
            'genealogical-tree',
            array( $this, 'genealogical_tree_page' ),
            'dashicons-groups',
            40
        );
        add_submenu_page(
            'genealogical-tree',
            __( 'Add New', 'genealogical-tree' ),
            __( 'Add New', 'genealogical-tree' ),
            'manage_options',
            'post-new.php?post_type=gt-member'
        );
        add_submenu_page(
            'genealogical-tree',
            __( 'Family Groups', 'genealogical-tree' ),
            __( 'Family Groups', 'genealogical-tree' ),
            'manage_categories',
            'edit-tags.php?taxonomy=gt-family-group&post_type=gt-member'
        );
        add_submenu_page(
            'genealogical-tree',
            __( 'How It Work!', 'genealogical-tree' ),
            __( 'How It Work', 'genealogical-tree' ),
            'manage_options',
            'genealogical-tree',
            array( $this, 'genealogical_tree_page' )
        );
    }
    
    /**
     * View for How It Work page.
     *
     * @since    1.0.0
     */
    public function genealogical_tree_page()
    {
        //$active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : '';
        //$active_section = isset( $_GET[ 'section' ] ) ? sanitize_text_field($_GET[ 'section' ]) : '';
        //require_once plugin_dir_path( __FILE__ ) . 'partials/genealogical-tree-admin-settings.php';
        ?>
		<div class="wrap">
			<h2>How It Work</h2>
			<div class="error">
				<p>If you had older version, <strong>Members</strong> and <strong>Family Groups</strong> may hide. Dont worry about that. We have already a script to fix that. Contact us <a href="<?php 
        echo  site_url() ;
        ?>/wp-admin/admin.php?page=genealogical-tree-contact">here</a> </p>
			</div>
			<h3>1. Create a family group</h3>
			<p style="max-width: 800px;">On create a new family group, system will create 3 new pages for Tree list page, Tree page and Members page with shortcode. You can create a family group from here (<a href="<?php 
        echo  plugin_dir_url( __FILE__ ) ;
        ?>img/fg1.jpg">fig:1</a>).</p>
			<h3>2. Create members</h3>
			<p style="max-width: 800px;">Once you create a family group, you can add member now (<a href="<?php 
        echo  plugin_dir_url( __FILE__ ) ;
        ?>img/fg2.jpg">fig:2</a>), you need to select a family group. (<a href="<?php 
        echo  plugin_dir_url( __FILE__ ) ;
        ?>img/fg3.jpg">fig: 3</a>) (You will able to create member without family group). Add more related member whih same family group and make sure gender and relationship selection is correct (like father, mother, spouse)</p>
			<h3>3. Start playing !</h3>
			<p style="max-width: 800px;">All done now. You can check pages now. You will find pages in Pages area. Or you can find it specifically here (<a href="<?php 
        echo  plugin_dir_url( __FILE__ ) ;
        ?>img/fg4.jpg">fig:4</a>) on family group page. </p>
			<h3># Need Help?</h3>
			<p style="max-width: 800px;"> To get any help contact us <a href="<?php 
        echo  site_url() ;
        ?>/wp-admin/admin.php?page=genealogical-tree-contact">here</a> or can post query here <a href="https://wordpress.org/support/plugin/genealogical-tree/">Support »  Genealogical Tree</a>. It will be pleasure for me to assist you. </p>
			<?php 
        
        if ( gt_fs()->is_not_paying() ) {
            ?>
			<h3># Want premium features?</h3>
			<a class="button button-primary" href="<?php 
            echo  gt_fs()->get_upgrade_url() ;
            ?>">Get Pro Version</a>
			<?php 
        }
        
        ?>
		</div>
		<?php 
        /*
        global $wpdb;
        $results = $wpdb->get_results("UPDATE  `wp_term_taxonomy` SET  `taxonomy` =  'gt-family-group' WHERE  `taxonomy` = 'family_group'");
        $results = $wpdb->get_results("UPDATE  `wp_posts` SET  `post_type` =  'gt-member' WHERE  `post_type` = 'member'");
        $results = $wpdb->get_results("UPDATE  `wp_posts` SET  `post_type` =  'gt-family' WHERE  `post_type` = 'family'");
        */
    }
    
    /**
     * Register post type and taxonomy.
     *
     * @since    1.0.0
     */
    public function init_post_type_and_taxonomy()
    {
        $labels = array(
            'name'               => _x( 'Members', 'post type general name', 'genealogical-tree' ),
            'singular_name'      => _x( 'Member', 'post type singular name', 'genealogical-tree' ),
            'menu_name'          => _x( 'Members', 'admin menu', 'genealogical-tree' ),
            'name_admin_bar'     => _x( 'Member', 'add new on admin bar', 'genealogical-tree' ),
            'add_new'            => _x( 'Add New', 'member', 'genealogical-tree' ),
            'add_new_item'       => __( 'Add New Member', 'genealogical-tree' ),
            'new_item'           => __( 'New Member', 'genealogical-tree' ),
            'edit_item'          => __( 'Edit Member', 'genealogical-tree' ),
            'view_item'          => __( 'View Member', 'genealogical-tree' ),
            'all_items'          => __( 'All Members', 'genealogical-tree' ),
            'search_items'       => __( 'Search Members', 'genealogical-tree' ),
            'parent_item_colon'  => __( 'Parent Members:', 'genealogical-tree' ),
            'not_found'          => __( 'No members found.', 'genealogical-tree' ),
            'not_found_in_trash' => __( 'No members found in Trash.', 'genealogical-tree' ),
        );
        $supports = array( 'title' );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'genealogical-tree' ),
            'public'             => true,
            'show_in_rest'       => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => 'genealogical-tree',
            'query_var'          => true,
            'rewrite'            => array(
            'slug' => 'gt-member',
        ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => $supports,
        );
        register_post_type( 'gt-member', $args );
        $labels = array(
            'name'               => _x( 'Families', 'post type general name', 'genealogical-tree' ),
            'singular_name'      => _x( 'Family', 'post type singular name', 'genealogical-tree' ),
            'menu_name'          => _x( 'Families', 'admin menu', 'genealogical-tree' ),
            'name_admin_bar'     => _x( 'Family', 'add new on admin bar', 'genealogical-tree' ),
            'add_new'            => _x( 'Add New', 'family', 'genealogical-tree' ),
            'add_new_item'       => __( 'Add New Family', 'genealogical-tree' ),
            'new_item'           => __( 'New Family', 'genealogical-tree' ),
            'edit_item'          => __( 'Edit Family', 'genealogical-tree' ),
            'view_item'          => __( 'View Family', 'genealogical-tree' ),
            'all_items'          => __( 'All Families', 'genealogical-tree' ),
            'search_items'       => __( 'Search Families', 'genealogical-tree' ),
            'parent_item_colon'  => __( 'Parent Families:', 'genealogical-tree' ),
            'not_found'          => __( 'No families found.', 'genealogical-tree' ),
            'not_found_in_trash' => __( 'No families found in Trash.', 'genealogical-tree' ),
        );
        $supports = array( 'title' );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'genealogical-tree' ),
            'public'             => true,
            'show_in_rest'       => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'rewrite'            => array(
            'slug' => 'gt-family',
        ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => $supports,
        );
        register_post_type( 'gt-family', $args );
        $labels = array(
            'name'                       => _x( 'Family Groups', 'genealogical-tree', 'genealogical-tree' ),
            'singular_name'              => _x( 'Family Group', 'taxonomy singular name', 'genealogical-tree' ),
            'search_items'               => __( 'Search Family Groups', 'genealogical-tree' ),
            'popular_items'              => __( 'Popular Family Groups', 'genealogical-tree' ),
            'all_items'                  => __( 'All Family Groups', 'genealogical-tree' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Family Group', 'genealogical-tree' ),
            'update_item'                => __( 'Update Family Group', 'genealogical-tree' ),
            'add_new_item'               => __( 'Add New Group', 'genealogical-tree' ),
            'new_item_name'              => __( 'New Group Name', 'genealogical-tree' ),
            'separate_items_with_commas' => __( 'Separate family group with commas', 'genealogical-tree' ),
            'add_or_remove_items'        => __( 'Add or remove family group', 'genealogical-tree' ),
            'choose_from_most_used'      => __( 'Choose from the most used family group', 'genealogical-tree' ),
            'not_found'                  => __( 'No family group found.', 'genealogical-tree' ),
            'menu_name'                  => __( 'Family Groups', 'genealogical-tree' ),
        );
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array(
            'slug' => 'gt-family-group',
        ),
        );
        register_taxonomy( 'gt-family-group', array( 'gt-member', 'gt-family' ), $args );
    }
    
    /**
     * Member columns.
     *
     * @since    1.0.0
     */
    public function member_columns( $columns )
    {
        $columns['ID'] = __( 'ID', 'genealogical-tree' );
        $columns['born'] = __( 'Born', 'genealogical-tree' );
        $columns['title'] = __( 'Name', 'genealogical-tree' );
        return $columns;
    }
    
    /**
     * Member sortable columns.
     *
     * @since    1.0.0
     */
    public function member_sortable_columns( $columns )
    {
        $columns['born'] = 'born';
        $columns['taxonomy-family'] = 'family';
        return $columns;
    }
    
    /**
     * Member posts born column.
     *
     * @since    1.0.0
     */
    public function member_posts_born_column( $column, $post_id )
    {
        switch ( $column ) {
            case 'born':
                $event = get_post_meta( $post_id, 'event', true );
                $date = '';
                if ( isset( $event['birt'] ) ) {
                    if ( $event['birt'][0] ) {
                        $date = $event['birt'][0]['date'];
                    }
                }
                echo  $date ;
                break;
            case 'ID':
                echo  $post_id ;
                break;
        }
    }
    
    /**
     * Member born orderby
     *
     * @since    1.0.0
     */
    public function member_born_orderby( $query )
    {
        $orderby = $query->get( 'orderby' );
        /*
        if( 'born' == $orderby ) {
        	$query->set('meta_key','born');
        	$query->set('orderby','meta_value');
        }
        */
        
        if ( 'gt-family-group' == $orderby ) {
            $query->set( 'tax_query', array(
                'taxonomy' => 'gt-family-group',
            ) );
            $query->set( 'orderby', 'meta_value' );
        }
    
    }
    
    /** 
     * Register theavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function add_meta_boxes_member_info( $post_type )
    {
        add_meta_box(
            'genealogical-tree-member-meta-box',
            __( 'Member info', 'genealogical-tree' ),
            array( $this, 'render_meta_box_member_info' ),
            'gt-member',
            'normal',
            'high'
        );
    }
    
    /**
     * Register the .
     *
     * @since    1.0.0
     */
    public function add_meta_boxes_family_info( $post_type )
    {
        add_meta_box(
            'genealogical-tree-family-meta-box',
            __( 'Family info', 'genealogical-tree' ),
            array( $this, 'render_meta_box_family_info' ),
            'gt-family',
            'normal',
            'high'
        );
    }
    
    /**
     * Register the
     *
     * @since    1.0.0
     */
    public function render_meta_box_family_info( $post )
    {
        //echo "<pre>";
        //$get_post_meta = get_post_meta($post->ID);
        //$get_post_meta['chill'] = get_post_meta($post->ID, 'chill');
        //print_r($get_post_meta);
        // echo "<pre>";;
    }
    
    /**
     * Register theavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function render_meta_box_member_info( $post )
    {
        $spouses = ( get_post_meta( $post->ID, 'spouses', true ) ? get_post_meta( $post->ID, 'spouses', true ) : array( array(
            'id' => null,
        ) ) );
        $full_name = get_post_meta( $post->ID, 'full_name', true );
        $given_name = get_post_meta( $post->ID, 'given_name', true );
        $surname = get_post_meta( $post->ID, 'surname', true );
        $father = get_post_meta( $post->ID, 'father', true );
        $mother = get_post_meta( $post->ID, 'mother', true );
        $event = get_post_meta( $post->ID, 'event', true );
        $phone = ( get_post_meta( $post->ID, 'phone', true ) ? get_post_meta( $post->ID, 'phone', true ) : $this->fake_ci() );
        $email = ( get_post_meta( $post->ID, 'email', true ) ? get_post_meta( $post->ID, 'email', true ) : $this->fake_ci() );
        $address = ( get_post_meta( $post->ID, 'address', true ) ? get_post_meta( $post->ID, 'address', true ) : $this->fake_ci() );
        $query = new \WP_Query( array(
            'post_type'      => 'gt-member',
            'posts_per_page' => -1,
        ) );
        $fathers = array();
        $mothers = array();
        if ( $query->posts ) {
            foreach ( $query->posts as $key => $member ) {
                if ( get_post_meta( $member->ID, 'sex', true ) === 'M' ) {
                    array_push( $fathers, $member->ID );
                }
                if ( get_post_meta( $member->ID, 'sex', true ) === 'F' ) {
                    array_push( $mothers, $member->ID );
                }
            }
        }
        $sex = get_post_meta( $post->ID, 'sex', true );
        if ( !$event ) {
            $event = array();
        }
        
        if ( !isset( $event['birt'] ) ) {
            $event['birt'][0] = $this->fake_event();
            if ( !current( $event['birt'] ) ) {
                $event['birt'][0] = $this->fake_event();
            }
        }
        
        
        if ( !isset( $event['deat'] ) ) {
            $event['deat'][0] = $this->fake_event();
            if ( !current( $event['deat'] ) ) {
                $event['deat'][0] = $this->fake_event();
            }
        }
        
        require_once plugin_dir_path( __FILE__ ) . 'partials/genealogical-tree-meta-member-info.php';
        /*
        print_r('<pre>');
        $get_post_meta = get_post_meta($post->ID);
        $get_post_meta['spouses'] = get_post_meta($post->ID, 'spouses', true);
        $get_post_meta['childof'] = get_post_meta($post->ID, 'childof', true);
        $get_post_meta['event'] = get_post_meta($post->ID, 'event', true);
        print_r($get_post_meta);
        print_r('</pre>');
        */
    }
    
    /**
     * Register theavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function fake_event()
    {
        return array(
            'date'  => '',
            'place' => '',
            'type'  => '',
        );
    }
    
    /**
     * fake ci.
     *
     * @since    1.0.0
     */
    public function fake_ci()
    {
        return array( ' ' );
    }
    
    /**
     * repear full name.
     *
     * @since    1.0.0
     */
    public function repear_full_name( $name )
    {
        return wp_strip_all_tags( trim( str_replace( array( '/', '\\' ), array( ' ', '' ), $name ) ) );
    }
    
    /**
     * family group validation notice handler.
     *
     * @since    1.0.0
     */
    public function family_group_validation_notice_handler()
    {
        $errors = get_option( 'family_group_validation' );
        if ( $errors ) {
            echo  '<div class="error"><p>' . $errors . '</p></div>' ;
        }
        update_option( 'family_group_validation', false );
    }
    
    /**
     * update meta boxes member info.
     *
     * @since    1.0.0
     */
    public function update_meta_boxes_member_info( $post_id )
    {
        if ( !isset( $_POST['_nonce_update_member_info_nonce'] ) ) {
            return $post_id;
        }
        $nonce = $_POST['_nonce_update_member_info_nonce'];
        if ( !wp_verify_nonce( $nonce, 'update_member_info_nonce' ) ) {
            return $post_id;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        
        if ( 'gt-member' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
        
        $family_group = get_the_terms( $post_id, 'gt-family-group' );
        
        if ( !$family_group ) {
            $errors = 'Whoops... you forgot to select family group.';
            update_option( 'family_group_validation', $errors );
            return;
        } else {
            update_option( 'family_group_validation', false );
        }
        
        $motherBefoerUpdate = get_post_meta( $post_id, 'mother', true );
        $fatherBefoerUpdate = get_post_meta( $post_id, 'father', true );
        $full_name = ( isset( $_POST['gt']['full_name'] ) ? sanitize_text_field( $_POST['gt']['full_name'] ) : null );
        $given_name = ( isset( $_POST['gt']['given_name'] ) ? sanitize_text_field( $_POST['gt']['given_name'] ) : null );
        $surname = ( isset( $_POST['gt']['surname'] ) ? sanitize_text_field( $_POST['gt']['surname'] ) : null );
        $mother = ( isset( $_POST['gt']['mother'] ) ? sanitize_text_field( $_POST['gt']['mother'] ) : null );
        $father = ( isset( $_POST['gt']['father'] ) ? sanitize_text_field( $_POST['gt']['father'] ) : null );
        $sex = ( isset( $_POST['gt']['sex'] ) ? sanitize_text_field( $_POST['gt']['sex'] ) : null );
        $event = ( isset( $_POST['gt']['event'] ) ? $_POST['gt']['event'] : array() );
        $phone = ( isset( $_POST['gt']['phone'] ) ? $_POST['gt']['phone'] : array() );
        $email = ( isset( $_POST['gt']['email'] ) ? $_POST['gt']['email'] : array() );
        $address = ( isset( $_POST['gt']['address'] ) ? $_POST['gt']['address'] : array() );
        $xcv = 0;
        foreach ( $event as $key1 => $value1 ) {
            
            if ( is_int( $key1 ) ) {
                foreach ( $value1 as $key2 => $value2 ) {
                    
                    if ( $value2['type'] ) {
                        $event[$value2['type']][$xcv] = array(
                            'type'  => sanitize_text_field( $value2['type'] ),
                            'ref'   => sanitize_text_field( $value2['ref'] ),
                            'date'  => sanitize_text_field( $value2['date'] ),
                            'place' => sanitize_text_field( $value2['place'] ),
                        );
                        $xcv++;
                    }
                
                }
                unset( $event[$key1] );
            }
        
        }
        foreach ( $phone as $key => $ph ) {
            $phone[$key] = sanitize_text_field( $ph );
        }
        foreach ( $email as $key => $em ) {
            
            if ( sanitize_email( $em ) ) {
                $email[$key] = sanitize_email( $em );
            } else {
                unset( $email[$key] );
            }
        
        }
        foreach ( $address as $key => $addr ) {
            $address[$key] = sanitize_text_field( $addr );
        }
        update_post_meta( $post_id, 'full_name', $this->repear_full_name( $full_name ) );
        update_post_meta( $post_id, 'given_name', $given_name );
        update_post_meta( $post_id, 'surname', $surname );
        update_post_meta( $post_id, 'mother', $mother );
        update_post_meta( $post_id, 'father', $father );
        update_post_meta( $post_id, 'sex', $sex );
        update_post_meta( $post_id, 'event', $event );
        update_post_meta( $post_id, 'phone', $phone );
        update_post_meta( $post_id, 'email', $email );
        update_post_meta( $post_id, 'address', $address );
        
        if ( $sex === 'M' ) {
            if ( $_POST['gt']['wife'] ) {
                foreach ( $_POST['gt']['wife'] as $key => $value ) {
                    $_POST['gt']['wife'][$key]['id'] = sanitize_text_field( $value['id'] );
                }
            }
            $spouses = $_POST['gt']['wife'];
        }
        
        
        if ( $sex === 'F' ) {
            if ( $_POST['gt']['husb'] ) {
                foreach ( $_POST['gt']['husb'] as $key => $value ) {
                    $_POST['gt']['husb'][$key]['id'] = sanitize_text_field( $value['id'] );
                }
            }
            $spouses = $_POST['gt']['husb'];
        }
        
        if ( $spouses ) {
            if ( !current( $spouses )['id'] ) {
                $spouses = array();
            }
        }
        update_post_meta( $post_id, 'spouses', $spouses );
        $this->createOrUpdateFamily( $post_id, $spouses, $sex );
        $this->findOrCreateFamily( $father, $mother );
        $this->findOrCreateFamily( $father, null );
        $this->findOrCreateFamily( $mother, $father );
        $this->findOrCreateFamily( $mother, null );
        $this->attacDetachedFamily(
            $post_id,
            $father,
            $mother,
            $fatherBefoerUpdate,
            $motherBefoerUpdate
        );
    }
    
    /**
     * Attach Detached Family
     *
     * @since    1.0.0
     */
    public function attacDetachedFamily(
        $post_id,
        $father,
        $mother,
        $fatherBefoerUpdate,
        $motherBefoerUpdate
    )
    {
        $query = new \WP_Query( array(
            'post_type'      => 'gt-family',
            'posts_per_page' => -1,
            'meta_query'     => array(
            'relation' => 'OR',
            array(
            'key'     => 'root',
            'value'   => $father,
            'compare' => '=',
        ),
            array(
            'key'     => 'spouse',
            'value'   => $father,
            'compare' => '=',
        ),
            array(
            'key'     => 'root',
            'value'   => $mother,
            'compare' => '=',
        ),
            array(
            'key'     => 'spouse',
            'value'   => $mother,
            'compare' => '=',
        ),
            array(
            'key'     => 'root',
            'value'   => $fatherBefoerUpdate,
            'compare' => '=',
        ),
            array(
            'key'     => 'spouse',
            'value'   => $fatherBefoerUpdate,
            'compare' => '=',
        ),
            array(
            'key'     => 'root',
            'value'   => $motherBefoerUpdate,
            'compare' => '=',
        ),
            array(
            'key'     => 'spouse',
            'value'   => $motherBefoerUpdate,
            'compare' => '=',
        ),
        ),
        ) );
        if ( $query->posts ) {
            foreach ( $query->posts as $key => $family ) {
                $chill = ( get_post_meta( $family->ID, 'chill', true ) ? get_post_meta( $family->ID, 'chill', true ) : array() );
                foreach ( $chill as $fkey => $value ) {
                    if ( $value === $post_id ) {
                        unset( $chill[$fkey] );
                    }
                }
                update_post_meta( $family->ID, 'chill', array_unique( $chill ) );
            }
        }
        if ( $father && $mother ) {
            $query = new \WP_Query( array(
                'post_type'      => 'gt-family',
                'posts_per_page' => -1,
                'meta_query'     => array(
                'relation' => 'OR',
                array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $father,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'value'   => $mother,
                'compare' => '=',
            ),
            ),
                array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $mother,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'value'   => $father,
                'compare' => '=',
            ),
            ),
            ),
            ) );
        }
        if ( $father && !$mother ) {
            $query = new \WP_Query( array(
                'post_type'      => 'gt-family',
                'posts_per_page' => -1,
                'meta_query'     => array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $father,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'compare' => 'NOT EXISTS',
            ),
            ),
            ) );
        }
        if ( !$father && $mother ) {
            $query = new \WP_Query( array(
                'post_type'      => 'gt-family',
                'posts_per_page' => 1,
                'meta_query'     => array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $mother,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'compare' => 'NOT EXISTS',
            ),
            ),
            ) );
        }
        $childof = array();
        if ( $query->posts ) {
            foreach ( $query->posts as $key => $family ) {
                $chill = ( get_post_meta( $family->ID, 'chill', true ) ? get_post_meta( $family->ID, 'chill', true ) : array() );
                array_push( $chill, $post_id );
                update_post_meta( $family->ID, 'chill', array_unique( $chill ) );
                array_push( $childof, $family->ID );
            }
        }
        update_post_meta( $post_id, 'childof', array_unique( $childof ) );
    }
    
    /**
     * Create Or Update Family
     *
     * @since    1.0.0
     */
    public function createOrUpdateFamily( $root, $spouses, $sex )
    {
        if ( !$root ) {
            return null;
        }
        $this->findOrCreateFamily( $root, null );
        if ( !empty($spouses) ) {
            foreach ( $spouses as $key => $spouse ) {
                $spouse_spouses = ( get_post_meta( $spouse['id'], 'spouses', true ) ? get_post_meta( $spouse['id'], 'spouses', true ) : array() );
                array_push( $spouse_spouses, array(
                    'id' => $root,
                ) );
                $un_spouse = array();
                foreach ( $spouse_spouses as $element ) {
                    
                    if ( $element['id'] ) {
                        $hash = $element['id'];
                        $un_spouse[$hash] = $element;
                    }
                
                }
                update_post_meta( $spouse['id'], 'spouses', $un_spouse );
                $family_id = $this->findOrCreateFamily( $root, $spouse['id'] );
                $family_id = $this->findOrCreateFamily( $spouse['id'], $root );
                $family_id = $this->findOrCreateFamily( $spouse['id'], null );
            }
        }
    }
    
    /**
     * Find Or Create Family
     *
     * @since    1.0.0
     */
    public function findOrCreateFamily( $root, $spouse )
    {
        if ( !$root ) {
            return null;
        }
        $family_id = null;
        
        if ( $spouse ) {
            $query = new \WP_Query( array(
                'post_type'      => 'gt-family',
                'posts_per_page' => 1,
                'meta_query'     => array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $root,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'value'   => $spouse,
                'compare' => '=',
            ),
            ),
            ) );
            
            if ( !$query->posts ) {
                $family_id = wp_insert_post( array(
                    'post_title'   => get_the_title( $root ) . ' and ' . get_the_title( $spouse ),
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_type'    => 'gt-family',
                ) );
                update_post_meta( $family_id, 'root', $root );
                update_post_meta( $family_id, 'spouse', $spouse );
            } else {
                $family_id = current( $query->posts )->ID;
            }
        
        }
        
        
        if ( !$spouse ) {
            $query = new \WP_Query( array(
                'post_type'      => 'gt-family',
                'posts_per_page' => 1,
                'meta_query'     => array(
                'relation' => 'AND',
                array(
                'key'     => 'root',
                'value'   => $root,
                'compare' => '=',
            ),
                array(
                'key'     => 'spouse',
                'compare' => 'NOT EXISTS',
            ),
            ),
            ) );
            
            if ( !$query->posts ) {
                $family_id = wp_insert_post( array(
                    'post_title'   => get_the_title( $root ),
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_type'    => 'gt-family',
                ) );
                update_post_meta( $family_id, 'root', $root );
            } else {
                $family_id = current( $query->posts )->ID;
            }
        
        }
        
        return $family_id;
    }
    
    /**
     * get family group name
     *
     * @since    1.0.0
     */
    public function get_family_group_name( $family_group_name )
    {
        
        if ( $family_group_name ) {
            $family_group_name = sanitize_text_field( $family_group_name );
            $term = term_exists( $family_group_name, 'gt-family-group' );
            $suggestions = array();
            
            if ( 0 !== $term && null !== $term ) {
                $terms = get_terms( 'gt-family-group', array(
                    'hide_empty' => false,
                ) );
                $terms_slug = array();
                foreach ( $terms as $key => $term ) {
                    array_push( $terms_slug, $term->slug );
                }
                $count = 0;
                $names_left = 1000;
                while ( $names_left > 0 ) {
                    $count++;
                    
                    if ( !in_array( sanitize_title( $family_group_name ) . '-' . $count, $terms_slug ) ) {
                        $suggestions[] = $family_group_name . ' ' . $count;
                        $names_left--;
                    }
                
                }
            } else {
                return $family_group_name;
            }
            
            return $suggestions[0];
        }
    
    }
    
    /**
     * Generate page
     *
     * @since    1.0.0
     */
    public function generate_page( $family_group_id )
    {
        $family_group_obj = get_term( $family_group_id );
        $family_group_name = $family_group_obj->name;
        $return = '';
        $my_post = array(
            'post_title'   => wp_strip_all_tags( 'Family Tree - ' . $family_group_name ),
            'post_content' => '[gt-tree family=\'' . $family_group_id . '\']',
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_type'    => 'page',
        );
        $tree_page_id = wp_insert_post( $my_post );
        update_term_meta( $family_group_id, 'tree_page', $tree_page_id );
        // Create default family members page of group
        $my_post_members = array(
            'post_title'   => wp_strip_all_tags( 'Family Members - ' . $family_group_name ),
            'post_content' => '[gt-members family=\'' . $family_group_id . '\']',
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_type'    => 'page',
        );
        $members_page_id = wp_insert_post( $my_post_members );
        update_term_meta( $family_group_id, 'members_page', $members_page_id );
        // Create family tree list page of group
        $my_post = array(
            'post_title'   => wp_strip_all_tags( 'Family Tree List - ' . $family_group_name ),
            'post_content' => '[gt-tree-list family=\'' . $family_group_id . '\']',
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_type'    => 'page',
        );
        $tree_list_page_id = wp_insert_post( $my_post );
        update_term_meta( $family_group_id, 'tree_list_page', $tree_list_page_id );
        return $return;
    }
    
    /**
     * create family group free
     *
     * @since    1.0.0
     */
    public function create_family_group_free( $term_id )
    {
        $this->generate_page( $term_id );
        
        if ( gt_fs()->is_not_paying() ) {
            $terms = get_terms( array(
                'taxonomy'   => 'gt-family-group',
                'hide_empty' => false,
            ) );
            
            if ( count( $terms ) > 1 ) {
                wp_delete_term( $term_id, 'gt-family-group' );
                echo  '<a href="' . gt_fs()->get_upgrade_url() . '">' . __( 'Upgrade Now!', 'genealogical-tree' ) . '</a> to create more family group' ;
                echo  '</section>' ;
                die;
            }
        
        }
    
    }
    
    /**
     * Set the submenu as active/current while anywhere in your Custom Post Type (member)
     *
     * @since    1.0.0
     */
    public function set_family_group_current_menu( $parent_file )
    {
        global  $submenu_file, $current_screen, $pagenow ;
        if ( $current_screen->post_type == 'gt-member' ) {
            
            if ( $pagenow == 'edit-tags.php' || $pagenow == 'term.php' ) {
                $submenu_file = 'edit-tags.php?taxonomy=gt-family-group&post_type=' . $current_screen->post_type;
                $parent_file = 'genealogical-tree';
            }
        
        }
        return $parent_file;
    }
    
    /**
     * Add family columns content
     *
     * @since    1.0.0
     */
    public function add_gt_family_group_column_content( $content, $column_name, $term_id )
    {
        $term = get_term( $term_id, 'family' );
        switch ( $column_name ) {
            case 'shortcode':
                $content = '<table><tr><td>Tree:</td><td>    <code>[gt-tree family=\'' . $term_id . '\']</code></td></tr>';
                $content .= '<tr><td>Tree List:</td><td> <code>[gt-tree-list family=\'' . $term_id . '\']</code></td></tr>';
                $content .= '<tr><td>Members:</td><td> <code>[gt-members family=\'' . $term_id . '\']</code></td></tr></table>';
                break;
        }
        return $content;
    }
    
    /**
     * Add family columns
     *
     * @since    1.0.0
     */
    public function add_gt_family_group_columns( $columns )
    {
        $columns['shortcode'] = 'Shortcode';
        return $columns;
    }
    
    /**
     * Add term page
     *
     * @since    1.0.0
     */
    public function family_group_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page
        ?>
		<div class="form-field">
			<label for="tree_page"><?php 
        _e( 'Tree Page', 'genealogical-tree' );
        ?></label>
			<input disabled="disabled" type="text" name="tree_page" id="tree_page" value="">
			<p class="description"><?php 
        _e( 'Auto Generated: The link of family tree page of this group.', 'genealogical-tree' );
        ?></p>
		</div>
		<div class="form-field">
			<label for="tree_list_page"><?php 
        _e( 'Tree List Page', 'genealogical-tree' );
        ?></label>
			<input disabled="disabled" type="text" name="tree_list_page" id="tree_list_page" value="">
			<p class="description"><?php 
        _e( 'Auto Generated: The link of family tree list page of this group.', 'genealogical-tree' );
        ?></p>
		</div>
		<div class="form-field">
			<label for="members_page"><?php 
        _e( 'Members Page', 'genealogical-tree' );
        ?></label>
			<input disabled="disabled" type="text" name="members_page" id="members_page" value="">
			<p class="description"><?php 
        _e( 'Auto Generated: The link of family members page of this group.', 'genealogical-tree' );
        ?></p>
		</div>
	<?php 
    }
    
    /**
     * Edit term page
     *
     * @since    1.0.0
     */
    public function family_group_edit_meta_field( $term )
    {
        $t_id = $term->term_id;
        $tree_page = get_the_permalink( get_term_meta( $term->term_id, 'tree_page', true ) );
        $tree_list_page = get_the_permalink( get_term_meta( $term->term_id, 'tree_list_page', true ) );
        $members_page = get_the_permalink( get_term_meta( $term->term_id, 'members_page', true ) );
        ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="tree_page"><?php 
        _e( 'Tree Page', 'genealogical-tree' );
        ?></label></th>
			<td>
				<input disabled="disabled" type="text" name="tree_page" id="tree_page" value="<?php 
        echo  ( esc_attr( $tree_page ) ? esc_attr( $tree_page ) : '' ) ;
        ?>">
				<p class="description"><?php 
        _e( 'Auto Generated: The link of family tree page of this group.', 'genealogical-tree' );
        ?></p>
			</td>
		</tr>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="tree_list_page"><?php 
        _e( 'Tree List Page', 'genealogical-tree' );
        ?></label></th>
			<td>
				<input disabled="disabled" type="text" name="tree_list_page" id="tree_list_page" value="<?php 
        echo  ( esc_attr( $tree_list_page ) ? esc_attr( $tree_list_page ) : '' ) ;
        ?>">
				<p class="description"><?php 
        _e( 'Auto Generated: The link of family tree page of this group.', 'genealogical-tree' );
        ?></p>
			</td>
		</tr>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="members_page"><?php 
        _e( 'Members Page', 'genealogical-tree' );
        ?></label></th>
			<td>
				<input disabled="disabled" type="text" name="members_page" id="members_page" value="<?php 
        echo  ( esc_attr( $members_page ) ? esc_attr( $members_page ) : '' ) ;
        ?>">
				<p class="description"><?php 
        _e( 'Auto Generated: The link of family members page of this group.', 'genealogical-tree' );
        ?></p>
			</td>
		</tr>
	<?php 
    }
    
    /**
     * Save extra taxonomy fields callback function.
     *
     * @since    1.0.0
     */
    public function save_taxonomy_custom_meta( $term_id )
    {
        
        if ( isset( $_POST['tree_page'] ) ) {
            $tree_page = sanitize_text_field( $_POST['tree_page'] );
            update_term_meta( $term_id, 'tree_page', $tree_page );
        }
        
        
        if ( isset( $_POST['tree_list_page'] ) ) {
            $tree_list_page = sanitize_text_field( $_POST['tree_list_page'] );
            update_term_meta( $term_id, 'tree_list_page', $tree_list_page );
        }
        
        
        if ( isset( $_POST['members_page'] ) ) {
            $members_page = sanitize_text_field( $_POST['members_page'] );
            update_term_meta( $term_id, 'members_page', $members_page );
        }
    
    }

}