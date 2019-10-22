<?php 
defined('BASEPATH') or exit('no direct script allowed');

class View extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	
	function index(){
		$subject="Signature";
		$crud=new Grocery_CRUD_Extended();
		$crud->unset_jquery();
		$crud->set_table('wiki_signature');
		$crud->columns(array('signature_name','document'));
		$crud->callback_column('signature_name', array($this, '_full_text'));
		$crud->display_as('signature_name', 'Nama Signature');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->add_action('Baca Dokumen',base_url().'img/read.png','view/baca_dokumen/','baca',array($this,'callback_baca'));
		
		$output=$crud->render();
		$output->title_1=$subject;
		$output->title_2="";
		$this->show('wiki/detail',$output);
	}

	function show($page,$output=null){
		$this->load->view('hutan/base/header');		
		$this->load->view('hutan/base/wrapper-open');
		$this->load->view('hutan/base/nav-header-front');
		$this->load->view('hutan/base/nav-sidebar-front');
		$this->load->view($page,$output);
		$this->load->view('hutan/base/footer');
		$this->load->view('hutan/base/wrapper-close');	
	}

	function _full_text($value, $row){
		return $value = strip_tags(wordwrap($row->signature_name, 50, "<br>", true));
	}

	function callback_baca($primary_key,$row){
		return site_url('view/index').'?doc='.$row->document;
	}

	function baca_dokumen(){
		$this->load->view('wiki/modal.php');
		die();
	}
}
?>