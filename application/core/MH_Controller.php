<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MH_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function _head(){
		$this->load->view("head");
	}
	
	function _footer(){
		
	}
	
	function _mainMenu(){
		
		
	}
}