<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */

/* HABILITAR / DESABILITAR */ /*


// remove itens padrões
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	//remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}

// REMOVE PARENT PAGE
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

/* Remove tags 
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags'); */



/*add_post_type_support( 'post', 'excerpt' );
add_post_type_support( 'page', 'excerpt' );*/

function tn_custom_excerpt_length( $length ) {
return 25;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );


add_theme_support( 'post-thumbnails' );


function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// Unable admin bar
add_filter('show_admin_bar', '__return_false');


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );


if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'depoimento', 80, 80, true ); //(cropped)
}



// muda nome post
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Todos os posts';
    $submenu['edit.php'][10][0] = 'Adicionar post';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Adicionar post';
    $labels->add_new_item = 'Adicionar post';
    $labels->edit_item = 'Editar post';
    $labels->new_item = 'Post';
    $labels->view_item = 'Ver post';
    $labels->search_items = 'Buscar post';
    $labels->not_found = 'Nenhum post encontrado';
    $labels->not_found_in_trash = 'Nenhum post encontrado na lixeira';
    $labels->all_items = 'Todos os posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );


/*
add_action( 'init', 'create_post_type' );
function create_post_type() {

	$labels = array(
	    'name' => _x('Blog', 'post type general name'),
	    'singular_name' => _x('Blog', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'post'),
	    'add_new_item' => __('Addicionar novo post'),
	    'edit_item' => __('Editar post'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar Blog'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Blog'
	);
	$args = array(
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'blog',
			"with_front" => true,
		],

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-tag',
	    'supports' => array('title','excerpt','editor','thumbnail')
	  );

    register_post_type( 'post', $args );
}
*/



/* URL encurtada, LINK */ /*
function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}
*/ // */

// muda nome post
/*
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Produtos';
    $submenu['edit.php'][5][0] = 'Todos os Produtos';
    $submenu['edit.php'][10][0] = 'Adicionar Produtos';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Produtos';
    $labels->singular_name = 'Produtos';
    $labels->add_new = 'Adicionar Produto';
    $labels->add_new_item = 'Adicionar Produto';
    $labels->edit_item = 'Editar Produto';
    $labels->new_item = 'Produto';
    $labels->view_item = 'Ver Produto';
    $labels->search_items = 'Buscar Produto';
    $labels->not_found = 'Nenhum produto encontrado';
    $labels->not_found_in_trash = 'Nenhum produto encontrado na lixeira';
    $labels->all_items = 'Todos os Produtos';
    $labels->menu_name = 'Produtos';
    $labels->name_admin_bar = 'Produtos';
} 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );
*/


/* PAGINAS CONFIGURAÇÕES */ 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog',
		'menu_title'	=> 'Blog',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Depoimentos',
		'menu_title'	=> 'Depoimentos',
		'parent_slug'	=> 'configuracoes-geral',
	));
}


function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

// NOVOS POST TYPES 

	/* POST TYPE */
	function depoimentos_post_type(){
		register_post_type('depoimentos', array( 
			'labels'            =>  array(
				'name'          =>      __('Depoimentos'),
				'singular_name' =>      __('Depoimento'),
				'all_items'     =>      __('Todos'),
				'add_new'       =>      __('Adicionar'),
				'add_new_item'  =>      __('Adicionar'),
				'edit_item'     =>      __('Editar'),
				'view_item'     =>      __('Visualizar'),
				'search_items'  =>      __('Pesquisar'),
				'no_found'      =>      __('Nenhum item encontrato'),
				'not_found_in_trash' => __('A lixeira está vazia.')
			),
			'public'            =>  true,
			'publicly_queryable'=>  true,
			'show_ui'           =>  true, 
			'query_var'         =>  true,
			'show_in_nav_menus' =>  false,
			'capability_type'   =>  'post',
			'hierarchical'      =>  true,
			'rewrite'=> [
				'slug' => 'depoimentos',
				"with_front" => false
			],
			"cptp_permalink_structure" => "/%depoimentos%/%postname%/",
			'menu_position'     =>  21,
			'supports'          =>  array('title','editor','excerpt','thumbnail'),
			'has_archive'       =>  false,
			'menu_icon' => 'dashicons-lock'
		));
		flush_rewrite_rules();
	}
	add_action('init', 'depoimentos_post_type');
	/* POST TYPE */ 





	add_action('admin_head', 'custom_css_admin');
	function custom_css_admin() {
		echo '<style>
			.editor-styles-wrapper p {
				text-align: justify;
				white-space: normal;
			}
		</style>';

		echo '
			<script type="text/javascript">
				jQuery.noConflict();

				jQuery("document").ready(function(){

				});
			</script>
		';
	}






	if(wp_get_current_user()->ID == 1){
		$producao = false;
	}else{
		$producao = false;
	}

	if($producao){
		add_action('admin_head', 'my_custom_fonts');

		function my_custom_fonts() {
		  echo '<style>
			#menu-media, #menu-comments, #menu-appearance, #menu-plugins, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
			#toplevel_page_zilla-likes, 
		  	#menu-posts li:nth-child(4), 
			#screen-options-link-wrap, 
			.acf-postbox h2 a, 
			#the-list #post-94, 
			#the-list #post-65, 
			#commentstatusdiv, 
			#commentsdiv, 
			#toplevel_page_wpglobus_options, 
			.taxonomy-category .form-field.term-parent-wrap, 
			.wp-menu-separator 
			{
				display: none!important;
			} 

			#categories, .column-categories {
				text-indent: -10000px;
			}

			.wp-block-paragraph editor-rich-text__tinymce mce-content-body {
				text-align: justify;
			}
		  </style>';

		  echo '
			<script type="text/javascript">
				jQuery.noConflict();

				jQuery("document").ready(function(){
					jQuery("#menu-media").remove();
					jQuery("#menu-comments").remove();
					jQuery("#menu-appearance").remove();
					jQuery("#menu-plugins").remove();
					jQuery("#menu-tools").remove();
					jQuery("#menu-settings").remove();
					jQuery("#toplevel_page_edit-post_type-acf").remove();
					jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
					jQuery("#toplevel_page_zilla-likes").html("");
					jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
					jQuery(".wp-menu-separator").remove();
					jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
					jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
					jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();

					jQuery("#menu-posts li:nth-child(4)").remove();

					jQuery("#categories").html("");
					jQuery(".column-categories").html("");

					jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
					jQuery("#toplevel_page_wpglobus_options").remove();
					jQuery("#commentstatusdiv").remove();
					jQuery("#commentsdiv").remove();

					jQuery(".user-rich-editing-wrap").remove();
					jQuery(".user-admin-color-wrap").remove();
					jQuery(".user-comment-shortcuts-wrap").remove();
					jQuery(".user-admin-bar-front-wrap").remove();
					jQuery(".user-language-wrap").remove();

					jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
					jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
					jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
					jQuery("#toplevel_page_delete_all_posts ul").remove();
				});
			</script>
		  ';
		}
	}

add_action( 'admin_enqueue_scripts', function() {
   /* wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css');*/
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
})

?>