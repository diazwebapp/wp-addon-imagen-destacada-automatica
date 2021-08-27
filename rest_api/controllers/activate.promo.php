<?php 
function aw_activate_promo(WP_REST_Request $request){
    global $wpdb;
    $params = json_decode($request->get_body());
    
    wp_update_post([
        'ID' => $params->id,
        'post_status' => 'publish',
        'post_type' => $params->post_type
    ]);
    $resp = json_encode(
        ['status'=>'success','msg'=> $params->id .' activated']
    );
    return json_decode($resp);
}
