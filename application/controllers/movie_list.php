<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie_list extends MH_Controller {

	public function index()
	{
		$this->load->view('head');
		
		$this->load->view('footer');
	}
	
	function dashboard(){
			
	}
}