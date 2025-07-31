<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomehead_m extends MY_Model {

	protected $_table_name = 'income_heads';
	protected $_primary_key = 'incomeheadID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "incomeheadID desc";

	function __construct() {
		parent::__construct();
	}

	function get_incomehead($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_single_incomehead($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_order_by_incomehead($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_incomehead($array) {
		$error = parent::insert($array);
		return TRUE;
	}
	
	function update_incomehead($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_incomehead($id){
		parent::delete($id);
	}

	public function user_incomehead($table, $username, $email){
		$query = $this->db->get_where($table, array("username" => $username, "email" => $email));
		return $query->row();
	}

	public function get_incomehead_order_by_date($array) {
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('date >=',$array['fromdate']);
		$this->db->where('date <=',$array['todate']);
		$this->db->where('schoolyearID',$array['schoolyearID']);
		$query = $this->db->get();
		return $query->result();
	}

}

/*
	public function get_incomehead_order_with_date_schoolyear($array) {
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

    /* define for 4.4
    public function get_incomehead_with_user($array = ['income.schoolyearID' => 1])
    {
        $this->db->select('income.incomeID, income.create_date, income.date, income.incomeday, income.incomemonth, income.incomeyear, income.income, income.amount, income.file, income.userID, income.usertypeID, income.schoolyearID, income.note, systemadmin.name as aname, teacher.name as tname, student.name as sname, parents.name as pname, user.name as uname');
        $this->db->from('income');
        $this->db->join('systemadmin', 'systemadmin.usertypeID = income.usertypeID AND systemadmin.systemadminID = income.userID' , 'LEFT');
        $this->db->join('teacher', 'teacher.usertypeID = income.usertypeID AND teacher.teacherID = income.userID', 'LEFT');
        $this->db->join('student', 'student.usertypeID = income.usertypeID AND student.studentID = income.userID', 'LEFT');
        $this->db->join('parents', 'parents.usertypeID = income.usertypeID AND parents.parentsID = income.userID', 'LEFT');
        $this->db->join('user', 'user.usertypeID = income.usertypeID AND user.userID = income.userID', 'LEFT');
        $this->db->where($array);
        $this->db->order_by($this->_order_by);
        $query = $this->db->get();
        return $query->result();
    }



}

/* End of file income_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/income_m.php */