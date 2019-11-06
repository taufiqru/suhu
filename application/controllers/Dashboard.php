<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_dashboard');
	}

	function index(){
		$this->show('suhu/dashboard');
	}

	function xtemp(){
		$result = $this->model_dashboard->getAllData();
		$dataset = array();
  		foreach($result as $row):
			array_push($dataset,$row->temperature);
		endforeach;
		echo json_encode($dataset);
	}

	function ytemp(){
		$result = $this->model_dashboard->getAllData();
		$dataset = array();
  		foreach($result as $row):
			array_push($dataset,$row->EVENT);
		endforeach;
		echo json_encode($dataset);
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