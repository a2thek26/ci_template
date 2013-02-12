<?php 
/**
 * Data Model
 * 
 * File containing the model interface for data. 
 * 
 * @category   eim
 * @package    Data
 * @author     envisionit media <development@eimchicago.com>
 * @copyright  (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version    1.0.0 
 */

// must be within the code initer application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Data Model
 * 
 * Class interface for the data system
 * 
 * @category   eim
 * @package    Data
 * @author     envisionit media <development@eimchicago.com>
 * @copyright  (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version    1.0.0 
 */

class Data extends MY_Model 
{
	
  /**
   * Class Constructor.
   * Change fields, tableName, and keyField based on database table
   */
	function __construct() 
  {
    $fields    = array( 'id',
                        'name',
                        'description');    
    $tableName = "{PRE}data";   
    $keyField  = "id";
    
    parent::__construct($fields, $tableName, $keyField);
  }
}