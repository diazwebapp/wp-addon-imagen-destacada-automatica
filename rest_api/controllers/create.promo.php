<?php 
function aw_create_promo(WP_REST_Request $request){
    global $wpdb;
    $params = json_decode($request->get_body());

    if($params->post_type=='promos'):
        $query_promos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts where post_type='promos' AND post_title='$params->post_title' ");
        if(count($query_promos) > 0){
            $resp = json_encode(
                ['status'=>'error','msg'=>'duplicated']
            );
            return json_decode($resp);
        }
        $id_promo = wp_insert_post([
            'post_title' => $params->post_title,
            'post_status' => 'pending',
            'post_type' => 'promos'
        ]);
        update_post_meta($id_promo,'background_color',$params->background_color);
        update_post_meta($id_promo,'title_color',$params->title_color);
        update_post_meta($id_promo,'list_item_border_color',$params->list_item_border_color);
        update_post_meta($id_promo,'bono',$params->bono);
        update_post_meta($id_promo,'refear_link',$params->refear_link);
        update_post_meta($id_promo,'logo_link',$params->logo_link);
        $resp = json_encode(
            ['status'=>'success','msg'=> $params->post_title .' created']
        );
        return json_decode($resp);
    endif;
    if($params->post_type=='banners'):
        $query_banners = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts where post_type='banners' AND post_title='$params->post_title' ");
        if(count($query_banners) > 0){
            $resp = json_encode(
                ['status'=>'error','msg'=>'duplicated']
            );
            return json_decode($resp);
        }
        $id_banner = wp_insert_post([
            'post_title' => $params->post_title,
            'post_status' => 'pending',
            'post_type' => 'banners'
        ]);
        update_post_meta($id_banner,'background_color',$params->background_color);
        update_post_meta($id_banner,'background_button',$params->background_button);
        update_post_meta($id_banner,'text_color_button',$params->text_color_button);
        update_post_meta($id_banner,'title_color',$params->title_color);
        update_post_meta($id_banner,'background_logo',$params->background_logo);
        update_post_meta($id_banner,'logo_link',$params->logo_link);
        update_post_meta($id_banner,'refear_link',$params->refear_link);
        
        $resp = json_encode(
            ['status'=>'success','msg'=> $params->post_title .' created']
        );
        return json_decode($resp);
    endif;
}