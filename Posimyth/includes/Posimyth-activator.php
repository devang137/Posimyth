<?php
class Posimyth_Activator_plugin {
	public static function activate() {
            global $wpdb;
        
             $DBP_tb_name=$wpdb->prefix . "Posimyth";
             $sql_query_to_create_table = "CREATE TABLE $DBP_tb_name (
                                     id int(11) NOT NULL AUTO_INCREMENT,
                                     First_name varchar(255) DEFAULT NULL,
                                     Last_name varchar(255) DEFAULT NULL,
                                     Email varchar(255) DEFAULT NULL,
                                     Number varchar(255) DEFAULT NULL,
                                     PRIMARY KEY (id)
                                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1"; 
        
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
                dbDelta($sql_query_to_create_table);
	}
}