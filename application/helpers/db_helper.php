<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('assoc_arr_query')) {
    
	//Takes in a query, returns an assoc array with the specified field as the key and value
	function assoc_arr_query($q, $field, $value) {
	 	$ci=& get_instance();
        $ci->load->database();
        
		$arr = array();
		$query = $ci->db->query($q);
    	$rows = $query->result_array();

    	foreach ($rows as $row) {
			$arr[$row[$field]] = $row[$value];
		}
		return $arr;
    }
 }
 
 if ( ! function_exists('arr_query')) {
    
	//Takes in a query, returns an assoc array with the specified field as the key and value
	function arr_query($q, $field) {
	 	$ci=& get_instance();
        $ci->load->database();
        
		$arr = array();
		$query = $ci->db->query($q);
    	$rows = $query->result_array();
		
		$count = 0;
    	foreach ($rows as $row) {
			$arr[$count] = $row[$field];
			$count++;
		}
		return $arr;
    }
 }

if ( ! function_exists('oneResQuery')) {

	function oneResQuery($q, $field) {
	 	$ci=& get_instance();
        $ci->load->database();

        $query = $ci->db->query($q);
        $resultRow = $query->result();
        
        if (isset($resultRow[0])) return $resultRow[0]->$field;
        else return 0;
	}
}
?>