<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL / COLLEGE MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			KIT & SWITCH 2 ITECH TEAM
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY KING IT CENTRE
| -----------------------------------------------------
*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model("teacher_m");
        $this->load->model("routine_m");
        $this->load->model("subject_m");
        $this->load->model("classes_m");
		$this->load->model("shifts_m");
        $this->load->model("section_m");
        $this->load->model("tattendance_m");
        $this->load->model("manage_salary_m");
        $this->load->model("salaryoption_m");
        $this->load->model("salary_template_m");
        $this->load->model("hourly_template_m");
        $this->load->model("make_payment_m");
        $this->load->model("document_m");
        $this->load->model("leaveapplication_m");
        $this->load->library('updatechecker');
        $language = $this->session->userdata('lang');
        $this->lang->load('teacher', $language);
    }

	protected function rules() {
		$rules = array(
			array(
                'field' => 'name',
                'label' => $this->lang->line("teacher_name"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'empcode',
                'label' => $this->lang->line("teacher_empcode"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'fathname',
                'label' => $this->lang->line("teacher_fathname"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'cnic',
                'label' => $this->lang->line("teacher_cnic"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
			),
			array(
                'field' => 'dob',
                'label' => $this->lang->line("teacher_dob"),
                'rules' => 'trim|required|max_length[10]|callback_date_valid|xss_clean'
			),
			array(
                'field' => 'sex',
                'label' => $this->lang->line("teacher_sex"),
                'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
                'field' => 'state',
                'label' => $this->lang->line("teacher_state"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'domicile',
                'label' => $this->lang->line("teacher_domicile"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'marstatus',
                'label' => $this->lang->line("teacher_marstatus"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
			),
			array(
                'field' => 'religion',
                'label' => $this->lang->line("teacher_religion"),
                'rules' => 'trim|max_length[25]|xss_clean'
			),
			array(
                'field' => 'sect',
                'label' => $this->lang->line("teacher_sect"),
                'rules' => 'trim|max_length[50]|xss_clean'
			),
			array(
                'field' => 'sectb',
                'label' => $this->lang->line("teacher_sectb"),
                'rules' => 'trim|max_length[50]|xss_clean'
			),
			array(
                'field' => 'nextofkin',
                'label' => $this->lang->line("teacher_nextofkin"),
                'rules' => 'trim|max_length[255]|xss_clean'
			),
			array(
                'field' => 'bgroup',
                'label' => $this->lang->line("teacher_bgroup"),
                'rules' => 'trim|xss_clean|max_length[10]'
			),
			array(
                'field' => 'nativelang',
                'label' => $this->lang->line("teacher_nativelang"),
                'rules' => 'trim|xss_clean|max_length[60]'
			),
			array(
                'field' => 'pmdcno',
                'label' => $this->lang->line("pmdcno"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
			),
			array(
                'field' => 'AppointmentDate',
                'label' => $this->lang->line("teacher_AppointmentDate"),
                'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
                'field' => 'jod',
                'label' => $this->lang->line("teacher_jod"),
                'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
                'field' => 'FacultyType',
                'label' => $this->lang->line("teacher_FacultyType"),
                'rules' => 'trim|required|max_length[128]|xss_clean'
			),
			array(
                'field' => 'Department',
                'label' => $this->lang->line("teacher_Department"),
                'rules' => 'trim|required|max_length[128]|xss_clean'
			),
			array(
                'field' => 'designation',
                'label' => $this->lang->line("teacher_designation"),
                'rules' => 'trim|required|max_length[128]|xss_clean'
			),
			array(
                'field' => 'currentdesignation',
                'label' => $this->lang->line("teacher_currentdesignation"),
                'rules' => 'trim|required|xss_clean|max_length[128]'
			),
			array(
                'field' => 'Qualification',
                'label' => $this->lang->line("teacher_Qualification"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'Specialization',
                'label' => $this->lang->line("teacher_Specialization"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
                'field' => 'EmploymentMode',
                'label' => $this->lang->line("teacher_EmploymentMode"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
			),
			array(
                'field' => 'shift_id',
                'label' => $this->lang->line("shift_id"),
                'rules' => 'trim|required|xss_clean|max_length[10]'
			),
			array(
                'field' => 'EmploymentStatus',
                'label' => $this->lang->line("teacher_EmploymentStatus"),
                'rules' => 'trim|required|xss_clean|max_length[30]'
			),
			array(
                'field' => 'ContractStartDate',
                'label' => $this->lang->line("teacher_ContractStartDate"),
                'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
                'field' => 'ContractEndDate',
                'label' => $this->lang->line("teacher_ContractEndDate"),
                'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
                'field' => 'LastPromotionDate',
                'label' => $this->lang->line("teacher_LastPromotionDate"),
                'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
                'field' => 'PermanentAddress',
                'label' => $this->lang->line("teacher_PermanentAddress"),
                'rules' => 'trim|required|xss_clean|max_length[260]'
			),
			array(
                'field' => 'address',
                'label' => $this->lang->line("teacher_address"),
                'rules' => 'trim|required|xss_clean|max_length[260]'
			),
			array(
                'field' => 'phone',
                'label' => $this->lang->line("teacher_phone"),
                'rules' => 'trim|required|min_length[5]|max_length[25]|xss_clean'
			),
			array(
                'field' => 'LandlineNo',
                'label' => $this->lang->line("teacher_LandlineNo"),
                'rules' => 'trim|min_length[5]|max_length[25]|xss_clean'
			),
			array(
                'field' => 'email',
                'label' => $this->lang->line("teacher_email"),
                'rules' => 'trim|max_length[40]|valid_email|xss_clean|callback_unique_email'
			),
			array(
                'field' => 'photo',
                'label' => $this->lang->line("teacher_photo"),
                'rules' => 'trim|max_length[200]|xss_clean|callback_photoupload'
			),
			array(
                'field' => 'devicecode',
                'label' => $this->lang->line("teacher_devicecode"),
                'rules' => 'trim|required|xss_clean|max_length[11]'
			),
			array(
                'field' => 'attempcode',
                'label' => $this->lang->line("teacher_attempcode"),
                'rules' => 'trim|required|xss_clean|max_length[11]'
			),
			array(
                'field' => 'username',
                'label' => $this->lang->line("teacher_username"),
                'rules' => 'trim|required|min_length[4]|max_length[40]|xss_clean|callback_lol_username'
			),
			array(
                'field' => 'password',
                'label' => $this->lang->line("teacher_password"),
                'rules' => 'trim|min_length[4]|max_length[40]|xss_clean'
			),
		);
		return $rules;
	}

    public function send_mail_rules()
    {
        $rules = [
            [
                'field' => 'to',
                'label' => $this->lang->line("teacher_to"),
                'rules' => 'trim|required|max_length[60]|valid_email|xss_clean'
            ],
            [
                'field' => 'subject',
                'label' => $this->lang->line("teacher_subject"),
                'rules' => 'trim|required|xss_clean'
            ],
            [
                'field' => 'message',
                'label' => $this->lang->line("teacher_message"),
                'rules' => 'trim|xss_clean'
            ],
            [
                'field' => 'teacherID',
                'label' => $this->lang->line("teacher_teacherID"),
                'rules' => 'trim|required|max_length[10]|xss_clean|callback_unique_data'
            ]
        ];
        return $rules;
    }

    public function unique_data( $data )
    {
        if ( $data != '' ) {
            if ( $data == '0' ) {
                $this->form_validation->set_message('unique_data', 'The %s field is required.');
                return false;
            }
            return true;
        }
        return true;
    }

    public function photoupload()
    {
        $id   = htmlentities(escapeString($this->uri->segment(3)));
        $user = [];
        if ( (int) $id ) {
            $user = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
        }

        $new_file = "default.png";
        if ( $_FILES["photo"]['name'] != "" ) {
            $file_name        = $_FILES["photo"]['name'];
            $random           = random19();
            $makeRandom       = hash('sha512',
                $random . $this->input->post('username') . config_item("encryption_key"));
            $file_name_rename = $makeRandom;
            $explode          = explode('.', $file_name);
            if ( customCompute($explode) >= 2 ) {
                $new_file                = $file_name_rename . '.' . end($explode);
                $config['upload_path']   = "./uploads/images";
                $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF";
                $config['file_name']     = $new_file;
                $config['max_size']      = '1024';
                $config['max_width']     = '3000';
                $config['max_height']    = '3000';
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload("photo") ) {
                    $this->form_validation->set_message("photoupload", $this->upload->display_errors());
                    return false;
                } else {
                    $this->upload_data['file'] = $this->upload->data();
                    return true;
                }
            } else {
                $this->form_validation->set_message("photoupload", "Invalid file");
                return false;
            }
        } else {
            if ( customCompute($user) ) {
                $this->upload_data['file'] = [ 'file_name' => $user->photo ];
                return true;
            } else {
                $this->upload_data['file'] = [ 'file_name' => $new_file ];
                return true;
            }
        }
    }

    public function index()
    {
        $myProfile = false;
        if ( $this->session->userdata('usertypeID') == 2 ) {
            if ( !permissionChecker('teacher_view') ) {
                $myProfile = true;
            }
        }

        if ( $this->session->userdata('usertypeID') == 2 && $myProfile ) {
            $id = $this->session->userdata('loginuserID');
            $this->getView($id);
        } else {
            $this->data['teachers'] = $this->teacher_m->get_teacher();
            $this->data["subview"]  = "teacher/index";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function add()
    {
			$this->data['headerassets'] = array(
				'css' => array(
					'assets/datepicker/datepicker.css',
					'assets/select2/css/select2.css',
					'assets/select2/css/select2-bootstrap.css'
				),
				'js' => array(
					'assets/datepicker/datepicker.js',
					'assets/select2/select2.js'
				)
			);
			
		$this->data['shifts'] = $this->shifts_m->get_shifts();	

        if ( $_POST ) {
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);
            if ( $this->form_validation->run() == false ) {
                $this->data['form_validation'] = validation_errors();
                $this->data["subview"]         = "teacher/add";
                $this->load->view('_layout_main', $this->data);
            } else {
                if ( config_item('demo') == false ) {
                    $updateValidation = $this->updatechecker->verifyValidUser();
                    if ( $updateValidation->status == false ) {
                        $this->session->set_flashdata('error', $updateValidation->message);
                        redirect(base_url('teacher/add'));
                    }
                }

                $array["name"]            = $this->input->post("name");
				$array["empcode"]         = $this->input->post("empcode");
                $array["fathname"]        = $this->input->post("fathname");
                $array["cnic"]            = $this->input->post("cnic");
     			$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
                $array["sex"]             = $this->input->post("sex");
                $array["state"]           = $this->input->post("state");
                $array["domicile"]        = $this->input->post("domicile");
                $array["marstatus"]       = $this->input->post("marstatus");
                $array["religion"]        = $this->input->post("religion");
				$array["sect"]        	  = $this->input->post("sect");
				$array["sectb"]        	  = $this->input->post("sectb");
				$array["nextofkin"]       = $this->input->post("nextofkin");
				$array["bgroup"]      	  = $this->input->post("bgroup");
                $array["nativelang"]      = $this->input->post("nativelang");
				$array["pmdcno"]      	  = $this->input->post("pmdcno");
				
$array["AppointmentDate"] = date("Y-m-d", strtotime($this->input->post("AppointmentDate")));
$array["jod"] = date("Y-m-d", strtotime($this->input->post("jod")));
              
			  $array["FacultyType"]    = $this->input->post("FacultyType");
			  $array["Department"]     = $this->input->post("Department");
			  $array["designation"]    = $this->input->post("designation");
              $array["currentdesignation"] = $this->input->post("currentdesignation");
              $array["Qualification"]    = $this->input->post("Qualification");
              $array["Specialization"]   = $this->input->post("Specialization");
              $array["EmploymentMode"]   = $this->input->post("EmploymentMode");
			  $array["shift_id"]   = $this->input->post("shift_id");
              $array["EmploymentStatus"] = $this->input->post("EmploymentStatus");

if(empty($this->input->post("ContractStartDate")))
{
$array["ContractStartDate"]  = $this->input->post("ContractStartDate");
}
else
{	
$array["ContractStartDate"]=date("Y-m-d", strtotime($this->input->post("ContractStartDate")));
}

if(empty($this->input->post("ContractEndDate")))
{
$array["ContractEndDate"]  = $this->input->post("ContractEndDate");
}
else
{	
$array["ContractEndDate"]=date("Y-m-d", strtotime($this->input->post("ContractEndDate")));
}

if(empty($this->input->post("LastPromotionDate")))
{
$array["LastPromotionDate"]  = $this->input->post("LastPromotionDate");
}
else
{	
$array["LastPromotionDate"]=date("Y-m-d", strtotime($this->input->post("LastPromotionDate")));
}

                $array["MBBSyear"]     = $this->input->post("MBBSyear");
                $array["MBBSmarks"]     = $this->input->post("MBBSmarks");
                $array["MBBSinst"]     = $this->input->post("MBBSinst");

                $array["Mphilyear"]     = $this->input->post("Mphilyear");
                $array["Mphilmarks"]     = $this->input->post("Mphilmarks");
                $array["Mphilinst"]     = $this->input->post("Mphilinst");

                $array["FCPSyear"]     = $this->input->post("FCPSyear");
                $array["FCPSmarks"]     = $this->input->post("FCPSmarks");
                $array["FCPSinst"]     = $this->input->post("FCPSinst");

                $array["MCPSyear"]     = $this->input->post("MCPSyear");
                $array["MCPSmarks"]     = $this->input->post("MCPSmarks");
                $array["MCPSinst"]     = $this->input->post("MCPSinst");

                $array["PHDyear"]     = $this->input->post("PHDyear");
                $array["PHDmarks"]     = $this->input->post("PHDmarks");
                $array["PHDinst"]     = $this->input->post("PHDinst");

                $array["MRCPyear"]     = $this->input->post("MRCPyear");
                $array["MRCPmarks"]     = $this->input->post("MRCPmarks");
                $array["MRCPinst"]     = $this->input->post("MRCPinst");

                $array["MRCSyear"]     = $this->input->post("MRCSyear");
                $array["MRCSmarks"]     = $this->input->post("MRCSmarks");
                $array["MRCSinst"]     = $this->input->post("MRCSinst");

                $array["MRCPCHyear"]     = $this->input->post("MRCPCHyear");
                $array["MRCPCHmarks"]     = $this->input->post("MRCPCHmarks");
                $array["MRCPCHinst"]     = $this->input->post("MRCPCHinst");

                $array["MPHyear"]     = $this->input->post("MPHyear");
                $array["MPHmarks"]     = $this->input->post("MPHmarks");
                $array["MPHinst"]     = $this->input->post("MPHinst");

                $array["MS_MDyear"]     = $this->input->post("MS_MDyear");
                $array["MS_MDmarks"]     = $this->input->post("MS_MDmarks");
                $array["MS_MDinst"]     = $this->input->post("MS_MDinst");				
				
                $array["PermanentAddress"] = $this->input->post("PermanentAddress");
                $array["address"]  = $this->input->post("address");
                $array["phone"]    = $this->input->post("phone");
                $array["LandlineNo"] = $this->input->post("LandlineNo");
                $array["email"]      = $this->input->post("email");

                $array["devicecode"]        = $this->input->post("devicecode");
				$array["attempcode"]        = $this->input->post("attempcode");
				
				$array["username"]        = $this->input->post("username");
$array["password"] = $this->teacher_m->hash($this->input->post("password"));
                
				$array["usertypeID"]      = 2;
                
				$array["create_date"]     = date("Y-m-d h:i:s");
                $array["modify_date"]     = date("Y-m-d h:i:s");
                $array["create_userID"]   = $this->session->userdata('loginuserID');
                $array["create_username"] = $this->session->userdata('username');
                $array["create_usertype"] = $this->session->userdata('usertype');
                $array["active"]          = 1;
                $array['photo']           = $this->upload_data['file']['file_name'];

      $this->usercreatemail($this->input->post('email'), $this->input->post('username'),
      $this->input->post('password'));

           $this->teacher_m->insert_teacher($array);
           $this->session->set_flashdata('success', $this->lang->line('menu_success'));
           redirect(base_url("teacher/index"));
            }
        } else {
            $this->data["subview"] = "teacher/add";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function edit()
    {		
			$this->data['headerassets'] = array(
				'css' => array(
					'assets/datepicker/datepicker.css',
					'assets/select2/css/select2.css',
					'assets/select2/css/select2-bootstrap.css'
				),
				'js' => array(
					'assets/datepicker/datepicker.js',
					'assets/select2/select2.js'
				)
			);
		$this->data['shifts'] = $this->shifts_m->get_shifts();
		
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if ( (int) $id ) {
			$this->data['teacher'] = $this->teacher_m->get_single_teacher(array('teacherID' => $id));
            if ( $this->data['teacher'] ) {
                if ( $_POST ) {
                    $rules = $this->rules();
                    unset($rules[11]);
                    $this->form_validation->set_rules($rules);
                    if ( $this->form_validation->run() == FALSE ) {
                        $this->data["subview"] = "teacher/edit";
                        $this->load->view('_layout_main', $this->data);
                    } else {
                        $array                = [];
                $array["name"]            = $this->input->post("name");
				$array["empcode"]            = $this->input->post("empcode");
                $array["fathname"]        = $this->input->post("fathname");
                $array["cnic"]            = $this->input->post("cnic");
     			$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
                $array["sex"]             = $this->input->post("sex");
                $array["state"]           = $this->input->post("state");
                $array["domicile"]        = $this->input->post("domicile");
                $array["marstatus"]       = $this->input->post("marstatus");
                $array["religion"]        = $this->input->post("religion");
				$array["sect"]            = $this->input->post("sect");
				$array["sectb"]        	  = $this->input->post("sectb");
				$array["nextofkin"]       = $this->input->post("nextofkin");
				$array["bgroup"]      	  = $this->input->post("bgroup");
                $array["nativelang"]      = $this->input->post("nativelang");
				$array["pmdcno"]      	  = $this->input->post("pmdcno");
				
$array["AppointmentDate"] = date("Y-m-d", strtotime($this->input->post("AppointmentDate")));
$array["jod"] = date("Y-m-d", strtotime($this->input->post("jod")));
              
			  $array["FacultyType"]    = $this->input->post("FacultyType");
			  $array["Department"]     = $this->input->post("Department");
			  $array["designation"]    = $this->input->post("designation");
              $array["currentdesignation"] = $this->input->post("currentdesignation");
              $array["Qualification"]    = $this->input->post("Qualification");
              $array["Specialization"]   = $this->input->post("Specialization");
              $array["EmploymentMode"]   = $this->input->post("EmploymentMode");
			  $array["shift_id"]   = $this->input->post("shift_id");
              $array["EmploymentStatus"] = $this->input->post("EmploymentStatus");

if(empty($this->input->post("ContractStartDate")))
{
$array["ContractStartDate"]  = $this->input->post("ContractStartDate");
}
else
{	
$array["ContractStartDate"]=date("Y-m-d", strtotime($this->input->post("ContractStartDate")));
}

if(empty($this->input->post("ContractEndDate")))
{
$array["ContractEndDate"]  = $this->input->post("ContractEndDate");
}
else
{	
$array["ContractEndDate"]=date("Y-m-d", strtotime($this->input->post("ContractEndDate")));
}

if(empty($this->input->post("LastPromotionDate")))
{
$array["LastPromotionDate"]  = $this->input->post("LastPromotionDate");
}
else
{	
$array["LastPromotionDate"]=date("Y-m-d", strtotime($this->input->post("LastPromotionDate")));
}

                $array["MBBSyear"]     = $this->input->post("MBBSyear");
                $array["MBBSmarks"]     = $this->input->post("MBBSmarks");
                $array["MBBSinst"]     = $this->input->post("MBBSinst");

                $array["Mphilyear"]     = $this->input->post("Mphilyear");
                $array["Mphilmarks"]     = $this->input->post("Mphilmarks");
                $array["Mphilinst"]     = $this->input->post("Mphilinst");

                $array["FCPSyear"]     = $this->input->post("FCPSyear");
                $array["FCPSmarks"]     = $this->input->post("FCPSmarks");
                $array["FCPSinst"]     = $this->input->post("FCPSinst");

                $array["MCPSyear"]     = $this->input->post("MCPSyear");
                $array["MCPSmarks"]     = $this->input->post("MCPSmarks");
                $array["MCPSinst"]     = $this->input->post("MCPSinst");

                $array["PHDyear"]     = $this->input->post("PHDyear");
                $array["PHDmarks"]     = $this->input->post("PHDmarks");
                $array["PHDinst"]     = $this->input->post("PHDinst");

                $array["MRCPyear"]     = $this->input->post("MRCPyear");
                $array["MRCPmarks"]     = $this->input->post("MRCPmarks");
                $array["MRCPinst"]     = $this->input->post("MRCPinst");

                $array["MRCSyear"]     = $this->input->post("MRCSyear");
                $array["MRCSmarks"]     = $this->input->post("MRCSmarks");
                $array["MRCSinst"]     = $this->input->post("MRCSinst");

                $array["MRCPCHyear"]     = $this->input->post("MRCPCHyear");
                $array["MRCPCHmarks"]     = $this->input->post("MRCPCHmarks");
                $array["MRCPCHinst"]     = $this->input->post("MRCPCHinst");

                $array["MPHyear"]     = $this->input->post("MPHyear");
                $array["MPHmarks"]     = $this->input->post("MPHmarks");
                $array["MPHinst"]     = $this->input->post("MPHinst");

                $array["MS_MDyear"]     = $this->input->post("MS_MDyear");
                $array["MS_MDmarks"]     = $this->input->post("MS_MDmarks");
                $array["MS_MDinst"]     = $this->input->post("MS_MDinst");				
				
                $array["PermanentAddress"] = $this->input->post("PermanentAddress");
                $array["address"]  = $this->input->post("address");
                $array["phone"]    = $this->input->post("phone");
                $array["LandlineNo"] = $this->input->post("LandlineNo");
                $array["email"]      = $this->input->post("email");

                $array["devicecode"]        = $this->input->post("devicecode");
				$array["attempcode"]        = $this->input->post("attempcode");
				
				$array['username']        = $this->input->post("username");
                        $array["modify_date"] = date("Y-m-d h:i:s");
                        $array['photo']       = $this->upload_data['file']['file_name'];

                        $this->teacher_m->update_teacher($array, $id);
                        $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                        redirect(base_url("teacher/index"));
                    }
                } else {
                    $this->data["subview"] = "teacher/edit";
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

    public function delete()
    {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if ( (int) $id ) {
            $this->data['teacher'] = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
            if ( $this->data['teacher'] ) {
                if ( config_item('demo') == false ) {
                    if ( $this->data['teacher']->photo != 'default.png' && $this->data['teacher']->photo != 'defualt.png' ) {
                        if ( file_exists(FCPATH . 'uploads/images/' . $this->data['teacher']->photo) ) {
                            unlink(FCPATH . 'uploads/images/' . $this->data['teacher']->photo);
                        }
                    }
                }
                $this->teacher_m->delete_teacher($id);
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                redirect(base_url("teacher/index"));
            } else {
                redirect(base_url("teacher/index"));
            }
        } else {
            redirect(base_url("teacher/index"));
        }
    }

    public function view()
    {
        $this->data['headerassets'] = [
            'css' => [
                'assets/custom-scrollbar/jquery.mCustomScrollbar.css'
            ],
            'js'  => [
                'assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'
            ]
        ];
        $usertype                   = $this->session->userdata('usertype');
        if ( $usertype ) {
            $id = htmlentities(escapeString($this->uri->segment(3)));
            if ( (int) $id ) {
                $this->getView($id);
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }
    }

    private function getView( $teacherID )
    {
        if ( (int) $teacherID ) {
            $teacherinfo = $this->teacher_m->get_single_teacher([ 'teacherID' => $teacherID ]);
            $this->pluckInfo();
            $this->teacherInfo($teacherinfo);
            $this->routineInfo($teacherinfo);
            $this->attendanceInfo($teacherinfo);
            $this->salaryInfo($teacherinfo);
            $this->paymentInfo($teacherinfo);
            $this->documentInfo($teacherinfo);

            if ( customCompute($teacherinfo) ) {
                $schoolyearID                    = $this->session->userdata('defaultschoolyearID');
                $this->data['leaveapplications'] = $this->leave_applications_date_list_by_user_and_schoolyear($teacherID,
                    $schoolyearID, $teacherinfo->usertypeID);
                $this->data["subview"]           = "teacher/getView";
                $this->load->view('_layout_main', $this->data);
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }
    }

    private function pluckInfo()
    {
        $this->data['subjects'] = pluck($this->subject_m->general_get_subject(), 'subject', 'subjectID');
        $this->data['classess'] = pluck($this->classes_m->get_classes(), 'classes', 'classesID');
        $this->data['sections'] = pluck($this->section_m->get_section(), 'section', 'sectionID');
    }

    private function teacherinfo( $teacherinfo )
    {
        if ( customCompute($teacherinfo) ) {
            $this->data['profile'] = $teacherinfo;
        } else {
            $this->data['profile'] = [];
        }
    }

    private function routineInfo( $teacherinfo )
    {
        $settingWeekends = [];
        if ( $this->data['siteinfos']->weekends != '' ) {
            $settingWeekends = explode(',', $this->data['siteinfos']->weekends);
        }
        $this->data['routineweekends'] = $settingWeekends;

        $this->data['routines'] = [];
        if ( customCompute($teacherinfo) ) {
            $schoolyearID           = $this->session->userdata('defaultschoolyearID');
            $this->data['routines'] = pluck_multi_array($this->routine_m->get_order_by_routine([ 'teacherID'    => $teacherinfo->teacherID,
                                                                                                 'schoolyearID' => $schoolyearID
            ]), 'obj', 'day');
        }
    }

    private function attendanceInfo( $teacherinfo )
    {
        $this->data['holidays']       = $this->getHolidaysSession();
        $this->data['getWeekendDays'] = $this->getWeekendDaysSession();
        $schoolyearID                 = $this->session->userdata('defaultschoolyearID');
        if ( customCompute($teacherinfo) ) {
            $tattendances                   = $this->tattendance_m->get_order_by_tattendance([
                "teacherID"    => $teacherinfo->teacherID,
                'schoolyearID' => $schoolyearID
            ]);
            $this->data['attendancesArray'] = pluck($tattendances, 'obj', 'monthyear');
        } else {
            $this->data['attendancesArray'] = [];
        }
    }

    private function salaryInfo( $teacherinfo )
    {
        if ( customCompute($teacherinfo) ) {
            $manageSalary = $this->manage_salary_m->get_single_manage_salary([
                'usertypeID' => $teacherinfo->usertypeID,
                'userID'     => $teacherinfo->teacherID
            ]);
            if ( customCompute($manageSalary) ) {
                $this->data['manage_salary'] = $manageSalary;
                if ( $manageSalary->salary == 1 ) {
                    $this->data['salary_template'] = $this->salary_template_m->get_single_salary_template([ 'salary_templateID' => $manageSalary->template ]);
                    if ( $this->data['salary_template'] ) {
                        $this->db->order_by("salary_optionID", "asc");
                        $this->data['salaryoptions'] = $this->salaryoption_m->get_order_by_salaryoption([ 'salary_templateID' => $manageSalary->template ]);

                        $grosssalary        = 0;
                        $totaldeduction     = 0;
                        $netsalary          = $this->data['salary_template']->basic_salary;
                        $orginalNetsalary   = $this->data['salary_template']->basic_salary;
                        $grosssalarylist    = [];
                        $totaldeductionlist = [];

                        if ( customCompute($this->data['salaryoptions']) ) {
                            foreach ( $this->data['salaryoptions'] as $salaryOptionKey => $salaryOption ) {
                                if ( $salaryOption->option_type == 1 ) {
                                    $netsalary                                    += $salaryOption->label_amount;
                                    $grosssalary                                  += $salaryOption->label_amount;
                                    $grosssalarylist[ $salaryOption->label_name ] = $salaryOption->label_amount;
                                } elseif ( $salaryOption->option_type == 2 ) {
                                    $netsalary                                       -= $salaryOption->label_amount;
                                    $totaldeduction                                  += $salaryOption->label_amount;
                                    $totaldeductionlist[ $salaryOption->label_name ] = $salaryOption->label_amount;
                                }
                            }
                        }

                        $this->data['grosssalary']    = ( $orginalNetsalary + $grosssalary );
                        $this->data['totaldeduction'] = $totaldeduction;
                        $this->data['netsalary']      = $netsalary;
                    } else {
                        $this->data['salary_template'] = [];
                        $this->data['salaryoptions']   = [];
                        $this->data['grosssalary']     = 0;
                        $this->data['totaldeduction']  = 0;
                        $this->data['netsalary']       = 0;
                    }
                } elseif ( $manageSalary->salary == 2 ) {
                    $this->data['hourly_salary'] = $this->hourly_template_m->get_single_hourly_template([ 'hourly_templateID' => $manageSalary->template ]);
                    if ( customCompute($this->data['hourly_salary']) ) {
                        $this->data['grosssalary']    = 0;
                        $this->data['totaldeduction'] = 0;
                        $this->data['netsalary']      = $this->data['hourly_salary']->hourly_rate;
                    } else {
                        $this->data['hourly_salary']  = [];
                        $this->data['grosssalary']    = 0;
                        $this->data['totaldeduction'] = 0;
                        $this->data['netsalary']      = 0;
                    }
                }
            } else {
                $this->data['manage_salary']   = [];
                $this->data['salary_template'] = [];
                $this->data['salaryoptions']   = [];
                $this->data['hourly_salary']   = [];
                $this->data['grosssalary']     = 0;
                $this->data['totaldeduction']  = 0;
                $this->data['netsalary']       = 0;
            }
        } else {
            $this->data['manage_salary']   = [];
            $this->data['salary_template'] = [];
            $this->data['salaryoptions']   = [];
            $this->data['hourly_salary']   = [];
            $this->data['grosssalary']     = 0;
            $this->data['totaldeduction']  = 0;
            $this->data['netsalary']       = 0;
        }
    }

    private function paymentInfo( $teacherinfo )
    {
        $schoolyearID = $this->session->userdata('defaultschoolyearID');
        if ( customCompute($teacherinfo) ) {
            $this->data['make_payments'] = $this->make_payment_m->get_order_by_make_payment([
                'usertypeID'   => $teacherinfo->usertypeID,
                'userID'       => $teacherinfo->teacherID,
                'schoolyearID' => $schoolyearID
            ]);
        } else {
            $this->data['make_payments'] = [];
        }
    }

    private function documentInfo( $teacherinfo )
    {
        if ( customCompute($teacherinfo) ) {
            $this->data['documents'] = $this->document_m->get_order_by_document([
                'usertypeID' => 2,
                'userID'     => $teacherinfo->teacherID
            ]);
        } else {
            $this->data['documents'] = [];
        }
    }

    public function documentUpload()
    {
        $retArray['status'] = false;
        $retArray['render'] = '';
        $retArray['errors'] = '';

        if ( permissionChecker('teacher_add') ) {
            if ( $_POST ) {
                $rules = $this->rules_documentupload();
                $this->form_validation->set_rules($rules);
                if ( $this->form_validation->run() == false ) {
                    $retArray['errors'] = $this->form_validation->error_array();
                    $retArray['status'] = false;
                    echo json_encode($retArray);
                    exit;
                } else {
                    $title  = $this->input->post('title');
                    $file   = $this->upload_data['file']['file_name'];
                    $userID = $this->input->post('teacherID');

                    $array = [
                        'title'             => $title,
                        'file'              => $file,
                        'userID'            => $userID,
                        'usertypeID'        => 2,
                        "create_date"       => date("Y-m-d H:i:s"),
                        "create_userID"     => $this->session->userdata('loginuserID'),
                        "create_usertypeID" => $this->session->userdata('usertypeID')
                    ];

                    $this->document_m->insert_document($array);
                    $this->session->set_flashdata('success', $this->lang->line('menu_success'));

                    $retArray['status'] = true;
                    $retArray['render'] = 'Success';
                    echo json_encode($retArray);
                    exit;
                }
            } else {
                $retArray['status'] = false;
                $retArray['render'] = 'Error';
                echo json_encode($retArray);
                exit;
            }
        } else {
            $retArray['status'] = false;
            $retArray['render'] = 'Permission Denay.';
            echo json_encode($retArray);
            exit;
        }
    }

    public function download_document()
    {
        $documentID = htmlentities(escapeString($this->uri->segment(3)));
        $teacherID  = htmlentities(escapeString($this->uri->segment(4)));
        if ( (int) $documentID && (int) $teacherID ) {
            if ( ( permissionChecker('teacher_add') && permissionChecker('teacher_delete') ) || ( $this->session->userdata('usertypeID') == 2 && $this->session->userdata('loginuserID') == $teacherID ) ) {
                $document = $this->document_m->get_single_document([ 'documentID' => $documentID ]);
                if ( customCompute($document) ) {
                    $file = realpath('uploads/documents/' . $document->file);
                    if ( file_exists($file) ) {
                        $expFileName  = explode('.', $file);
                        $originalname = ( $document->title ) . '.' . end($expFileName);
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="' . basename($originalname) . '"');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($file));
                        readfile($file);
                        exit;
                    } else {
                        redirect(base_url('teacher/view/' . $teacherID));
                    }
                } else {
                    redirect(base_url('teacher/view/' . $teacherID));
                }
            } else {
                redirect(base_url('teacher/view/' . $teacherID));
            }
        } else {
            redirect(base_url('teacher/index'));
        }
    }

    public function delete_document()
    {
        $documentID = htmlentities(escapeString($this->uri->segment(3)));
        $teacherID  = htmlentities(escapeString($this->uri->segment(4)));
        if ( (int) $documentID && (int) $teacherID ) {
            if ( permissionChecker('teacher_add') && permissionChecker('teacher_delete') ) {
                $document = $this->document_m->get_single_document([ 'documentID' => $documentID ]);
                if ( customCompute($document) ) {
                    if ( config_item('demo') == false ) {
                        if ( file_exists(FCPATH . 'uploads/document/' . $document->file) ) {
                            unlink(FCPATH . 'uploads/document/' . $document->file);
                        }
                    }
                    $this->document_m->delete_document($documentID);
                    $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                    redirect(base_url('teacher/view/' . $teacherID));
                } else {
                    redirect(base_url('teacher/view/' . $teacherID));
                }
            } else {
                redirect(base_url('teacher/view/' . $teacherID));
            }
        } else {
            redirect(base_url('teacher/index'));
        }
    }

    protected function rules_documentupload()
    {
        $rules = [
            [
                'field' => 'title',
                'label' => $this->lang->line("teacher_title"),
                'rules' => 'trim|required|xss_clean|max_length[128]'
            ],
            [
                'field' => 'file',
                'label' => $this->lang->line("teacher_file"),
                'rules' => 'trim|xss_clean|max_length[200]|callback_unique_document_upload'
            ]
        ];
        return $rules;
    }

    public function unique_document_upload()
    {
        if ( $_FILES["file"]['name'] != "" ) {
            $file_name        = $_FILES["file"]['name'];
            $random           = random19();
            $makeRandom       = hash('sha512',
                $random . ( strtotime(date('Y-m-d H:i:s')) ) . config_item("encryption_key"));
            $file_name_rename = $makeRandom;
            $explode          = explode('.', $file_name);
            if ( customCompute($explode) >= 2 ) {
                $new_file                = $file_name_rename . '.' . end($explode);
                $config['upload_path']   = "./uploads/documents";
                $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx|txt|ppt|csv";
                $config['file_name']     = $new_file;
                $config['max_size']      = '5120';
                $config['max_width']     = '10000';
                $config['max_height']    = '10000';
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload("file") ) {
                    $this->form_validation->set_message("unique_document_upload", $this->upload->display_errors());
                    return false;
                } else {
                    $this->upload_data['file'] = $this->upload->data();
                    return true;
                }
            } else {
                $this->form_validation->set_message("unique_document_upload", "Invalid file");
                return false;
            }
        } else {
            $this->form_validation->set_message("unique_document_upload", "The file is required.");
            return false;
        }
    }

    public function lol_username()
    {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if ( (int) $id ) {
            $teacher_info = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
            $tables = [
                'student'     => 'student',
                'parents'     => 'parents',
                'teacher'     => 'teacher',
                'user'        => 'user',
                'systemadmin' => 'systemadmin'
            ];
            $array        = [];
            $i            = 0;
            foreach ( $tables as $table ) {
                $user = $this->teacher_m->get_username($table,
                    [ "username" => $this->input->post('username'), "username !=" => $teacher_info->username ]);
                if ( customCompute($user) ) {
                    $this->form_validation->set_message("lol_username", "%s already exists");
                    $array['permition'][ $i ] = 'no';
                } else {
                    $array['permition'][ $i ] = 'yes';
                }
                $i++;
            }
            if ( in_array('no', $array['permition']) ) {
                return false;
            } else {
                return true;
            }
        } else {
            $tables = [
                'student'     => 'student',
                'parents'     => 'parents',
                'teacher'     => 'teacher',
                'user'        => 'user',
                'systemadmin' => 'systemadmin'
            ];
            $array  = [];
            $i      = 0;
            foreach ( $tables as $table ) {
                $user = $this->teacher_m->get_username($table, [ "username" => $this->input->post('username') ]);
                if ( customCompute($user) ) {
                    $this->form_validation->set_message("lol_username", "%s already exists");
                    $array['permition'][ $i ] = 'no';
                } else {
                    $array['permition'][ $i ] = 'yes';
                }
                $i++;
            }

            if ( in_array('no', $array['permition']) ) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function date_valid( $date )
    {
        if ( strlen($date) < 10 ) {
            $this->form_validation->set_message("date_valid", "%s is not valid dd-mm-yyyy");
            return false;
        } else {
            $arr  = explode("-", $date);
            $dd   = $arr[0];
            $mm   = $arr[1];
            $yyyy = $arr[2];
            if ( checkdate($mm, $dd, $yyyy) ) {
                return true;
            } else {
                $this->form_validation->set_message("date_valid", "%s is not valid dd-mm-yyyy");
                return false;
            }
        }
    }

    public function print_preview()
    {
        if ( permissionChecker('teacher_view') || ( ( $this->session->userdata('usertypeID') == 2 ) && permissionChecker('teacher') && ( $this->session->userdata('loginuserID') == htmlentities(escapeString($this->uri->segment(3))) ) ) ) {
            $id = htmlentities(escapeString($this->uri->segment(3)));
            if ( (int) $id ) {
                $this->data["teacher"] = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
                if ( customCompute($this->data["teacher"]) ) {
                    $this->data['panel_title'] = $this->lang->line('panel_title');
                    $this->reportPDF('teachermodule.css', $this->data, 'teacher/print_preview');
                } else {
                    $this->data["subview"] = "error";
                    $this->load->view('_layout_main', $this->data);
                }
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "errorpermission";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function send_mail()
    {
        $retArray['status']  = false;
        $retArray['message'] = '';
        if ( permissionChecker('teacher_view') || ( ( $this->session->userdata('usertypeID') == 2 ) && permissionChecker('teacher') && ( $this->session->userdata('loginuserID') == $this->input->post('teacherID') ) ) ) {
            if ( $_POST ) {
                $rules = $this->send_mail_rules();
                $this->form_validation->set_rules($rules);
                if ( $this->form_validation->run() == false ) {
                    $retArray           = $this->form_validation->error_array();
                    $retArray['status'] = false;
                    echo json_encode($retArray);
                    exit;
                } else {
                    $teacherID = $this->input->post('teacherID');
                    if ( (int) $teacherID ) {
                        $this->data["teacher"] = $this->teacher_m->get_single_teacher([ 'teacherID' => $teacherID ]);
                        if ( $this->data["teacher"] ) {
                            $email   = $this->input->post('to');
                            $subject = $this->input->post('subject');
                            $message = $this->input->post('message');
                            $this->reportSendToMail('teachermodule.css', $this->data, 'teacher/print_preview', $email,
                                $subject, $message);
                            $retArray['message'] = "Message";
                            $retArray['status']  = true;
                            echo json_encode($retArray);
                            exit;
                        } else {
                            $retArray['message'] = $this->lang->line('teacher_data_not_found');
                            echo json_encode($retArray);
                            exit;
                        }
                    } else {
                        $retArray['message'] = $this->lang->line('teacher_data_not_found');
                        echo json_encode($retArray);
                        exit;
                    }
                }
            } else {
                $retArray['message'] = $this->lang->line('teacher_permissionmethod');
                echo json_encode($retArray);
                exit;
            }
        } else {
            $retArray['message'] = $this->lang->line('teacher_permission');
            echo json_encode($retArray);
            exit;
        }
    }

    public function unique_email()
    {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if ( (int) $id ) {
            $teacher_info = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
            $tables = [
                'student'     => 'student',
                'parents'     => 'parents',
                'teacher'     => 'teacher',
                'user'        => 'user',
                'systemadmin' => 'systemadmin'
            ];
            $array        = [];
            $i            = 0;
            foreach ( $tables as $table ) {
                $user = $this->teacher_m->get_username($table,
                    [ "email" => $this->input->post('email'), 'username !=' => $teacher_info->username ]);
                if ( customCompute($user) ) {
                    $this->form_validation->set_message("unique_email", "%s already exists");
                    $array['permition'][ $i ] = 'no';
                } else {
                    $array['permition'][ $i ] = 'yes';
                }
                $i++;
            }
            if ( in_array('no', $array['permition']) ) {
                return false;
            } else {
                return true;
            }
        } else {
            $tables = [
                'student'     => 'student',
                'parents'     => 'parents',
                'teacher'     => 'teacher',
                'user'        => 'user',
                'systemadmin' => 'systemadmin'
            ];
            $array  = [];
            $i      = 0;
            foreach ( $tables as $table ) {
                $user = $this->teacher_m->get_username($table, [ "email" => $this->input->post('email') ]);
                if ( customCompute($user) ) {
                    $this->form_validation->set_message("unique_email", "%s already exists");
                    $array['permition'][ $i ] = 'no';
                } else {
                    $array['permition'][ $i ] = 'yes';
                }
                $i++;
            }

            if ( in_array('no', $array['permition']) ) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function active()
    {
        if ( permissionChecker('teacher_edit') ) {
            $id     = $this->input->post('id');
            $status = $this->input->post('status');
            if ( $id != '' && $status != '' ) {
                if ( (int) $id ) {
                    $teacher = $this->teacher_m->get_single_teacher([ 'teacherID' => $id ]);
                    if ( customCompute($teacher) ) {
                        if ( $status == 'chacked' ) {
                            $this->teacher_m->update_teacher([ 'active' => 1 ], $id);
                            echo 'Success';
                        } elseif ( $status == 'unchacked' ) {
                            $this->teacher_m->update_teacher([ 'active' => 0 ], $id);
                            echo 'Success';
                        } else {
                            echo "Error";
                        }
                    } else {
                        echo "Error";
                    }
                } else {
                    echo "Error";
                }
            } else {
                echo "Error";
            }
        } else {
            echo "Error";
        }
    }

    private function leave_applications_date_list_by_user_and_schoolyear( $userID, $schoolyearID, $usertypeID )
    {
        $leaveapplications = $this->leaveapplication_m->get_order_by_leaveapplication([
            'create_userID'     => $userID,
            'create_usertypeID' => $usertypeID,
            'schoolyearID'      => $schoolyearID,
            'status'            => 1
        ]);

        $retArray = [];
        if ( customCompute($leaveapplications) ) {
            $oneday = 60 * 60 * 24;
            foreach ( $leaveapplications as $leaveapplication ) {
                for ( $i = strtotime($leaveapplication->from_date); $i <= strtotime($leaveapplication->to_date); $i = $i + $oneday ) {
                    $retArray[] = date('d-m-Y', $i);
                }
            }
        }
        return $retArray;
    }
}