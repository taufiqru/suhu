<?php 
defined('BASEPATH') or exit('no direct script allowed');
/**
 * 
 */
class Model_dashboard extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function getAllData(){
		$row = $this->db->get('data')->result_array();
		return $row;
	}

	function getData($limit,$offset){
		$row = $this->db->get('data',$limit,$offset)->result_array();
		return $row;
	}

	function updateStats($val,$stats){
		if($stats == "temp_hi" or $stats == "temp_lo"){
			$this->db->set($stats,$val);
			$row = $this->db->update("temp_stats");
		}

		if($stats == "hum_hi" or $stats == "hum_lo"){
			$this->db->set($stats,$val);
			$row = $this->db->update("humi_stats");
		}
		
		return $row;
	}

}
?>