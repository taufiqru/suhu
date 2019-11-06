<?php 
defined('BASEPATH') or exit('no direct script allowed');
/**
 * 
 */
class Model_dashboard extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function getAllData($limit=0){
		//$current_date = date('Y-m-d');
		$current_date = '2019-09-30';
		$sql = "select * from (select id,cast(EVENT as time) as EVENT,temperature,humidity from data where TIMESTAMP('".$current_date."') order by id desc limit ".$limit.") sub order by id asc";
		$row = $this->db->query($sql)->result();
		return $row;
	}

	function allData(){
		$current_date = '2019-09-30';
		$this->db->select('id,cast(EVENT as time) as EVENT,temperature,humidity');
		$this->db->where('TIMESTAMP('.$current_date.')');
		return $this->db->get('data')->result();
	}

	function getData(){
		$this->db->select("id,cast(EVENT as time) as EVENT,temperature,humidity");
		$this->db->order_by('EVENT','desc');
		$row = $this->db->get('data','1')->result_array();
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