<?php
/*
 * Plugin Name: Promo addon imagen destacada automatica
 * Plugin URI: https://github.com/diaz-web-app/wp-addon-imagen-destacada-automatica
 * Description: Añade shortcode de promociones y extiende los custon field del plugin imagen destacada automatica
 * Version: 2.6
 * Author: Diaz web app
 * Author URI: https://diazweb.website
 * WC requires at least: 5.0
 * WC tested up to: 5.0
 * Text Domain: promos
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

require 'rest_api/rest_api_init.php';
require 'meta_box/register-metaboxes.php';
require 'meta_box/save-metaboxes.php';
require 'cpt/cpt_tax.php';
require 'cpt/shortcodes.php';
require 'pages/page_1.php';
require 'pages/page_2.php';

define( 'PATH_IMP_SCRIPT', plugin_dir_url( __FILE__ ) );
function aw_admin_page() {
	wp_enqueue_media();
	wp_register_script('js_cpanel', PATH_IMP_SCRIPT . 'js/scripts_admin.js', '1', true);
	wp_enqueue_script('js_cpanel');
	wp_localize_script( 'js_cpanel', 'aw_rest_api_settigns', array(
		'root' => esc_url_raw( rest_url() ),
		'nonce' => wp_create_nonce( 'aw_wp_rest' )
	) );

	add_menu_page(
		__( 'Custom Menu Title', 'apuestanweb-lang' ),
		'AW Promos',
		'manage_options',
		'addon_imagen_destacada_automatica',
		'func_custom_admin_page',
		'',
		6
	);
}
function func_custom_admin_page(){ ?>
	<style>
		*{
			margin:0;
			box-sizing:border-box;
		}
		
		.aw_admin_container{
			width:98%;
			background:white;
		}
		.aw_admin_container > nav button{
			padding:5px 10px;
			background-color:orange;
			border:unset;
			cursor:pointer;
		}
		#aw_admin_body > article{
			display:none;
			transition:all .3s ease;
			grid-template-columns:repeat(6,1fr);
			gap:3px;
			margin:10px auto;
		}
		
		#aw_admin_body .show{
			display:grid;
		}
		
	</style>
	
	<div class="aw_admin_container" >
		<nav>
			<button id="btn_aw_page_1" >Promo</button>
			<button id="btn_aw_page_2" >banner</button>
		</nav>
		<main>
			<section id="aw_admin_body" >
			<!-- Page 1-->
				<article id="aw_page_1">
					<div style="grid-column:1 / span 6;text-align:center;">
						<h1>Shortcode</h1>
						<p>[aw_promos_card promo_id="1" post_type="cpt_name" ]</p>
					</div>
					<?php aw_cpanel_page_1() ?>
				</article>
			<!-- Page 2-->
				<article id="aw_page_2">
				<div style="grid-column:1 / span 6;text-align:center;">
						<h1>Shortcode</h1>
						<p>[aw_banners_card banner_id="1" post_type="cpt_name" ]</p>
					</div>
					<?php aw_cpanel_page_2() ?>
				</article>
			</section>
		</main>
	</div>
	
<?php }
add_action( 'admin_menu', 'aw_admin_page' );