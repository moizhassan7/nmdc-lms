<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liability_m extends MY_Model {

	protected $_table_name = 'liability';
	protected $_primary_key = 'liabilityID';
	protected $_primary_keyz = 'tr_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "liabilityID desc";

	function __construct() {
		parent::__construct();
	}

	function get_liability($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_single_liability($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_order_by_liability($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_liability($array) {
		$error = parent::insert($array);
		return TRUE;
	}
	
	function update_liability($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}
	
	public function update_liabilityz($data, $id = NULL) {
		parent::updatez($data, $id);
		return $id;
	}

	public function delete_liability($id){
		parent::delete($id);
	}

	public function user_liability($table, $username, $email){
		$query = $this->db->get_where($table, array("username" => $username, "email" => $email));
		return $query->row();
	}

	public function get_liability_order_by_date($array) {
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('date >=',$array['fromdate']);
		$this->db->where('date <=',$array['todate']);
		$this->db->where('schoolyearID',$array['schoolyearID']);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_liability_order_with_date_schoolyear($array) {
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
	
	public function get_liability_order_by_with_date_schoolyear($array) {
		$this->db->select_sum('amount');
		$this->db->from($this->_table_name);
		$this->db->where('liability !=',1);
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
    public function get_liability_with_user($array = ['liability.schoolyearID' => 1])
    {
        $this->db->select('liability.liabilityID, liability.create_date, liability.date, liability.liabilityday, liability.liabilitymonth, liability.liabilityyear, liability.liability, liability.amount, liability.file, liability.userID, liability.usertypeID, liability.schoolyearID, liability.note, systemadmin.name as aname, teacher.name as tname, student.name as sname, parents.name as pname, user.name as uname');
        $this->db->from('liability');
        $this->db->join('systemadmin', 'systemadmin.usertypeID = liability.usertypeID AND systemadmin.systemadminID = liability.userID' , 'LEFT');
        $this->db->join('teacher', 'teacher.usertypeID = liability.usertypeID AND teacher.teacherID = liability.userID', 'LEFT');
        $this->db->join('student', 'student.usertypeID = liability.usertypeID AND student.studentID = liability.userID', 'LEFT');
        $this->db->join('parents', 'parents.usertypeID = liability.usertypeID AND parents.parentsID = liability.userID', 'LEFT');
        $this->db->join('user', 'user.usertypeID = liability.usertypeID AND user.userID = liability.userID', 'LEFT');
        $this->db->where($array);
        $this->db->order_by($this->_order_by);
        $query = $this->db->get();
        return $query->result();
    }



}

/* End of file liability_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/liability_m.php */