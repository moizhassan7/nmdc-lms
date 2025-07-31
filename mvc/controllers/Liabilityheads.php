<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liabilityheads extends Admin_Controller {
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
		$this->load->model("Liabilityhead_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('liability', $language);
	}

	public function index() {
		$schoolyearID = $this->session->userdata('defaultschoolyearID');
		$this->data['alluser'] = getAllUserObjectWithStudentRelation(array('schoolyearID' => $schoolyearID));
		$this->data['liabilitys'] = $this->Liabilityhead_m->get_order_by_liabilityhead(array('schoolyearID' => $schoolyearID));
		$this->data["subview"] = "liabilityheads/index";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
				 array(
					'field' => 'liability_head',
					'label' => $this->lang->line("liability_liability"),
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
					$this->data["subview"] = "liabilityheads/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$array = array(
						"liability_head" 		=> $this->input->post("liability_head"),
						"create_date" 	=> date("Y-m-d"),
						"date" 			=> date("Y-m-d"),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'uname' 		=> $this->session->userdata('name'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $this->session->userdata('defaultschoolyearID')
					);
					$this->Liabilityhead_m->insert_liabilityhead($array);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("liabilityheads/index"));
				}
			} else {
				$this->data["subview"] = "liabilityheads/add";
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
				$this->data['liability'] = $this->Liabilityhead_m->get_single_liabilityhead(array('liabilityheadID' => $id, 'schoolyearID' => $schoolyearID));
				if($this->data['liability']) {
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "liabilityheads/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array(
								"liability_head" 		=> $this->input->post("liability_head"),
								"date" 			=> date("Y-m-d"),
								'usertypeID' 	=> $this->session->userdata('usertypeID'),
								'uname' 		=> $this->session->userdata('name'),
								'userID' 		=> $this->session->userdata('loginuserID'),
							);

							$this->Liabilityhead_m->update_liabilityhead($array, $id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("liabilityheads/index"));
						}
					} else {
						$this->data["subview"] = "liabilityheads/edit";
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
				$liability = $this->Liabilityhead_m->get_single_liabilityhead(array('liabilityheadID' => $id, 'schoolyearID' => $schoolyearID));
				if(customCompute($liability)) {
					$this->Liabilityhead_m->delete_liabilityhead($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("liabilityheads/index"));
				} else {
					redirect(base_url("liabilityheads/index"));
				}
			} else {
				redirect(base_url("liabilityheads/index"));
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