<?php
/**
 * 
 */

defined( 'ABSPATH' ) || die();

add_action( 'save_post', 'posts_save_meta_boxes' );
/**
 * Graba los campos personalizados que vienen del formulario de edición del post
 *
 * @param int $post_id Post ID.
 *
 * @return bool|int
 */
function posts_save_meta_boxes( $post_id ) {
	global $wpdb;
	// Comprueba que el tipo de post es post.
	if ( isset( $_POST ) && 'post' !== $_POST['post_type'] ) {
		return $post_id;
	}
	// Comprueba que el nonce es correcto para evitar ataques CSRF.
	if ( ! isset( $_POST['post_nonce'] ) || ! wp_verify_nonce( $_POST['post_nonce'], 'graba_post' ) ) {
		return $post_id;
	}
	// Comprueba que el usuario actual tiene permiso para editar esto
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		wp_die(
			'<h1>' . __( 'Necesitas más privilegios para publicar contenidos.', 'apuestanweb-lang' ) . '</h1>' .
			'<p>' . __( 'Lo siento, no puedes crear contenidos desde esta cuenta.', 'apuestanweb-lang' ) . '</p>',
			403
		);
	}
	// Ahora puedes grabar los datos
	$nombre_equipo_1 = sanitize_post( $_POST['nombre_equipo_1'] );
	update_post_meta( $post_id, 'nombre_equipo_1', $nombre_equipo_1 );

	$average_equipo_1 = sanitize_post( $_POST['average_equipo_1'] );
	update_post_meta( $post_id, 'average_equipo_1', $average_equipo_1 );


	//* equipo 2 *//

	$nombre_equipo_2 = sanitize_post( $_POST['nombre_equipo_2'] );
	update_post_meta( $post_id, 'nombre_equipo_2', $nombre_equipo_2 );

	$average_equipo_2 = sanitize_post( $_POST['average_equipo_2'] );
	update_post_meta( $post_id, 'average_equipo_2', $average_equipo_2 );

	// eleccion del partido
	$eleccion = ( $_POST['eleccion'] );
	update_post_meta( $post_id, 'eleccion', $eleccion );
	
	// Cuota eleccion
	$cuota_eleccion = ( $_POST['cuota_eleccion'] );
	update_post_meta( $post_id, 'cuota_eleccion', $cuota_eleccion );

	return true;
}
