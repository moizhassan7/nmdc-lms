<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statement_m extends MY_Model {

	protected $_table_name = 'statement';
	protected $_primary_key = 'statementID';
	protected $_primary_keyz = 'tr_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "statementID desc";

	public function __construct() {
		parent::__construct();
	}

	public function get_statement($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_order_by_statement($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	public function get_single_statement($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	public function insert_statement($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	public function update_statement($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}
	
	public function update_statementz($data, $id = NULL) {
		parent::updatez($data, $id);
		return $id;
	}
	
	public function update_statement_with_multicondition($array, $multiCondition) {
		$this->db->update($this->_table_name, $array, $multiCondition);
	}

	public function delete_statement($id){
		parent::delete($id);
	}

	public function get_statement_order_by_date($array) {
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('date >=',$array['fromdate']);
		$this->db->where('date <=',$array['todate']);
		$this->db->where('schoolyearID',$array['schoolyearID']);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_statement_order_by_with_date_schoolyear($array) {
		$this->db->select_sum('amount');
		$this->db->from($this->_table_name);
		if(isset($array['fromdate']) && isset($array['todate'])) {
			$this->db->where('date >=',$array['fromdate']);
			$this->db->where('date <=',$array['todate']);
		}
		if(isset($array['schoolyearID'])) {
			$this->db->where('schoolyearID',$array['schoolyearID']);
		}
		$query = $this->db->get();
		return $query->row();
	}

	public function get_statement_order_by_with_date_schoolyearz($array) {
		$this->db->select_sum('recamount');
		$this->db->from($this->_table_name);
		$this->db->where('type =','Received via Transfer');
		if(isset($array['fromdate']) && isset($array['todate'])) {
			$this->db->where('date >=',$array['fromdate']);
			$this->db->where('date <=',$array['todate']);
		}
		if(isset($array['schoolyearID'])) {
			$this->db->where('schoolyearID',$array['schoolyearID']);
		}
		if(isset($array['accountsID'])) {
			$this->db->where('accountsID',$array['accountsID']);
		}
		$query = $this->db->get();
		return $query->row();
	}

	public function get_statement_order_by_with_date_schoolyearzz($array) {
		$this->db->select_sum('sntamount');
		$this->db->from($this->_table_name);
		$this->db->where('type =','Sent via Transfer');
		if(isset($array['fromdate']) && isset($array['todate'])) {
			$this->db->where('date >=',$array['fromdate']);
			$this->db->where('date <=',$array['todate']);
		}
		if(isset($array['schoolyearID'])) {
			$this->db->where('schoolyearID',$array['schoolyearID']);
		}
		if(isset($array['accountsID'])) {
			$this->db->where('accountsID',$array['accountsID']);
		}
		$query = $this->db->get();
		return $query->row();
	}
	
	/* define for 4.4 */
	public function get_statement_with_user($array = ['statement.schoolyearID' => 1])
    {
        $this->db->select('statement.*, systemadmin.name as aname, teacher.name as tname, student.name as sname, parents.name as pname, user.name as uname');
        $this->db->from('statement');
        $this->db->join('systemadmin', 'systemadmin.usertypeID = statement.usertypeID AND systemadmin.systemadminID = statement.userID' , 'LEFT');
        $this->db->join('teacher', 'teacher.usertypeID = statement.usertypeID AND teacher.teacherID = statement.userID', 'LEFT');
        $this->db->join('student', 'student.usertypeID = statement.usertypeID AND student.studentID = statement.userID', 'LEFT');
        $this->db->join('parents', 'parents.usertypeID = statement.usertypeID AND parents.parentsID = statement.userID', 'LEFT');
        $this->db->join('user', 'user.usertypeID = statement.usertypeID AND user.userID = statement.userID', 'LEFT');
        $this->db->where($array);
        $this->db->order_by($this->_order_by);
        $query = $this->db->get();
        return $query->result();
    }
}