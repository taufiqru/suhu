<?php
defined('BASEPATH') or exit('no direct script allowed');

class History extends CI_Controller{
	function __construct(){
		parent::__construct();
		
	}

	function temperature(){
		//$subject = "Temperature History";
		$crud = new Grocery_CRUD_Extended();
		$crud->unset_jquery();
		$crud->unset_bootstrap();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_table('data');
		//$crud->set_subject($subject);
		$crud->columns('EVENT','temperature');
		$output = $crud->render();
		$output->title = "History";
		$output->subtitle = "Temperature Graph & Table";
		$output->subject = "Temperature";

		$this->show('suhu/history',$output);	
	}

	function humidity(){
		$subject = "Humidity History";
		$crud = new Grocery_CRUD_Extended();
		$crud->unset_jquery();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_table('data');
		$crud->set_subject($subject);
		$crud->columns('EVENT','humidity');
		$output = $crud->render();
		$output->title = "History";
		$output->subtitle = "Humidity Graph & Table";
		$output->subject = "Humidity";

		$this->show('suhu/history',$output);	
	}

	function show($page,$output=null){
		$this->load->view('basic/base/header');		
		$this->load->view('basic/base/wrapper-open');
		$this->load->view('basic/base/nav-header-front');
		$this->load->view('basic/base/nav-sidebar-front');
		$this->load->view($page,$output);
		$this->load->view('basic/base/footer');
		$this->load->view('basic/base/wrapper-close');	
	}
}