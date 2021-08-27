<?php 
function aw_get_promos(){
    global $wpdb;
    $params = json_decode(json_encode([
        'post_status'=>isset($_GET['post_status']) ? $_GET['post_status']:null,
        'limit'=>isset($_GET['limit']) ? $_GET['limit'] : 10,
        'post_type'=>isset($_GET['post_type']) ? $_GET['post_type'] : 'post'
        ]));

    $sql_options = "";
    if($params->post_status){
        $sql_options = " AND post_status='$params->post_status'";
    }
    
    if($params->limit){
        $sql_options .= " LIMIT $params->limit";
    }
    $query_promos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type='$params->post_type' $sql_options");
    
    if(count($query_promos) == 0):
        $resp = json_encode(
            ['status'=>'error','promos'=> $params]
        );
        return json_decode($resp);
    endif;
    $resp = json_encode(
        ['status'=>'success','promos'=> $query_promos]
    );
    return json_decode($resp);
}