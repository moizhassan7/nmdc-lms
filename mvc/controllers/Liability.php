<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liability extends Admin_Controller {
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
		$this->load->model("liability_m");
		$this->load->model("Liabilityhead_m");
		$this->load->model("Accounts_m");
		$this->load->model('Statement_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('liability', $language);
	}

	public function index() {
$schoolyearID = $this->session->userdata('defaultschoolyearID');
$this->data['alluser'] = getAllUserObjectWithStudentRelation(array('schoolyearID' => $schoolyearID));
$this->data['liabilitys'] = $this->liability_m->get_order_by_liability(array('schoolyearID' => $schoolyearID));
		
		$this->data["subview"] = "liability/index";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
				 array(
					'field' => 'liability',
					'label' => $this->lang->line("liability_liability"),
					'rules' => 'trim|required|xss_clean|max_length[128]'
				),
				array(
				'field' => 'accountsID',
				'label' => $this->lang->line("account_name"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean'
				),
				array(
                'field' => 'voucher_number',
                'label' => $this->lang->line("voucher_number"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
            ),
				array(
				'field' => 'liabilityheadID',
				'label' => $this->lang->line("liabilityhead"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean'
			    ),
				array(
					'field' => 'date',
					'label' => $this->lang->line("liability_date"),
					'rules' => 'trim|required|max_length[10]|xss_clean|callback_date_valid|callback_unique_date'
				),
				array(
					'field' => 'amount',
					'label' => $this->lang->line("liability_amount"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
				),
				array(
					'field' => 'file',
					'label' => $this->lang->line("liability_file"),
					'rules' => 'trim|xss_clean|max_length[200]|callback_fileupload'
				),
				array(
					'field' => 'note',
					'label' => $this->lang->line("liability_note"),
					'rules' => 'trim|max_length[200]|xss_clean'
				)
			);
		return $rules;
	}

	public function fileupload() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$liability = [];
		if((int)$id) {
			$liability = $this->liability_m->get_liability($id);
		}

		$new_file = "";
		if($_FILES["file"]['name'] !="") {
			$file_name = $_FILES["file"]['name'];
			$random = random19();
	    	$makeRandom = hash('sha512', $random.$this->input->post('name') . config_item("encryption_key"));
			$file_name_rename = $makeRandom;
            $explode = explode('.', $file_name);
            if(customCompute($explode) >= 2) {
	            $new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "./uploads/images";
				$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx|txt|ppt|csv";
				$config['file_name'] = $new_file;
				$config['max_size'] = '5120';
				$config['max_width'] = '3000';
				$config['max_height'] = '3000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload("file")) {
					$this->form_validation->set_message("fileupload", $this->upload->display_errors());
	     			return FALSE;
				} else {
					$this->upload_data['file'] =  $this->upload->data();
					return TRUE;
				}
			} else {
				$this->form_validation->set_message("fileupload", "Invalid file");
	     		return FALSE;
			}
		} else {
			if(customCompute($liability)) {
				$this->upload_data['file'] = array('file_name' => $liability->file);
				return TRUE;
			} else {
				$this->upload_data['file'] = array('file_name' => $new_file);
			return TRUE;
			}
		}
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
			$this->data['liability_heads'] = $this->Liabilityhead_m->get_liabilityhead();
			$this->data['accounts'] = $this->Accounts_m->get_accounts();
			
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "liability/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$array = array(
						"liability" 		=> $this->input->post("liability"),
						"accountsID" 		=> $this->input->post("accountsID"),
						"voucher_number" 	=> $this->input->post("voucher_number"),
			"liabilityheadID" 		=> $this->input->post("liabilityheadID"),
						"amount" 		=> $this->input->post("amount"),
						"file" 			=> $this->upload_data['file']['file_name'],
						"note" 			=> $this->input->post("note"),
						"create_date" 	=> date("Y-m-d"),
						"date" 			=> date("Y-m-d", strtotime($this->input->post("date"))),
						"liabilityday" 	=> date("d", strtotime($this->input->post("date"))),
						"liabilitymonth" 	=> date("m", strtotime($this->input->post("date"))),
						"liabilityyear" 	=> date("Y", strtotime($this->input->post("date"))),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'uname' 		=> $this->session->userdata('name'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $this->session->userdata('defaultschoolyearID')
					);
					$this->liability_m->insert_liability($array);
					$liabilityLastID = $this->db->insert_id();
					
					$arrayb = array(
						"name" 			=> $this->input->post("liability"),
						"in_exID" 		=> $liabilityLastID,
						"in_exheadID" 	=> $this->input->post("liabilityheadID"),
						"accountsID" 	=> $this->input->post("accountsID"),
						"voucher_number" => $this->input->post("voucher_number"),
						"type" 			=> "Liability",
						"recamount" 	=> $this->input->post("amount"),
						"file" 			=> $this->upload_data['file']['file_name'],
						"note" 			=> $this->input->post("note"),
						"create_date" 	=> date("Y-m-d"),
						"date" 			=> date("Y-m-d", strtotime($this->input->post("date"))),
						"in_exday" 		=> date("d", strtotime($this->input->post("date"))),
						"in_exmonth" 	=> date("m", strtotime($this->input->post("date"))),
						"in_exyear" 	=> date("Y", strtotime($this->input->post("date"))),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $this->session->userdata('defaultschoolyearID')
					);
					$this->Statement_m->insert_statement($arrayb);

					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("liability/index"));
				}
			} else {
				$this->data["subview"] = "liability/add";
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
				$this->data['liability'] = $this->liability_m->get_single_liability(array('liabilityID' => $id, 'schoolyearID' => $schoolyearID));
				
				$this->data['liability_heads'] = $this->Liabilityhead_m->get_liabilityhead();
				$this->data['accounts'] = $this->Accounts_m->get_accounts();

				if($this->data['liability']) {
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "liability/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array(
						"liability" 		=> $this->input->post("liability"),
						"accountsID" 		=> $this->input->post("accountsID"),
						"voucher_number" 	=> $this->input->post("voucher_number"),
				"liabilityheadID" 		=> $this->input->post("liabilityheadID"),
								"amount" 		=> $this->input->post("amount"),
								"file" 			=> $this->upload_data['file']['file_name'],
								"note" 			=> $this->input->post("note"),
								"date" 			=> date("Y-m-d", strtotime($this->input->post("date"))),
								"liabilityday" 	=> date("d", strtotime($this->input->post("date"))),
								"liabilitymonth" 	=> date("m", strtotime($this->input->post("date"))),
								"liabilityyear" 	=> date("Y", strtotime($this->input->post("date"))),
								'usertypeID' 	=> $this->session->userdata('usertypeID'),
								'uname' 		=> $this->session->userdata('name'),
								'userID' 		=> $this->session->userdata('loginuserID'),
							);
							
					$arrayb = array(
						"name" 			=> $this->input->post("liability"),
						"in_exheadID" 	=> $this->input->post("liabilityheadID"),
						"accountsID" 	=> $this->input->post("accountsID"),
						"voucher_number" 	=> $this->input->post("voucher_number"),
						"recamount" 	=> $this->input->post("amount"),
						"file" 			=> $this->upload_data['file']['file_name'],
						"note" 			=> $this->input->post("note"),
						"date" 			=> date("Y-m-d", strtotime($this->input->post("date"))),
						"in_exday" 		=> date("d", strtotime($this->input->post("date"))),
						"in_exmonth" 	=> date("m", strtotime($this->input->post("date"))),
						"in_exyear" 	=> date("Y", strtotime($this->input->post("date"))),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $this->session->userdata('defaultschoolyearID')
					);
	

							$this->liability_m->update_liability($array, $id);

$this->Statement_m->update_statement_with_multicondition($arrayb, array('in_exID' => $id, 'type' => 'Liability'));
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("liability/index"));
						}
					} else {
						$this->data["subview"] = "liability/edit";
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
				$liability = $this->liability_m->get_single_liability(array('liabilityID' => $id, 'schoolyearID' => $schoolyearID));
				if(customCompute($liability)) {
					$this->liability_m->delete_liability($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("liability/index"));
				} else {
					redirect(base_url("liability/index"));
				}
			} else {
				redirect(base_url("liability/index"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function download() {
		if(permissionChecker('liability')) {
			$id = htmlentities(escapeString($this->uri->segment(3)));
			if((int)$id) {
				$schoolyearID = $this->session->userdata('defaultschoolyearID');
				$liability = $this->liability_m->get_single_liability(array('liabilityID' => $id, 'schoolyearID' => $schoolyearID));
				if(customCompute($liability)) {
					$fileName = $liability->file;
					$expFileName = explode('.', $fileName);
					$originalname = $liability->liability.'.'.$expFileName[1];
					$file = realpath('uploads/images/'.$liability->file);
				    if (file_exists($file)) {
				    	header('Content-Description: File Transfer');
					    header('Content-Type: application/octet-stream');
					    header('Content-Disposition: attachment; filename="'.basename($originalname).'"');
					    header('Expires: 0');
					    header('Cache-Control: must-revalidate');
					    header('Pragma: public');
					    header('Content-Length: ' . filesize($file));
					    readfile($file);
					    exit;
				    } else {
				    	redirect(base_url('liability/index'));
				    }
				} else {
				   	redirect(base_url('liability/index'));
				}
			} else {
				redirect(base_url('liability/index'));
			}
		} else {
			redirect(base_url('liability/index'));
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