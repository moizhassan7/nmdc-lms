<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenseheads extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL / COLLEGE MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			KIT & SWITCH 2 ITECH TEAM
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY KING IT CENTRE
| -----------------------------------------------------
*/
	function __construct() {
		parent::__construct();
		$this->load->model("Expensehead_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('expense', $language);
	}

	public function index() {
		$schoolyearID = $this->session->userdata('defaultschoolyearID');
		$this->data['alluser'] = getAllUserObjectWithStudentRelation(array('schoolyearID' => $schoolyearID));
		$this->data['expenses'] = $this->Expensehead_m->get_order_by_expensehead(array('schoolyearID' => $schoolyearID));
		$this->data["subview"] = "expenseheads/index";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
				 array(
					'field' => 'expense_head',
					'label' => $this->lang->line("expense_expense"),
					'rules' => 'trim|required|xss_clean|max_length[128]'
				)
			);
		return $rules;
	}

	public function add() {
		if(($this->data['siteinfos']->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || ($this->session->userdata('usertypeID') == 5)) {
			$this->data['headerassets'] = array(
				'css' => array(
					'assets/datepicker/datepicker.css',
				),
				'js' => array(
					'assets/datepicker/datepicker.js',
				)
			);
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "expenseheads/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$array = array(
						"expense_head" 		=> $this->input->post("expense_head"),
						"create_date" 	=> date("Y-m-d"),
						"date" 			=> date("Y-m-d"),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'uname' 		=> $this->session->userdata('name'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $this->session->userdata('defaultschoolyearID')
					);
					$this->Expensehead_m->insert_expensehead($array);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("expenseheads/index"));
				}
			} else {
				$this->data["subview"] = "expenseheads/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		if(($this->data['siteinfos']->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || ($this->session->userdata('usertypeID') == 5)) {
			$this->data['headerassets'] = array(
				'css' => array(
					'assets/datepicker/datepicker.css',
				),
				'js' => array(
					'assets/datepicker/datepicker.js',
				)
			);

			$id = htmlentities(escapeString($this->uri->segment(3)));
			if((int)$id) {
				$schoolyearID = $this->session->userdata('defaultschoolyearID');	
				$this->data['expense'] = $this->Expensehead_m->get_single_expensehead(array('expenseheadID' => $id, 'schoolyearID' => $schoolyearID));
				if($this->data['expense']) {
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "expenseheads/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array(
								"expense_head" 		=> $this->input->post("expense_head"),
								"date" 			=> date("Y-m-d"),
								'usertypeID' 	=> $this->session->userdata('usertypeID'),
								'uname' 		=> $this->session->userdata('name'),
								'userID' 		=> $this->session->userdata('loginuserID'),
							);

							$this->Expensehead_m->update_expensehead($array, $id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("expenseheads/index"));
						}
					} else {
						$this->data["subview"] = "expenseheads/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function delete() {
		if(($this->data['siteinfos']->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || ($this->session->userdata('usertypeID') == 5)) {
			$id = htmlentities(escapeString($this->uri->segment(3)));
			if((int)$id) {
				$schoolyearID = $this->session->userdata('defaultschoolyearID');
				$expense = $this->Expensehead_m->get_single_expensehead(array('expenseheadID' => $id, 'schoolyearID' => $schoolyearID));
				if(customCompute($expense)) {
					$this->Expensehead_m->delete_expensehead($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("expenseheads/index"));
				} else {
					redirect(base_url("expenseheads/index"));
				}
			} else {
				redirect(base_url("expenseheads/index"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}


	public function date_valid($date) {
		if(strlen($date) <10) {
			$this->form_validation->set_message("date_valid", "%s is not valid dd-mm-yyyy");
	     	return FALSE;
		} else {
	   		$arr = explode("-", $date);
	        $dd = $arr[0];
	        $mm = $arr[1];
	        $yyyy = $arr[2];
	      	if(checkdate($mm, $dd, $yyyy)) {
	      		return TRUE;
	      	} else {
	      		$this->form_validation->set_message("date_valid", "%s is not valid dd-mm-yyyy");
	     		return FALSE;
	      	}
	    }
	}

	public function valid_number() {
		if($this->input->post('amount') && $this->input->post('amount') < 0) {
			$this->form_validation->set_message("valid_number", "%s is invalid number");
			return FALSE;
		}
		return TRUE;
	}

	public function unique_date() {
		$date = strtotime($this->input->post('date'));
		$startdate = strtotime($this->data['schoolyearsessionobj']->startingdate);
		$endingdate = strtotime($this->data['schoolyearsessionobj']->endingdate);
		if($date != '') {
			if(($date < $startdate) || ($date > $endingdate)) {
				$this->form_validation->set_message('unique_date','The %s field is invalid.');
				return FALSE;
			}
			return TRUE;
		}
		return TRUE;
	}


}