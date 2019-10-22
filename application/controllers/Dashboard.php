<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->model('model_dashboard');
		$output['data']=$this->model_dashboard->getAllData();
		$this->show('wiki/dashboard',$output);
	}

	function show($page,$output=null){
		$this->load->view('hutan/base/header');		
		$this->load->view('hutan/base/wrapper-open');
		$this->load->view('hutan/base/nav-header-front');
		$this->load->view('hutan/base/nav-sidebar-front');
		$this->load->view($page,$output);
		$this->load->view('hutan/base/footer');
		$this->load->view('hutan/base/wrapper-close');	
	}



}
?>