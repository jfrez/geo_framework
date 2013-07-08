<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
	}
	
	

	function activity_location()
	{
$this->db->select('*');
$this->db->from('activity_location');
$this->db->join('activity', 'activity_location.activity = activity.activity_id');
$query = $this->db->get();

	$r = $query->result_array() ;
	   $this->load->view('map',array('locations'=>$r));


	}
	function user_location()
	{
	
$this->db->select('*');
$this->db->from('user_location');
$this->db->join('users', 'user_location.user = users.user_id');
$query = $this->db->get();
	$r = $query->result_array() ;
	   $this->load->view('map',array('locations'=>$r));
	


	}

	
}
