<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Json extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_dashboard');
		
	}

	function index(){
		$limit = $this->uri->segment(3);
		$offset = $this->uri->segment(4);

		$data = $this->model_dashboard->getData($limit,$offset);
		//print_r($data);
		echo json_encode($data);

	}

	function update(){
		$stats = $this->input->get('stats');
		$value = $this->input->get('value');

		
		$data = $this->model_dashboard->updateStats($value,$stats);
		echo json_encode($data);
	}

	function init_data(){
		$field = $this->uri->segment(3);
		$data = $this->model_dashboard->getAllData($field);
		echo json_encode($data);
	}
}

?>