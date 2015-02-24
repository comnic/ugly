<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MH_Controller {

	function __construct(){
		parent::__construct();		
	}

	function login(){
		$this->_header();
		
		$this->load->view("login");
		
		$this->_footer();
	}
	
	function authentication(){
		$id = $this->input->post("id");
		$passwd = $this->input->post("password");
		
		if($id == "comnic" && $passwd == "1234"){
			$this->session->set_userdata("is_login", true);
			$this->load->helper('url');
			redirect("/board");	
			
		}else{
			
			echo("아이디나 비번이 잘못 되었습니다.");
			
		}
		
		
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/board');
	}
	
	function register(){
		$this->_header();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('m_id', '아이디', 'required|min_length[5]|max_length[20]|is_unique[member_basic.MB_ID]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
		$this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
		$this->form_validation->set_rules('name', '이름', 'required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[member_basic.MB_EMAIL]');
		
		if($this->form_validation->run() === false){
        	$this->load->view('register');
    	} else {
        	if(!function_exists('password_hash')){
            	$this->load->helper('password');
        	}
        	$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
 
        	$this->load->model('member_model');
        	$this->member_model->add(array(
            	'id'=>$this->input->post('id'),
            	'password'=>$hash,
        		'name'=>$this->input->post('name'),
        		'email'=>$this->input->post('email')
        	));
 
        	$this->session->set_flashdata('message', '회원가입에 성공했습니다.');
        	$this->load->helper('url');
        	redirect('/');
    	}
 		
		
		
		$this->_footer();		
	}
	
	
	function _header(){
		$this->load->view("head");
	}
	
	function _footer(){
	
	
	}
}

?>