<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {

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
	echo json_encode($r);
	}
	function single_activity_location($activity)
	{
	$this->db->select('*');
	$this->db->from('activity_location');
	$this->db->join('activity', 'activity_location.activity = activity.activity_id');
	$this->db->where('activity.activity_id', $activity); 
	$query = $this->db->get();
	$r = $query->result_array() ;
	echo json_encode($r);
	}

	function users_location()
	{
	$this->db->select('*');
	$this->db->from('user_location');
	$this->db->join('users', 'user_location.user = users.user_id');
	$query = $this->db->get();
	$r = $query->result_array() ;
	echo json_encode($r);
	}
        function single_users_location($user)
        {
        $this->db->select('*');
        $this->db->from('user_location');
        $this->db->join('users', 'user_location.user = users.user_id');
	$this->db->where('users.user_id', $user); 
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }
	function groups()
        {
        $this->db->select('*');
        $this->db->from('groups');
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }
	function group($id)
        {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->join('user_group', 'user_group.group = groups.group_id');
	$this->db->where('groups.group_id', $id); 
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }

	function user($id)
        {
        $this->db->select('*');
        $this->db->from('users');
	$this->db->where('users.user_id', $id); 
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }
	function users()
        {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }
	function activities()
        {
        $this->db->select('*');
        $this->db->from('activity');
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }
	function activity($id)
        {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('activity_group', 'activity_group.activity = activity.activity_id');
	$this->db->where('activity.activity_id', $id); 
        $query = $this->db->get();
        $r = $query->result_array() ;
        echo json_encode($r);
        }





	
}
