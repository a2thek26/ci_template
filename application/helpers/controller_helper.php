<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in() {
 	$ci=& get_instance();

	$is_logged_in = $ci->session->userdata('is_logged_in');
	
	if(!isset($is_logged_in) || $is_logged_in != true) {
		$ci->session->set_flashdata('message', 'You need to login to access this section.');
		redirect('login');
	}
}


function array_multi_unique($array, $preserveKeys = false) {
    // Unique Array for return
    $arrayRewrite = array();
    // Array with the md5 hashes
    $arrayHashes = array();
    foreach($array as $key => $item) {
        // Serialize the current element and create a md5 hash
        $hash = md5(serialize($item));
        // If the md5 didn't come up yet, add the element to
        // to arrayRewrite, otherwise drop it
        if (!isset($arrayHashes[$hash])) {
            // Save the current element hash
            $arrayHashes[$hash] = $hash;
            // Add element to the unique Array
            if ($preserveKeys) {
                $arrayRewrite[$key] = $item;
            } else {
                $arrayRewrite[] = $item;
            }
        }
    }
    return $arrayRewrite;
}