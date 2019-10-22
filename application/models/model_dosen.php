<?php 

class Model_dosen extends CI_Model{
	function getDataDosen(){
		$this->load->database();

		$this->db->where('nama','rapat');
		return $this->db->get('event');

	}

	function login($username,$password){
		$this->load->database();

		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('user');
	}
}

?>