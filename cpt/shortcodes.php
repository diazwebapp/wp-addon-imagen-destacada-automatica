<?php

//Shortcode promos
function shortcode_promos($attr){ 
	global $wpdb;
    extract( shortcode_atts( array( 
		'post_type'=>'post',
		'promo_id'=>false
	 ), $attr ) );
	 $query_promos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts where post_type='promos' AND post_status='publish' AND ID='$promo_id' ORDER BY ID DESC");
	 $query_pronosticos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts where post_type='{$post_type}' AND post_status='publish' ");
	 
	 $html = "";
	 if($query_promos && $query_promos[0]):
		$promo = $query_promos[0];
		$count=1;
	
		$background_color=get_post_meta($promo->ID,'background_color',true);
		$title_color=get_post_meta($promo->ID,'title_color',true);
		$list_item_border_color=get_post_meta($promo->ID,'list_item_border_color',true);
		$bono=get_post_meta($promo->ID,'bono',true);
		$refear_link=get_post_meta($promo->ID,'refear_link',true);
		$logo_link=get_post_meta($promo->ID,'logo_link',true);
		$html .= "
			<style>
				#prev_shortcode{
					grid-column: 1 / span 6;
					border:2px solid {$list_item_border_color};
					border-radius:7px;
					padding:0 0 7% 0;
					background-color:{$background_color};
					margin:auto;
					max-width:300px;
					width:calc(100% - 20px);
					position:relative;
				}
				#prev_shortcode > .title_promo{
					width:100%;
					text-align:center;
				}
				#prev_shortcode > .title_promo .container_logo_promos{
					margin-bottom:5px;
					max-height: 60px;
					overflow: hidden;
					padding-bottom:10px;
					border-bottom:0.5px solid #b5b5b5;
				}
				#prev_shortcode > .title_promo .container_logo_promos img{
					margin:auto;
					width:95%;height:50px;
					object-fit:contain;
				}
				#prev_shortcode .title_promo b{
					font-size:22px;
					text-transform:uppercase;
					color:$title_color;
					padding:10px;
					text-align:center;
					width:100%;
					display:block;
				}
				#prev_shortcode .list_pronosticos  .list_item_pronostico{
					display:grid !important;
					grid-template-columns:1fr 100px;
					border-top:0.5px solid {$list_item_border_color};
					border-bottom:0.5px solid {$list_item_border_color};
					padding:5px;
				}
				.list_item_pronostico .enfrentamiento small{
					font-weight:bold;
				}
				.list_item_pronostico .enfrentamiento p{
					color:grey;
					text-transform:capitalize;
					font-size:1rem;
				}
				.list_item_pronostico .ganancia{
					border-left:0.5px solid #b5b5b5;
					padding-left:5px;
					display:grid;
					place-items:center;
					place-content:center;
				}
				#prev_shortcode .btn_apuesta{
					position:absolute;
					bottom:-4%;
					width:200px;
					padding:5px 10px;
					border-radius:7px;
					background:#32d032;
					left:calc(50% - 100px);
					text-align:center;
					text-transform:uppercase;
					color:white;
				}
			</style>
			
				<div id='prev_shortcode'>
					<div class='title_promo'>
						<div class='container_logo_promos'>
							<img src='{$logo_link}' alt='logo'>
						</div>
						<b>{$promo->post_title}</b>
					</div>
				
					<div class='list_pronosticos'>
				";
		

		foreach($query_pronosticos as  $pronostico):			
			
			$nombre_equipo_1 = get_post_meta($pronostico->ID,'nombre_equipo_1',true);
			$nombre_equipo_2 = get_post_meta($pronostico->ID,'nombre_equipo_2',true);
			$eleccion = get_post_meta($pronostico->ID,'eleccion',true);
			$cuota_eleccion = get_post_meta($pronostico->ID,'cuota_eleccion',true);

			if($cuota_eleccion && $bono && $nombre_equipo_1 && $nombre_equipo_2 && $count <= 5 ):
				setlocale(LC_MONETARY, 'it_IT');
				$recompensa = number_format(floatval($bono * $cuota_eleccion ), 2);
				$html .= "
						<div class='list_item_pronostico'>						
							<div class='enfrentamiento' >
								<small>{$nombre_equipo_1} vs {$nombre_equipo_2}</small>
								<p class='eleccion' >{$eleccion} ($cuota_eleccion)</p>
							</div>
							<div class='ganancia'>
								{$recompensa} $
							</div>
						</div>
				";
				$count++;
			endif;
		endforeach;

		$html .= "<a href='$refear_link' class='btn_apuesta' >Apuesta</a>
						</div>
					</div>
				
				";
		
		return $html;
	endif;
}
add_shortcode('aw_promos_card','shortcode_promos');

function shortcode_banners($attr){ 
	global $wpdb, $post;
    extract( shortcode_atts( array( 
		'post_type'=>'banners',
		'banner_id'=>false
	), $attr ) );
	$query_banners = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts where post_type='$post_type' AND post_status='publish' AND ID='$banner_id' ORDER BY ID DESC");
	$eleccion = get_post_meta($post->ID,'eleccion',true);
	
	$html = "";
	if($query_banners && $query_banners[0]):		
		$banner=$query_banners[0];
		$background_color=get_post_meta($banner->ID,'background_color',true);
		$title_color=get_post_meta($banner->ID,'title_color',true);
		$bg_button =get_post_meta($banner->ID,'background_button',true);
		$text_color_button=get_post_meta($banner->ID,'text_color_button',true);
		$bg_logo=get_post_meta($banner->ID,'background_logo',true);
		$logo_link=get_post_meta($banner->ID,'logo_link',true);
		$refear_link=get_post_meta($banner->ID,'refear_link',true);
		$html .= "
		<style>
			#prev_shortcode_banners{
				grid-column: 1 / span 6;
				max-width:800px;
				width:calc(100% - 20px);
				margin:auto;
			}
			#prev_shortcode_banners > .title_banner{
				text-align:center;
			}
			#prev_shortcode_banners > .title_banner b{
				text-transform:uppercase;
				font-size:21px;
				padding:10px 0;
				color:$title_color;
			}
			#prev_shortcode_banners > .grid_card_banners{
				display:grid;
				grid-template-columns: 1fr ;
				box-shadow:0px 0px 1px black;
				border-radius:7px;
				background:$background_color;
				overflow:hidden;
			}
			#prev_shortcode_banners > .grid_card_banners .container_logo_banners{
				display:grid;
				background:$bg_logo;
			}
			#prev_shortcode_banners > .grid_card_banners .container_logo_banners img{
				width:100%;
				height:100%;
				object-fit:contain;
			}
			#prev_shortcode_banners > .grid_card_banners .container_logo_banners,
			#prev_shortcode_banners > .grid_card_banners .container_slogan_banners,
			#prev_shortcode_banners > .grid_card_banners .container_button_banners {
				display:flex;
				flex-flow:column;
				align-items:center;
				justify-content:center;
				padding:10px;
				text-align:center;
			}
			#prev_shortcode_banners > .grid_card_banners .container_button_banners {
				padding:0px;
			}
			#prev_shortcode_banners > .grid_card_banners .container_slogan_banners p{
				font-size:20px;
				text-transform:uppercase;
				padding:0;
				margin:0;
			}
			#prev_shortcode_banners > .grid_card_banners .container_button_banners a{
				padding:1px 10px;
				text-decoration:none;
				background-color:$bg_button;
				color:$text_color_button;
				text-shadow:0px 0px grey;
				font-weight:bold;
				width:100%;
			}
			@media(min-width:600px){
				#prev_shortcode_banners > .grid_card_banners{
					grid-template-columns: 150px 1fr 150px;
				}
				#prev_shortcode_banners > .grid_card_banners .container_logo_banners,
				#prev_shortcode_banners > .grid_card_banners .container_slogan_banners,
				#prev_shortcode_banners > .grid_card_banners .container_button_banners {
					padding:10px;
				}
			}

		</style>

		<div id='prev_shortcode_banners'>
			
			<div class='grid_card_banners'>
				<div class='container_logo_banners'>
					<img src='{$logo_link}' alt='logo'>
				</div>
				<div class='container_slogan_banners'>					
					<p>$banner->post_title $eleccion</p>
				</div>
				<div class='container_button_banners'>
					<a href='$refear_link' >Apuesta</a>
				</div>
			</div>
		</div>
		";
		
	endif;
	return $html;
}
add_shortcode('aw_banners_card','shortcode_banners');