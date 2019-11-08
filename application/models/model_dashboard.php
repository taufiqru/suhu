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
		$current_date = date('Y-m-d').' 00:00:00';
		//$current_date = '2019-09-30 00:00:00';
		$sql = "select * from (select id,cast(EVENT as time) as EVENT,temperature,humidity from data where EVENT > '".$current_date."' order by id desc limit ".$limit.") sub order by id asc";
		$row = $this->db->query($sql)->result();
		return $row;
	}

	function allData($date){
		$lower = $date.' 00:00:00';
		$upper = $date.' 23:59:59';
		
		// $lower = '2019-09-30 00:00:00';
		// $upper = '2019-09-30 23:59:59';

		$this->db->select('id,cast(EVENT as time) as EVENT,temperature,humidity');
		$this->db->where("EVENT between '".$lower."' and '".$upper."'");
		return $this->db->get('data')->result();
	}

	function getData(){
		$lower = date('Y-m-d').' 00:00:00';
		$upper = date('Y-m-d').' 23:59:59';
		//$current_date = date('Y-m-d').' 00:00:00';
		//$current_date = '2019-09-30';
		$this->db->select("id,cast(EVENT as time) as EVENT,temperature,humidity");
		$this->db->where("EVENT between '".$lower."' and '".$upper."'");
		$this->db->order_by('id','desc');
		$row = $this->db->get('data','1')->result();
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