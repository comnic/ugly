<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function getList($kind, $cat, $page, $cntPerPage){
		$start = ($page-1) * $cntPerPage;
		
		$sqlWhere = " c_kind='$kind' ";
		if($cat != 0 && $cat != "")
			$sqlWhere .= " AND mc_idx = '$cat' ";
		
		$query = $this->db->query("SELECT * FROM contents WHERE $sqlWhere ");
		$total_record = $query->num_rows();

		$query = $this->db->query("SELECT c_idx as idx, mc_idx as category, c_kind as kind, c_title as title, c_count as cnt, c_img as img FROM contents WHERE $sqlWhere ORDER BY c_idx DESC LIMIT $start, $cntPerPage");

		
		return array("items"=>$query->result_array(), "total"=>$total_record);
	}
	
	function getContent($idx){
		return $this->db->query("SELECT c_idx as idx, mc_idx as category, c_kind as kind, c_title as title, c_summary as summary, c_movie_link as movie_link, c_count as cnt FROM contents WHERE c_idx='$idx' ")->row_array();
	}

}