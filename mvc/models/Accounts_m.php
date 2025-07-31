<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts_m extends MY_Model {

	protected $_table_namez = 'statement';
	protected $_table_name = 'accounts';
	protected $_primary_key = 'accountsID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "accountsID asc";

	function __construct() {
		parent::__construct();
	}

	function get_accounts($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_single_accounts($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_order_by_accounts($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_accounts($array) {
		$error = parent::insert($array);
		return TRUE;
	}
	
	function update_accounts($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

/*	public function delete_accounts($id){
		parent::delete($id);
	}
*/
	public function user_accounts($table, $username, $email){
		$query = $this->db->get_where($table, array("username" => $username, "email" => $email));
		return $query->row();
	}

	public function get_accounts_order_by_date($array) {
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('date >=',$array['fromdate']);
		$this->db->where('date <=',$array['todate']);
		$this->db->where('schoolyearID',$array['schoolyearID']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_recamount($array) {
		$this->db->select_sum('recamount');
		$this->db->from($this->_table_namez);
		$this->db->where('accountsID',$array);
		//$this->db->where('schoolyearID',$array['schoolyearID']);
		$query = $this->db->get();
		return $query->row();
	}

}