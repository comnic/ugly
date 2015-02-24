<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends MH_Controller {
	private $_bid = "001";
	private $_page = 1;
	private $_idx = "1";
	
	private $_cntPerPage = 9;
	
	private $_segment;
	
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('board_model');
		
		$this->_segment = $this->uri->segment_array();
		
	}
	
	public function index()
	{
		$this->_head();		

		if(count($this->_segment) >= 3)
			$this->_bid = $this->_segment[3];
		if(count($this->_segment) >= 4)
			$this->_page = $this->_segment[4];

		$data = $this->board_model->getList($this->_bid, $this->_page, $this->_cntPerPage);
		
		$data['bid'] = $this->_bid;
		$data['page'] = $this->_page;
		$data['cntPerPage'] = $this->_cntPerPage;
		
		//$this->load->view('board_list', array("data"=>$data));
		$this->load->view('board_list_gallery', array("data"=>$data));
	}
	
	public function read($idx){		
		$this->_head();
		$data = $this->board_model->getContent($idx);
		$this->load->view('board_view', array("data"=>$data));
		
	}
	
	public function write($bid){
		$this->_head();
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('content', '본문', 'required');
		
		$this->form_validation->set_rules('writer', '작성자', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if(count($this->_segment) >= 4 && $this->_segment[4] == "reply")
				$this->load->view('board_write', array("bid"=>$bid, "is_reply"=>"Y", "parent"=>$this->_segment[5]));
			else
				$this->load->view('board_write', array("bid"=>$bid, "is_reply"=>"N", "parent"=>"0"));
		}
		else
		{
			

			//업로드된 이미지를 최대 1024사이즈로 변경한다.
			$file_info = $this->img_upload('attach_file', 1024);
			
			$new_bid = $this->board_model->add(
						$bid, 
						$this->input->post('title'), 
						$this->input->post('content'), 
						$this->input->post('writer'), 
						$this->input->post('is_reply'), 
						$this->input->post('parent'), 
						$file_info
				);
				
				$this->load->helper('url');
				redirect('/board/read/'.$new_bid);
				
			

		}
	}
	
	
	/**
	 * Upload한 이미지를 저장 하고 사이즈가 정사각형인 이미지로 썸네일 만든다.
	 * @param String $upload_file
	 * @param String $target_file
	 * @param String $s
	 */
	function img_upload($upload_file, $s = 90) {
		$ret = FALSE;
	
		// 이미지 업로드 설정
		$cfg = array(
				'upload_path' => './static/upload',
				'allowed_types' => 'gif|jpg|png'
		);
	
		$this->load->library('upload', $cfg);
	
		if ($this->upload->do_upload($upload_file)) {
			$data = $this->upload->data();
			
			list($w, $h) = getimagesize($data['full_path']);
			$upload_file = $data['full_path'];
			
			//가로가 1024보다 크면 리사이징한다.
			if($w > 1024){
				$s2 = ($h*$s)/$w;
				$config = array(
					'image_library' => 'gd2',
					'source_image' => $data['full_path'],
					'new_image' => $cfg['upload_path'] . '/'  . $data['file_name'],
					'width' => $s,
					'height' => $s2
				);
	
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$upload_file = $config['new_image'];				
			}

 			list($w, $h) = getimagesize($upload_file);
 			$s = 300;
 			$s2 = round(($h*$s)/$w);
 			
			$config = array(
					'image_library' => 'gd2',
					'source_image' => $upload_file,
					'new_image' => $cfg['upload_path'].'/thumb_' . $data['file_name'],
					'width' => $s,
					'height' => $s2
			);

			$this->load->library('image_lib', $config);
			//$this->image_lib->resize();
			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}
			
				
			$ret = array('PICTURE'=>'/static/upload/' . $data['file_name'], 'THUMB'=>'/static/upload/thumb_' . $data['file_name']);
		}
	
		return $ret;
	}
	
	function _head(){
		$this->load->view("head");
		$this->load->view("board_head");
	}
	
}