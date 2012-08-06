<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php
require(APPPATH.'/libraries/REST_Controller.php');

class Data extends REST_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('data_model');

	}
	
	function songs_get() {
		$id 	= $this->get('id');
		$songs	= $this->data_model->get_songs_by_album_id($id);
		
		if($songs) {
			$data['playlist'] 	= $songs;
			$data['success']	= TRUE;
		} else {
			$data['error']		= "There was an error finding the requested album.";
		}
		$this->response($data, 200);
	}
}