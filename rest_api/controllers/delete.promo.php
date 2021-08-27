<?php 
function aw_delete_promo(WP_REST_Request $request){
    global $wpdb;
    $params = json_decode($request->get_body());
    $wpdb->delete("{$wpdb->prefix}posts", array('post_type'=>$params->post_type,'ID' => $params->id));
    
    
    $resp = json_encode(
        ['status'=>'success','msg'=> $params->id .' deleted']
    );
    return json_decode($resp);
}
