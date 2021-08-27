<?php
/**
 * 
 */

defined( 'ABSPATH' ) || die();
add_action( 'add_meta_boxes', 'post_meta_boxes' );


function post_meta_boxes() {
	add_meta_box(
		'Eleccion',
		'Eleccion del post',
		'eleccion',
		'post',
		'normal',
		'high'
	);
	add_meta_box(
		'meta_equipo_1',
		'Datos del equipo 1',
		'Data_equipo_1',
		'post',
		'normal',
		'high'
	);
	add_meta_box(
		'meta_equipo_2',
		'Datos del equipo 2',
		'Data_equipo_2',
		'post',
		'normal',
		'high'
	);

}
//Eleccion
function eleccion($post){
	$eleccion = $post->eleccion;
	$cuota_eleccion = $post->cuota_eleccion;

	wp_nonce_field( 'graba_post', 'post_nonce' ); ?>
	
	
	<div class="container_meta_box">
		<!-- Elección -->
		<div>
			<label for="eleccion">
				<?php echo esc_html__( 'Eleccion', 'apuestanweb-lang' ) ?> 
			</label>
			<input type="text" name="eleccion" id="eleccion" value="<?php echo esc_attr( $eleccion ) ?>">

		</div>
		<div>
			<label for="cuota_eleccion">
				<?php echo esc_html__( 'Cuota eleccion', 'apuestanweb-lang' ) ?> 
			</label>
			<input type="number" min="1.01" step="0.01" name="cuota_eleccion" id="cuota_eleccion" value="<?php echo esc_attr( $cuota_eleccion ) ?>">

		</div>
	</div>
<?php }

function Data_equipo_1( $post ) {
	$imagen = $post->img_equipo_1;
	$nombre_equipo_1 = $post->nombre_equipo_1;
	$average_equipo_1 = $post->average_equipo_1;
	wp_nonce_field( 'graba_post', 'post_nonce' ); ?>

	<style>
		.container_meta_box{
			display:grid;
			grid-template-columns:1fr;
			gap:10px;
		}
		.container_meta_box > div{
			width:100%;
		}
		.container_meta_box > div label{
			text-transform:uppercase;
			font-weight:bold;
		}
		.container_meta_box > div > *{
			width:100%;
			display:block;
		}
		.container_meta_box > div ul{
			height:max-content;
			max-height:300px;
			overflow-x:auto;
		}
		.container_meta_box > div ul label{
			width:100%;
			display:block;
			padding:5px;
		}
		@media(min-width:512px){
			.container_meta_box{
				grid-template-columns:repeat(2,1fr);
			}
		}
		@media(min-width:960px){
			.container_meta_box{
				grid-template-columns:repeat(3,1fr);
			}
		}
		@media(min-width:1080px){
			.container_meta_box{
				grid-template-columns:repeat(4,1fr);
			}
		}
	</style> 

	<div class="container_meta_box">
		
		<div>
			<label>
				<?php echo esc_html__( 'Equipo 1', 'apuestanweb-lang' ) ?> 
			</label>
			<input list="equipos" name="nombre_equipo_1" type="text" placeholder="Elige un equipo" value="<?php echo $nombre_equipo_1 ?>" >
			<datalist id="equipos">
				<?php 
					$equipos = get_terms(array('taxonomy'=>'deportes','hide_empty' => false));
					foreach ($equipos as $equipo) : 
						echo '<option style="display:none;" value="'.$equipo->name.'"></option>';
				endforeach; ?>
				
			</datalist>
		</div>

		<div>
			<label for="average_equipo_1">
				<?php echo esc_html__( 'average equipo 1', 'apuestanweb-lang' ) ?>
			</label>
			<input type="number" min="1.01" step="0.01" name="average_equipo_1" id="average_equipo_1" value="<?php echo esc_attr( $average_equipo_1 ) ?>">
			<input id="img_equipo_1" type="hidden" name="img_equipo_1" value="<?php echo get_post_meta($post->ID,'img_equipo_1')[0] ?>" >
		</div>

	</div>

<?php }


function Data_equipo_2( $post ) {
	$imagen_2 = $post->img_equipo_2;
	$nombre_equipo_2 = $post->nombre_equipo_2;
	$average_equipo_2 = $post->average_equipo_2;

	wp_nonce_field( 'graba_post', 'post_nonce' ); ?>
	<div class="container_meta_box">
		<div>
			<label>
				<?php echo esc_html__( 'Equipo 2', 'apuestanweb-lang' ) ?> 
			</label>
			<input type="text" list="equipos" placeholder="Elige un equipo" name="nombre_equipo_2" value="<?php echo $nombre_equipo_2 ?>" >
			<datalist id="equipos">
				<?php 
					$equipos = get_terms(array('taxonomy'=>'deportes','hide_empty' => false));
					foreach ($equipos as $equipo) : 
						echo '<option style="display:none;" value="'.$equipo->name.'"></option>';
					endforeach; ?>
				
			</datalist>
		</div>

		<div>
			<label for="average_equipo_2">
				<?php echo esc_html__( 'average equipo 2', 'apuestanweb-lang' ) ?>
			</label>
			<input type="number" min="1.01" step="0.01" name="average_equipo_2" id="average_equipo_2" value="<?php echo esc_attr( $average_equipo_2 ) ?>">
			<input id="img_equipo_2" type="hidden" name="img_equipo_2" value="<?php echo get_post_meta($post->ID,'img_equipo_2')[0] ?>" >
		</div>
	</div>
<?php }
