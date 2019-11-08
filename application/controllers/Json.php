<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Json extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_dashboard');
		
	}

	function index(){
		$data = $this->model_dashboard->getData();
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
		$db = $this->model_dashboard->getAllData(20);
		$data = array();
  		$json = array();
  		foreach($db as $row):
			$data['x'] = $row->$field;
			$data['y'] = $row->EVENT;
			array_push($json,$data);
		endforeach;	
		
		echo json_encode($json);
	}

	function history(){
		$field = $this->uri->segment(3);
		$date = $this->uri->segment(4);
		$db = $this->model_dashboard->allData($date);
		$data = array();
  		$json = array();
  		foreach($db as $row):
			$data['x'] = $row->$field;
			$data['y'] = $row->EVENT;
			array_push($json,$data);
		endforeach;	
		
		echo json_encode($json);
	}

}

?>