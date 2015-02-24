<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function add($data){
		$this->db->set('MB_ID', $data['id']);
		$this->db->set('MB_PASSWORD', $data['password']);
		$this->db->set('MB_NAME', $data['name']);
		$this->db->set('MB_EMAIL', $data['email']);
		$this->db->set('MB_REG_DATE', 'NOW()', false);
		
		$this->db->insert("member");
		$result = $this->db->insert_id();
		
		return $return;
	}
	
}