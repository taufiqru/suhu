<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->model('model_dashboard');
		$this->show('suhu/dashboard');
	}

	function show($page,$output=null){
		$this->load->view('basic/base/header');		
		$this->load->view('basic/base/wrapper-open');
		$this->load->view('basic/base/nav-header-front');
		$this->load->view('basic/base/nav-sidebar-front');
		$this->load->view($page,$output);
		$this->load->view('basic/base/footer');
		$this->load->view('basic/base/wrapper-close');	
	}



}
?>