<?php 
defined('BASEPATH') or exit('No Direct Script Allowed!');
class Login extends CI_Controller{
	
	function index($status=null){
		$this->load->view('hutan/login');
	}

	function login_proses(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model('model_user');
		$result=$this->model_user->auth($username,$password);
		$this->mysessioncheck->createSession($result[0]);

		
		if($result!=0){
			//$this->settings_preference();
			redirect('main');
		}else{
			redirect('login/index/error');
		}
	}

	function logout(){
		$this->mysessioncheck->sessionDestroy('login');
	}

	function settings_preference(){
		$this->db->where('id_general_settings','1');
		$setting=$this->db->get('xyz_general_settings')->result();
		
		
		return 0;
	}



}
?>