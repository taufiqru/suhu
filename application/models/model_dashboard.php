<?php 
defined('BASEPATH') or exit('no direct script allowed');
/**
 * 
 */
class Model_dashboard extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function getAllData($field){
		$current_date = date('Y-m-d');
		$sql = "select $field from (select * from data where TIMESTAMP('".$current_date."') order by id desc limit 100) sub order by id asc";
		$row = $this->db->query($sql)->result_array();
		return $row;
	}

	function getData($limit,$offset){
		$current_date = date('Y-m-d');
		$this->db->where('TIMESTAMP('.$current_date.')');
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