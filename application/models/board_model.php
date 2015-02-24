<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function getList($bid, $page, $cntPerPage){
		$start = ($page-1) * $cntPerPage;
		
		$query = $this->db->query("SELECT * FROM board WHERE BID='$bid'");
		$total_record = $query->num_rows();
				
		$query = $this->db->query("SELECT * FROM board WHERE BID='$bid' ORDER BY PARENT DESC, IDX ASC LIMIT $start, $cntPerPage");
		
		
		return array("items"=>$query->result_array(), "total"=>$total_record);
	}
	
	function getContent($idx){
		return $this->db->query("SELECT * FROM board WHERE IDX='$idx' ")->row_array();
	}
	
	function add($bid, $title, $conten, $writer, $isReply, $parent, $file_info){
		$this->db->set('REG_DATETIME', 'NOW()', false);
		$this->db->insert('board',array(
				'BID'=>$bid,
				'SUBJECT'=>$title,
				'CONTENT'=>$conten,
				'WRITER'=>$writer,
				'PICTURE'=>$file_info['PICTURE'],
				'THUMBNAIL'=>$file_info['THUMB']				
		));
		$new_id = $this->db->insert_id();
		
		if($isReply == "Y"){
			$data = array('PARENT' => $parent);
		}else{
			$data = array('PARENT' => $new_id);
		}
		$this->db->where('IDX', $new_id);
		$this->db->update('board', $data);
		
		return $new_id;
		
	}
		
}