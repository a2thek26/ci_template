<?php 
// must be within the CodeIgniter application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Public Page Controller
 *
 * Public Page controller file
 *
 * @category  envisionit media
 * @package   Public Page
 * @author    envisionit media <development@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0
 */

/**
 * Public Page
 *
 * Default public view controller
 * 
 * @category  envisionit media
 * @package   Public Page
 * @author    envisionit media <development@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0
 */
class Public_page extends CI_Controller 
{

  /**
   * Controller constructor
   * Load models and helpers
   */
  function __construct() 
  {
    parent::__construct();
  }
  
  /**
   * Displays index
   */
  function index() 
  {
    $data = array(
      'page'         => "page",
      'page_title'   => "Page Title",
      'message'      => $this->session->flashdata('message'),
      'main_content' => 'page_view'
      );

    // add js and css custom to this page
    $this->carabiner->js('');
    $this->carabiner->css('');

    $this->load->view('_includes/template_view', $data);
    
  }
}