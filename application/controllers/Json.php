<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Json extends CI_Controller{

	function index(){
		$this->load->model('model_dashboard');
		$limit = $this->uri->segment(3);
		$offset = $this->uri->segment(4);

		$data = $this->model_dashboard->getData($limit,$offset);
		echo '{"Event" : "'.$data[0]["EVENT"].'","Temperature" : '.$data[0]["temperature"].',"Humidity" : '.$data[0]["humidity"].'}';

	}

	function update(){
		$this->load->model('model_dashboard');
		$stats = $this->input->get('stats');
		$value = $this->input->get('value');

		
		$data = $this->model_dashboard->updateStats($value,$stats);
		echo json_encode($data);
	}
}

?>