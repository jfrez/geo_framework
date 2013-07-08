<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Framework extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('html.php',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function groups()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('groups');
			$crud->set_subject('Groups');
			$crud->required_fields('name');
			$crud->columns('name');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	function users()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('a3m_account');
			$crud->set_subject('Users');
			$crud->required_fields('user_id');
			$crud->columns('username','email','createdon','lastsignedinon');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function activity()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('activity');
			$crud->set_subject('Activities');
			$crud->required_fields('name','desc');
			$crud->columns('name');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	

	function user_group()
	{
			try{
			$crud = new grocery_CRUD();

			$crud->set_table('groups');
			$crud->set_relation_n_n('userlist','user_group','a3m_account','group','user','username');
			$crud->fields('name','userlist');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	

}
	function activity_group()
	{
			try{
			$crud = new grocery_CRUD();

			$crud->set_table('activity');
			$crud->set_relation_n_n('groups','activity_group','groups','group','activity','name');
			$crud->fields('name','groups');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	

}
	function activity_location()
	{
			try{
			$crud = new grocery_CRUD();

			$crud->set_table('activity_location');
			$crud->set_relation('activity','activity','name');
			$crud->fields('activity','lat','lng');
			$output = $crud->render();
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	

}
		function user_location()
	{
			try{
			$crud = new grocery_CRUD();

			$crud->set_table('user_location');
			$crud->set_relation('user','a3m_account','username');
			$crud->fields('user','lat','lng');
			$output = $crud->render();
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	

}

	
}
