<?php
defined('BASEPATH') or exit('no direct script allowed');

class History extends CI_Controller{
	function __construct(){
		parent::__construct();
		
	}

	function temperature($date=null){
		($date==null)?$date=date('Y-m-d'):$date;

		$lower = $date.' 00:00:00';
		$upper = $date.' 23:59:59';

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
		$crud->where([
				'EVENT >= ' => $lower,
				'EVENT <= ' => $upper
			]);
		
		
		$output = $crud->render();
		$output->title = "History";
		$output->subtitle = "Temperature Graph & Table";
		$output->subject = "Temperature";
		$output->date = $date;

		$this->show('suhu/history',$output);	
	}

	function humidity($date=null){
		($date==null)?$date=date('Y-m-d'):$date;

		$lower = $date.' 00:00:00';
		$upper = $date.' 23:59:59';
		$subject = "Humidity History";
		$crud = new Grocery_CRUD_Extended();
		$crud->unset_jquery();
		$crud->unset_bootstrap();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_table('data');
		$crud->set_subject($subject);
		$crud->columns('EVENT','humidity');
		$crud->where([
				'EVENT >= ' => $lower,
				'EVENT <= ' => $upper
			]);
		$output = $crud->render();
		$output->title = "History";
		$output->subtitle = "Humidity Graph & Table";
		$output->subject = "Humidity";
		$output->date = $date;

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