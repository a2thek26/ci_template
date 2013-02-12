<?
// must be within the CodeIgniter application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Require Rest Controller
 */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Data API Controller
 * 
 * File Containing the Data API controller
 * 
 * @category  envisionit media
 * @package   Data API
 * @author    envisionit media <development@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0 
 */

/**
 * Data API Controller
 * 
 * Data API controller
 * 
 * @category  eim
 * @package   Data API
 * @author    envisionit media <development@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0 
 */
class Data extends REST_Controller
{

  /**
   * Controller Constructor.
   */
  function __construct() 
  {
    parent::__construct();
    $this->load->model('data');
  }
  
  /**
   * Simple get request
   * Respond with ajax_response(TRUE|FALSE, 'Message', array());
   * @return void
   */
  function data_get() 
  {
    // not an actual call, just for example
    $this->data->loadFromDb($this->get('id'));
    $data = $this->data->getValues();
    
    if($data) {
      $this->ajax_response(TRUE, '', $data);
    } else {
      $this->ajax_response(FALSE, 'There was an error finding the requested album.');
    }   
  }
}