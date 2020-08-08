<?php

class Posimyth_Deactivator_plugin{
	public static function deactivate(){
        global $wpdb;
            $DBP_tb_name=$wpdb->prefix . "Posimyth";
            $wpdb->query("DROP table IF Exists $DBP_tb_name");
    }
}