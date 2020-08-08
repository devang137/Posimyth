<?php

add_action('wp_ajax_data_submit', 'data_submit');
function data_submit(){
    global $wpdb;               
    $insert_data = $wpdb->prefix . "posimyth";

    $wpdb->insert($insert_data,
			array(
					'First_name' => ucfirst($_REQUEST['firstname']),
					'Last_name' => $_REQUEST['lastname'],
					'Email' => $_REQUEST['em'],
					'Number' => $_REQUEST['numb']
			),
			array('%s','%s','%s','%d')
		);  
    
    die();
}


add_action('wp_ajax_delete_row', 'delete_row');
function delete_row(){
    global $wpdb;
    $delete_data = $wpdb->prefix . "posimyth";
        
    foreach($_REQUEST["idd"] as $de){
        $wpdb->delete( $delete_data, [ 'ID' => $de ], [ '%d' ] );
    }

    wp_die();
}

add_action('wp_ajax_update_data', 'update_data');
function update_data(){
    global $wpdb;
    $update_tabel = $wpdb->prefix . "posimyth";
    
    $wpdb->update( $update_tabel,array( 
        'First_name'=>$_REQUEST["up_fname"],
        'Last_name'=>$_REQUEST["up_lname"],
        'Email'=>$_REQUEST["up_email"],
        'Number'=>$_REQUEST["up_number"]
        ), 
        array(
        'id' => $_REQUEST["up_id"]
        )
    );

    wp_die();
}