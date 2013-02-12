<?php
// must be within the CodeIgniter application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Database Helper
 * 
 * File containing the helper methods for database. 
 * 
 * @category   eim
 * @package    Helpers
 * @author     envisionit media <development@eimchicago.com>
 * @copyright  (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version    1.0.0 
 */

/**
 * Takes in a query, returns an assoc array with the specified field as the key and value
 * @param  string $q     SQL query
 * @param  string $field Field name
 * @param  *      $value Value to match
 * @return array
 */
function assoc_arr_query($q, $field, $value) 
{
  $ci=& get_instance();
  $ci->load->database();
      
  $arr   = array();
  $query = $ci->db->query($q);
  $rows  = $query->result_array();

  foreach ($rows as $row) {
    $arr[$row[$field]] = $row[$value];
  }
  return $arr;
}
  
/**
 * Takes in a query, returns array of specified field
 * @param  string $q     SQL query
 * @param  string $field Field name
 * @return array
 */
function arr_query($q, $field) 
{
  $ci=& get_instance();
  $ci->load->database();
      
  $arr   = array();
  $query = $ci->db->query($q);
  $rows  = $query->result_array();
  
  $count = 0;
    foreach ($rows as $row) {
    $arr[$count] = $row[$field];
    $count++;
  }
  return $arr;
  }

/**
 * Returns single result
 * @param  string $q     SQL query
 * @param  string $field Field to return
 * @return string/int/boolean
 */
function single_result($q, $field) 
{
  $ci=& get_instance();
  $ci->load->database();

  $query     = $ci->db->query($q);
  $resultRow = $query->result();
  
  if (isset($resultRow[0])) return $resultRow[0]->$field;
  else return 0;
}

/**
 * Return single result
 * @param  string $q     SQL query
 * @param  string $field Field to return
 * @return string/int/boolean
 * @deprecated use single_result()
 */
function oneResQuery($q, $field) 
{
  return single_result($q, $field);
}
