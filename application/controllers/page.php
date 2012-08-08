<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Predefined Keys
|--------------------------------------------------------------------------
|
| Parameters to pass to views.
|
| $data['page']				//string - body id (required)
| $data['page_title']		//string - page title (required)
| $data['main_content']		//string - page_view (required)
| $data['message']			//string - message (optional)
*/ 

class Page extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		
		$data['page'] 			= "page";
		$data['page_title'] 	= "Page Title";
		$data['message']		= $this->session->flashdata('message');
		$data['main_content'] 	= 'page_view';
		
		$this->load->view('includes/template_view', $data);
		
	}
}