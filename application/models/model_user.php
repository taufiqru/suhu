<?php
defined('BASEPATH') or exit('no direct script allowed!');

class model_user extends CI_Model{
	function auth($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$row=$this->db->get('xyz_user')->result_array();

		if(count($row)>0){
			return $row;
		}else{
			return 0;
		}
	}
}
?>