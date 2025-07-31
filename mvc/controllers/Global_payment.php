<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_payment extends Admin_Controller
{
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
        $this->load->model("student_m");
        $this->load->model("classes_m");
        $this->load->model("section_m");
        $this->load->model('studentgroup_m');
        $this->load->model('feetypes_m');
        $this->load->model('invoice_m');
        $this->load->model('payment_m');
        $this->load->model('globalpayment_m');
        $this->load->model('weaverandfine_m');
        $this->load->model('maininvoice_m');
        $this->load->model('studentrelation_m');
		$this->load->model("Accounts_m");
		$this->load->model('income_m');
		$this->load->model("liability_m");
		$this->load->model('Statement_m');
        $language = $this->session->userdata('lang');
        $this->lang->load('global_payment', $language);
    }

    protected function rules()
    {
        $rules = [
            [
                'field' => 'classesID',
                'label' => $this->lang->line("global_classes"),
                'rules' => 'trim|required|xss_clean|max_length[11]|callback_unique_classes',
            ],
            [
                'field' => 'sectionID',
                'label' => $this->lang->line("global_section"),
                'rules' => 'trim|xss_clean|max_length[11]',
            ],
            [
                'field' => 'studentID',
                'label' => $this->lang->line("global_student"),
                'rules' => 'trim|required|xss_clean|max_length[11]|callback_unique_student',
            ],
        ];

        return $rules;
    }  

    public function index() {
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
		
		$this->data['accounts'] = $this->Accounts_m->get_accounts();

        $schoolyearID                   = $this->session->userdata('defaultschoolyearID');
        $this->data['classes']          = $this->classes_m->get_classes();
        $this->data['sections']         = 0;
        $this->data['students']         = [];
        $this->data['globalpayments']   = [];


        $this->data['set_classesID']    = 0;
        $this->data['set_sectionID']    = 0;
        $this->data['set_studentID']    = 0;
        $this->data['set_groupID']      = 0;

        if($this->input->post('classesID') > 0) {
            $this->data['sections'] = $this->section_m->get_order_by_section(array('classesID' => $this->input->post('classesID')));
            if($this->input->post('sectionID') > 0) {
                $this->data['students'] = $this->studentrelation_m->get_order_by_student(array('srclassesID' => $this->input->post('classesID'), 'srsectionID' => $this->input->post('sectionID'), 'srschoolyearID' => $schoolyearID));
            } else {
                $this->data['students'] = $this->studentrelation_m->get_order_by_student(array('srclassesID' => $this->input->post('classesID'), 'srschoolyearID' => $schoolyearID));
            }
        }


        $this->data['single_student'] = [];
        if ($_POST) {
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->data["subview"]  = "global_payment/index";
                $this->load->view('_layout_main', $this->data);
            } else {
                $classesID                      = $this->input->post('classesID');
                $sectionID                      = $this->input->post('sectionID');
                $studentID                      = $this->input->post('studentID');

                $this->data['set_classesID']    = $classesID; 
                $this->data['set_sectionID']    = $sectionID;
                $this->data['set_studentID']    = $studentID;

                $this->data['feetypes'] = pluck($this->feetypes_m->get_feetypes(), 'feetypes', 'feetypesID');
				$this->data['panel_payment_type'] = pluck($this->feetypes_m->get_feetypes(), 'panel_payment_type', 'feetypesID');
				
                $this->data['single_student'] = $this->studentrelation_m->get_single_student(array('srstudentID' => $studentID, 'srschoolyearID' => $schoolyearID));

                $this->payment_m->order_payment('paymentID asc');
                $allPaymentList = $this->payment_m->get_order_by_payment(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));

                $allWeaverList = $this->weaverandfine_m->get_order_by_weaverandfine(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));

                $this->data['payments'] = $this->generateAllPaymentAmount($allPaymentList);
                $this->data['weavers'] = $this->generateAllWeaverAmount($allWeaverList);
                $this->data['paymenteds'] = $allPaymentList;
                $this->data['weavereds'] = $allWeaverList;

                $this->data['globalpayment_max'] = $this->globalpayment_m->get_max_globalpayment();

                if(customCompute($this->data['single_student'])) {
                    $single_student = $this->data['single_student'];

                    $this->data['single_classes'] = $this->classes_m->get_single_classes(array('classesID' => $single_student->srclassesID));
                    $this->data['single_section'] = $this->section_m->get_single_section(array('sectionID' => $single_student->srsectionID));
                    $this->data['single_group'] = $this->studentgroup_m->get_single_studentgroup(array('studentgroupID' => $single_student->srstudentgroupID));

                    $this->data['invoices'] = $this->invoice_m->get_order_by_invoice(array('studentID' => $single_student->srstudentID, 'schoolyearID' => $schoolyearID, 'deleted_at' => 1));

                    $this->data['invoicefeetype'] = pluck($this->data['invoices'], 'feetypeID', 'invoiceID');

                    $this->data['globalpayments'] = $this->globalpayment_m->get_order_by_globalpayment(array('schoolyearID' => $schoolyearID,  'studentID' => $single_student->srstudentID));

                    $this->data['paidpayments'] = $this->generateAllPaymentAmountWithGlobalID($allPaymentList);

                    $this->data['weaverandfines'] = pluck($this->weaverandfine_m->get_order_by_weaverandfine(array('studentID' => $single_student->srstudentID, 'schoolyearID' => $schoolyearID)), 'obj', 'paymentID');
                } else {
                    $this->data['single_classes'] = [];
                    $this->data['single_section'] = [];
                    $this->data['single_group'] = [];
                    $this->data['invoices'] = [];
                    $this->data['globalpayments'] = [];
                }

                $this->data["subview"] = "global_payment/index";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "global_payment/index";
            $this->load->view('_layout_main', $this->data);
        }
    }

    private function generateAllPaymentAmount($payments) {
        $returnArray = [];
        if(customCompute($payments)) {
            foreach ($payments as $payment) {
                $returnArray[$payment->invoiceID] = isset($returnArray[$payment->invoiceID]) ?  $returnArray[$payment->invoiceID] + $payment->paymentamount :  $payment->paymentamount; 
            }
        }

        return $returnArray;
    }

    private function generateAllPaymentAmountWithGlobalID($payments) {
        $returnArray = [];
        $weaverandfine = pluck($this->weaverandfine_m->get_weaverandfine(), 'obj', 'paymentID');

        if(customCompute($payments)) {
            foreach ($payments as $payment) {
                $returnArray['paid'][$payment->globalpaymentID] = isset($returnArray['paid'][$payment->globalpaymentID]) ?  $returnArray['paid'][$payment->globalpaymentID] + $payment->paymentamount :  $payment->paymentamount;

                if(isset($returnArray['paid'][$payment->globalpaymentID])) {
                    if(isset($weaverandfine[$payment->paymentID])) {
                        if(isset($returnArray['weaver'][$payment->globalpaymentID])) {
                            $returnArray['weaver'][$payment->globalpaymentID] += $weaverandfine[$payment->paymentID]->weaver; 
                        } else {
                            $returnArray['weaver'][$payment->globalpaymentID] = $weaverandfine[$payment->paymentID]->weaver; 
                        }

                        if(isset($returnArray['fine'][$payment->globalpaymentID])) {
                            $returnArray['fine'][$payment->globalpaymentID] += $weaverandfine[$payment->paymentID]->fine; 
                        } else {
                            $returnArray['fine'][$payment->globalpaymentID] = $weaverandfine[$payment->paymentID]->fine; 
                        }
                    }

                    if(!isset($returnArray['paiddate'][$payment->globalpaymentID])) {
                        $returnArray['paiddate'][$payment->globalpaymentID] = $payment->paymentdate;
                    }
                }
            }
        }

        return $returnArray;
    }

    private function generateAllWeaverAmount($weaverandfines) {
        $returnArray = [];
        if(customCompute($weaverandfines)) {
            foreach ($weaverandfines as $weaverandfine) {
                $returnArray[$weaverandfine->invoiceID] = isset($returnArray[$weaverandfine->invoiceID]) ?  $returnArray[$weaverandfine->invoiceID] + $weaverandfine->weaver :  $weaverandfine->weaver; 
            }
        }
        return $returnArray;
    }

    public function unique_classes() {
        if ($this->input->post('classesID') == 0) {
            $this->form_validation->set_message("unique_classes", "The %s field is required");
            return FALSE;
        }
        return TRUE;
    }

    public function unique_student() {
        if($this->input->post('studentID') == 0) {
            $this->form_validation->set_message("unique_student", "The %s field is required");
            return false;
        }
        return true;
    }

    public function sectioncall() {
        $id = $this->input->post('id');
        if ((int) $id) {
            $allsection = $this->section_m->get_order_by_section([ "classesID" => $id ]);
            echo "<option value='0'>", $this->lang->line("global_select_section"), "</option>";
            foreach ($allsection as $value) {
                echo "<option value=\"$value->sectionID\">", $value->section, "</option>";
            }
        } else {
            echo "<option value='0'>", $this->lang->line("global_select_section"), "</option>";
        }
    }

    public function studentcall() {
        $classesID = $this->input->post('classesID');
        $sectionID = $this->input->post('sectionID');
        $schoolyearID = $this->session->userdata('defaultschoolyearID');

        if ((int) $classesID && (int) $sectionID) {
            if($sectionID == 0) {
                $allstudent = $this->studentrelation_m->get_order_by_student([ "srclassesID" => $classesID, 'srschoolyearID' => $schoolyearID ]);
            } else {
                $allstudent = $this->studentrelation_m->get_order_by_student([ "srclassesID" => $classesID, 'srsectionID' => $sectionID, 'srschoolyearID' => $schoolyearID ]);
            }

            echo "<option value='0'>", $this->lang->line("global_select_student"), "</option>";
            foreach ($allstudent as $value) {
                echo "<option value=\"$value->srstudentID\">", $value->srname.' - '.$this->lang->line('global_roll').' - '.$value->srroll, "</option>";
            }
        } elseif((int) $classesID) {
            $allstudent = $this->studentrelation_m->get_order_by_student([ "srclassesID" => $classesID, 'srschoolyearID' => $schoolyearID ]);
            echo "<option value='0'>", $this->lang->line("global_select_student"), "</option>";
            foreach ($allstudent as $value) {
                echo "<option value=\"$value->srstudentID\">", $value->srname.' - '.$this->lang->line('global_roll').' - '.$value->srroll, "</option>";
            }
        } else {
            echo "<option value='0'>", $this->lang->line("global_select_section"), "</option>";
        }
    }

    protected function paymentRules() {
        $rules = array(
            array(
                'field' => 'studentID',
                'label' => $this->lang->line("global_student"),
                'rules' => 'trim|required|xss_clean|numeric|max_length[11]'
            ),
            array(
                'field' => 'classesID',
                'label' => $this->lang->line("global_classes"),
                'rules' => 'trim|required|xss_clean|numeric|max_length[11]'
            ),
            array(
                'field' => 'invoicename',
                'label' => $this->lang->line("global_invoice_name"),
                'rules' => 'trim|required|xss_clean|max_length[127]'
            ),
            array(
                'field' => 'invoicedescription',
                'label' => $this->lang->line("global_description"),
                'rules' => 'trim|xss_clean|max_length[127]'
            ),
            array(
                'field' => 'note',
                'label' => $this->lang->line("global_payment_note"),
                'rules' => 'trim|xss_clean|max_length[300]'
            ),			
            array(
                'field' => 'invoicenumber',
                'label' => $this->lang->line("global_invoice_number"),
                'rules' => 'trim|required|xss_clean|min_length[6]'
            ),
            array(
                'field' => 'paymentyear',
                'label' => $this->lang->line("global_payment_year"),
                'rules' => 'trim|required|numeric|xss_clean|max_length[4]'
            ),
            array(
                'field' => 'payment_status',
                'label' => $this->lang->line("global_payment_status"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'payment_type',
                'label' => $this->lang->line("global_payment_type"),
                'rules' => 'trim|required|xss_clean|max_length[50]'
            ),
            array(
                'field' => 'paid',
                'label' => $this->lang->line("global_paid"),
                'rules' => 'trim|xss_clean|max_length[10]|callback_unique_paidweaverfine'
            )
        );
        return $rules;
    }

    public function unique_paidweaverfine() {
        $paids = $this->input->post('paid');
        $weavers = $this->input->post('weaver');
        $fines = $this->input->post('fine');

        $max_value = 10; 
        $paidRequiredStatus = FALSE;
        $weaverRequiredStatus = FALSE;
        $fineRequiredStatus = FALSE;
        
        if(customCompute($paids)) {
            foreach ($paids as $paid) {
                if($paid['value'] != '') {
                    if((float) $paid['value']) {
                        if(strlen($paid['value']) <= $max_value && strlen($paid['value']) >= 0) {
                            $paidRequiredStatus = TRUE;
                        } else {
                            $this->form_validation->set_message("unique_paidweaverfine", "%s cannot exceed ".$max_value." characters in length.");
                            return FALSE;
                        } 
                    } else {
                        $this->form_validation->set_message("unique_paidweaverfine", "%s must contain only numbers.");
                        return FALSE;
                    }
                }
            }
        }

        if(customCompute($weavers)) {
            foreach ($weavers as $weaver) {
                if($weaver['value'] != '') {
                    if((float) $weaver['value']) {
                        if(strlen($weaver['value']) <= $max_value && strlen($weaver['value']) >= 0) {
                            $weaverRequiredStatus = TRUE;
                        } else {
                            $this->form_validation->set_message("unique_paidweaverfine", "%s cannot exceed ".$max_value." characters in length.");
                            return FALSE;
                        } 
                    } else {
                        $this->form_validation->set_message("unique_paidweaverfine", "%s must contain only numbers.");
                        return FALSE;
                    }
                }
            }
        }

        if(customCompute($fines)) {
            foreach ($fines as $fine) {
                if($fine['value'] != '') {
                    if((float) $fine['value']) {
                        if(strlen($fine['value']) <= $max_value && strlen($fine['value']) >= 0) {
                            $fineRequiredStatus = TRUE;
                        } else {
                            $this->form_validation->set_message("unique_paidweaverfine", "%s cannot exceed ".$max_value." characters in length.");
                            return FALSE;
                        } 
                    } else {
                        $this->form_validation->set_message("unique_paidweaverfine", "%s must contain only numbers.");
                        return FALSE;
                    }
                }
            }
        }

        if($paidRequiredStatus || $weaverRequiredStatus || $fineRequiredStatus) {
            if($this->session->flashdata('paymentGenerateStatus')) {
                return FALSE;
                $this->form_validation->set_message("unique_paidweaverfine", "%s is required.");
            }

            return TRUE;
        } else {
            $this->form_validation->set_message("unique_paidweaverfine", "%s is required.");
            return FALSE;
        }
    }

    public function paymentSend() {
        $retArray['status'] = FALSE;
        $retArray['message'] = '';

        if($_POST) {
            $rules = $this->paymentRules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $retArray = $this->form_validation->error_array();
                $retArray['status'] = FALSE;
                echo json_encode($retArray);
                exit;
            } else {
                $schoolyearID       = $this->session->userdata('defaultschoolyearID');

                $panel_payment_types= $this->input->post('panel_payment_type');
				$paids              = $this->input->post('paid');
                $weavers            = $this->input->post('weaver');
                $fines              = $this->input->post('fine');
                
                $studentID          = $this->input->post('studentID');
                $classesID          = $this->input->post('classesID');
                $invoicename        = $this->input->post('invoicename');
				$accountsID        	= $this->input->post('accountsID');
				$voucher_number     = $this->input->post('voucher_number');
                $invoicedescription = $this->input->post('invoicedescription');
				$note 				= $this->input->post('note');
                $invoicenumber      = $this->input->post('invoicenumber');
                $paymentyear        = $this->input->post('paymentyear');
                $payment_status     = $this->input->post('payment_status');
                $payment_type       = $this->input->post('payment_type');
                $sectionID          = 0;
                
                $globalpayment['classesID']         = $classesID;
                $globalpayment['studentID']         = $studentID;
                $globalpayment['clearancetype']     = $payment_status;
                $globalpayment['invoicename']       = $invoicename;
                $globalpayment['invoicedescription']= $invoicedescription;
				$globalpayment['note']				= $note;
                $globalpayment['paymentyear']       = $paymentyear;
                $globalpayment['schoolyearID']      = $schoolyearID;

                if($studentID) {
                    $student = $this->studentrelation_m->get_single_student(array('srstudentID' => $studentID, 'srschoolyearID' => $schoolyearID));
                    if(customCompute($student)) {
                        $sectionID = $student->srsectionID;
                    }
                }

                $globalpayment['sectionID'] = $sectionID;
                $this->globalpayment_m->insert_globalpayment($globalpayment);
                $globalLastID = $this->db->insert_id();

$tr_date=date('dmYHis').rand(1111,9999);

                if($globalLastID) { 
                    $payments = [];
                    $weaverandfines = [];
                    $j = (customCompute($paids) - 1);
                    
                    for($i = 0; $i <= $j; $i++) {
                        $expPaidField = explode('-', $paids[$i]['paidFieldID']);
                        $payments[$i] = array(
                            'schoolyearID' => $schoolyearID,
                            'invoiceID' => $expPaidField[1],                
                            'studentID' => $studentID,                
                            'paymentamount' => ($paids[$i]['value'] == '') ? NULL : $paids[$i]['value'],
							'panel_payment_type' => $panel_payment_types[$i]['value'],                			
							'tr_id' => $tr_date.$schoolyearID.$studentID.$expPaidField[1],
                            'paymenttype' => ucfirst($payment_type),
							'accountsID' => $accountsID,
							'voucher_number' => $voucher_number,
                            'paymentdate' => date('Y-m-d'),                
                            'paymentday' => date('d'),                
                            'paymentmonth' => date('m'),                
                            'paymentyear' => date('Y'),
                            'userID' => $this->session->userdata('loginuserID'),
                            'usertypeID' => $this->session->userdata('usertypeID'),
                            'uname' => $this->session->userdata('name'),
                            'transactionID' => 'CASHANDCHEQUE'.random19(),      
                            'globalpaymentID' => $globalLastID,                
                        );
						
if($paids[$i]['value'] != ''){
$panel_payment_typesz = $panel_payment_types[$i]['value'];
if($panel_payment_typesz == "Income"){
//for inserting into income
$in_exname=1;
$in_exnames="Fee via Invoice";
					$arrayincome['name'] 			= $in_exname;
					$arrayincome['incomeheadID'] 	= 1;
					$arrayincome['accountsID'] 	= $accountsID;
					$arrayincome['voucher_number'] 	= $voucher_number;
					$arrayincome['invoiceID'] 	= $expPaidField[1];
					$arrayincome['studentID'] 	= $studentID;
$arrayincome['tr_id'] 	= $tr_date.$schoolyearID.$studentID.$expPaidField[1];
					$arrayincome['date'] 			= date('Y-m-d');
					$arrayincome['incomeday'] 	= date("d");
					$arrayincome['incomemonth'] 	= date("m");
					$arrayincome['incomeyear']	= date("Y");
			$arrayincome['amount'] 		= ($paids[$i]['value'] == '') ? NULL : $paids[$i]['value'];
					$arrayincome['note'] 			= $invoicedescription;
					$arrayincome['create_date'] 	= date('Y-m-d');
					$arrayincome['schoolyearID'] 	= $schoolyearID;
					$arrayincome['userID'] 		= $this->session->userdata('loginuserID');
					$arrayincome['usertypeID'] 	= $this->session->userdata('usertypeID');
					
$in_extype=$panel_payment_typesz;					
					$this->income_m->insert_income($arrayincome);					
					$in_exLastID = $this->db->insert_id();
}else{
$in_exname=1;
$in_exnames="Liabilty via Invoice";
					$arrayliability = array(
						"liability" 		=> $in_exname,
						"accountsID" 		=> $accountsID,
						"voucher_number" 	=> $voucher_number,
						"invoiceID" 		=> $expPaidField[1],
						"studentID" 		=> $studentID,
"tr_id" => $tr_date.$schoolyearID.$studentID.$expPaidField[1],
						"liabilityheadID" 		=> 1,
						"amount" 		=> ($paids[$i]['value'] == '') ? NULL : $paids[$i]['value'],
						"note" 			=> $invoicedescription,
						"create_date" 	=> date("Y-m-d"),
						"date" 			=> date("Y-m-d"),
						"liabilityday" 	=> date("d"),
						"liabilitymonth" 	=> date("m"),
						"liabilityyear" 	=> date("Y"),
						'usertypeID' 	=> $this->session->userdata('usertypeID'),
						'uname' 		=> $this->session->userdata('name'),
						'userID' 		=> $this->session->userdata('loginuserID'),
						'schoolyearID' 	=> $schoolyearID
					);
$in_extype=$panel_payment_typesz;
					$this->liability_m->insert_liability($arrayliability);
					$in_exLastID = $this->db->insert_id();
}
//for inserting into statement
					$arraystatement['name'] 		= $in_exnames;
					$arraystatement['in_exheadID'] 	= 1;
					$arraystatement['accountsID'] 	= $accountsID;
					$arraystatement['voucher_number'] 	= $voucher_number;
					$arraystatement['invoiceID'] 	= $expPaidField[1];
					$arraystatement['studentID'] 	= $studentID;
$arraystatement['tr_id'] 	= $tr_date.$schoolyearID.$studentID.$expPaidField[1];
					$arraystatement['type'] 		= $in_extype;
					$arraystatement['date'] 		= date("Y-m-d");
					$arraystatement['in_exday'] 	= date("d");
					$arraystatement['in_exmonth'] 	= date("m");
					$arraystatement['in_exyear']	= date("Y");
	$arraystatement['recamount'] 		= ($paids[$i]['value'] == '') ? NULL : $paids[$i]['value'];
					$arraystatement['note'] 			= $invoicedescription;
					$arraystatement['create_date'] 	= date('Y-m-d');
				$arraystatement['schoolyearID'] 	= $schoolyearID;
					$arraystatement['userID'] 		= $this->session->userdata('loginuserID');
					$arraystatement['usertypeID'] 	= $this->session->userdata('usertypeID');
					$arraystatement['in_exID'] 	= $in_exLastID;
					
					$this->Statement_m->insert_statement($arraystatement);														
}						

$tr_datez=date('dmYHis').rand(11111,99999);
                        if(isset($weavers[$i]['value']) || isset($fines[$i]['value'])) {
                            if($weavers[$i]['value'] > 0 && $fines[$i]['value'] > 0) {
                                $weaverandfines[$i] = array(
                                    'weaver' => $weavers[$i]['value'],
                                    'fine' => $fines[$i]['value'],
                                    'globalpaymentID' => $globalLastID,
                                    'invoiceID' => $expPaidField[1],
                                    'accountsID' => $accountsID,
									'voucher_number' => $voucher_number,
									'studentID' => $studentID,
                                    'schoolyearID' => $schoolyearID,
                                );
//for inserting into income
$in_exname=2; // for fine
					$arrayincome['name'] 			= $in_exname;
					$arrayincome['incomeheadID'] 	= 1;
					$arrayincome['accountsID'] 	= $accountsID;
					$arrayincome['voucher_number'] 	= $voucher_number;
					$arrayincome['invoiceID'] 	= $expPaidField[1];
					$arrayincome['studentID'] 	= $studentID;
					$arrayincome['tr_id'] 		= $tr_datez.$schoolyearID.$studentID.$expPaidField[1];
					$arrayincome['date'] 			= date('Y-m-d');
					$arrayincome['incomeday'] 	= date("d");
					$arrayincome['incomemonth'] 	= date("m");
					$arrayincome['incomeyear']	= date("Y");
					$arrayincome['amount'] 		= $fines[$i]['value'];
					$arrayincome['create_date'] 	= date('Y-m-d');
					$arrayincome['schoolyearID'] 	= $schoolyearID;
					$arrayincome['userID'] 		= $this->session->userdata('loginuserID');
					$arrayincome['usertypeID'] 	= $this->session->userdata('usertypeID');
					
					$this->income_m->insert_income($arrayincome);					
					$in_exLastID = $this->db->insert_id();

//for inserting into statement
$in_exname="Fine via Invoice"; // for fine
$in_extype="Fine Income";
					$arraystatement['name'] 		= $in_exname;
					$arraystatement['in_exheadID'] 	= 1;
					$arraystatement['accountsID'] 	= $accountsID;
					$arraystatement['voucher_number'] 	= $voucher_number;
					$arraystatement['invoiceID'] 	= $expPaidField[1];
					$arraystatement['studentID'] 	= $studentID;
					$arraystatement['tr_id'] 	= $tr_datez.$schoolyearID.$studentID.$expPaidField[1];
					$arraystatement['type'] 		= $in_extype;
					$arraystatement['date'] 		= date("Y-m-d");
					$arraystatement['in_exday'] 	= date("d");
					$arraystatement['in_exmonth'] 	= date("m");
					$arraystatement['in_exyear']	= date("Y");
					$arraystatement['recamount'] 	= $fines[$i]['value'];
					$arraystatement['create_date'] 	= date('Y-m-d');
					$arraystatement['schoolyearID'] = $schoolyearID;
					$arraystatement['userID'] 		= $this->session->userdata('loginuserID');
					$arraystatement['usertypeID'] 	= $this->session->userdata('usertypeID');
					$arraystatement['in_exID'] 		= $in_exLastID;
					
					$this->Statement_m->insert_statement($arraystatement);														

                            } elseif($weavers[$i]['value'] > 0) {
                                $weaverandfines[$i] = array(
                                    'weaver' => $weavers[$i]['value'],
                                    'fine' => 0,
                                    'globalpaymentID' => $globalLastID,
                                    'invoiceID' => $expPaidField[1],
									'accountsID' => $accountsID,
									'voucher_number' => $voucher_number,
                                    'studentID' => $studentID,
                                    'schoolyearID' => $schoolyearID,
                                );
                            } elseif($fines[$i]['value'] > 0) {
                                $weaverandfines[$i] = array(
                                    'weaver' => 0,
                                    'fine' => $fines[$i]['value'],
                                    'globalpaymentID' => $globalLastID,
                                    'invoiceID' => $expPaidField[1],
									'accountsID' => $accountsID,
									'voucher_number' => $voucher_number,
                                    'studentID' => $studentID,
                                    'schoolyearID' => $schoolyearID,
                                );
//for inserting into income
$in_exname=2; // for fine
					$arrayincome['name'] 			= $in_exname;
					$arrayincome['incomeheadID'] 	= 1;
					$arrayincome['accountsID'] 	= $accountsID;
					$arrayincome['voucher_number'] 	= $voucher_number;
					$arrayincome['invoiceID'] 	= $expPaidField[1];
					$arrayincome['studentID'] 	= $studentID;
					$arrayincome['tr_id'] 		= $tr_datez.$schoolyearID.$studentID.$expPaidField[1];
					$arrayincome['date'] 			= date('Y-m-d');
					$arrayincome['incomeday'] 	= date("d");
					$arrayincome['incomemonth'] 	= date("m");
					$arrayincome['incomeyear']	= date("Y");
					$arrayincome['amount'] 		= $fines[$i]['value'];
					$arrayincome['create_date'] 	= date('Y-m-d');
					$arrayincome['schoolyearID'] 	= $schoolyearID;
					$arrayincome['userID'] 		= $this->session->userdata('loginuserID');
					$arrayincome['usertypeID'] 	= $this->session->userdata('usertypeID');
					
					$this->income_m->insert_income($arrayincome);					
					$in_exLastID = $this->db->insert_id();

//for inserting into statement
$in_exname="Fine via Invoice"; // for fine
$in_extype="Fine Income";
					$arraystatement['name'] 		= $in_exname;
					$arraystatement['in_exheadID'] 	= 1;
					$arraystatement['accountsID'] 	= $accountsID;
					$arraystatement['voucher_number'] 	= $voucher_number;
					$arraystatement['invoiceID'] 	= $expPaidField[1];
					$arraystatement['studentID'] 	= $studentID;
					$arraystatement['tr_id'] 	= $tr_datez.$schoolyearID.$studentID.$expPaidField[1];
					$arraystatement['type'] 		= $in_extype;
					$arraystatement['date'] 		= date("Y-m-d");
					$arraystatement['in_exday'] 	= date("d");
					$arraystatement['in_exmonth'] 	= date("m");
					$arraystatement['in_exyear']	= date("Y");
					$arraystatement['recamount'] 	= $fines[$i]['value'];
					$arraystatement['create_date'] 	= date('Y-m-d');
					$arraystatement['schoolyearID'] = $schoolyearID;
					$arraystatement['userID'] 		= $this->session->userdata('loginuserID');
					$arraystatement['usertypeID'] 	= $this->session->userdata('usertypeID');
					$arraystatement['in_exID'] 		= $in_exLastID;
					
					$this->Statement_m->insert_statement($arraystatement);														
								
                            }
                        }
                    }

                    $insertPaymentIDS = [];
                    if(customCompute($payments)) {
                        foreach($payments as $payment) {
                            $this->payment_m->insert_payment($payment);
                            $paymentID = $this->db->insert_id();
                            $insertPaymentIDS[$payment['invoiceID']] = $paymentID;
                        }
                        $retArray['status'] = TRUE;
                    }

                    if(customCompute($weaverandfines)) {
                        foreach ($weaverandfines as $weaverandfine) {
                            if(isset($insertPaymentIDS[$weaverandfine['invoiceID']])) {
                           $weaverandfine['paymentID'] = $insertPaymentIDS[$weaverandfine['invoiceID']];
                           $this->weaverandfine_m->insert_weaverandfine($weaverandfine);
						   
                            }
                        }
                        $retArray['status'] = TRUE;
                    }

                    $invoices = $this->invoice_m->get_order_by_invoice(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID, 'deleted_at' => 1));

                    $allPaymentList = $this->payment_m->get_order_by_payment(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));

                    $allWeaverList = $this->weaverandfine_m->get_order_by_weaverandfine(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));

                    $payments = $this->generateAllPaymentAmount($allPaymentList);
                    $weavers = $this->generateAllWeaverAmount($allWeaverList);


                    for($i = 0; $i <= $j; $i++) {
                        $expPaidField = explode('-', $paids[$i]['paidFieldID']);
                        if(isset($expPaidField[1]) && isset($invoices[$i]) && customCompute($invoices[$i]) && ($expPaidField[1] == $invoices[$i]->invoiceID)) {
                            $invoiceID = $expPaidField[1];
                            $invoice = $invoices[$i]; 

                            $totalPaymentWeaver = 0;
                            $totalAmount = 0;
                            $status = 0;

                            if(isset($payments[$invoiceID])) {
                                $totalPaymentWeaver += $payments[$invoiceID];
                            }

                            if(isset($weavers[$invoiceID])) {
                                $totalPaymentWeaver += $weavers[$invoiceID];
                            }

                            if($invoice->discount > 0) {
                                $totalAmount = ($invoice->amount - (($invoice->amount/100)*$invoice->discount));
                            } else {
                                $totalAmount = $invoice->amount;
                            }

                            if(number_format($totalAmount, 2, '.', '') == number_format($totalPaymentWeaver, 2, '.', '')) {
                                $status = 2;
                            } elseif((number_format($totalAmount, 2, '.', '') > number_format($totalPaymentWeaver, 2, '.', '')) && (number_format($totalPaymentWeaver, 2, '.', '') != number_format(0, 2, '.', ''))) {
                                $status = 1;
                            }

                            $this->invoice_m->update_invoice(array('paidstatus' => $status), $invoiceID);
                        }
                    }

                    $maininvoices = $this->maininvoice_m->get_order_by_maininvoice(array('maininvoiceschoolyearID' => $schoolyearID, 'maininvoicestudentID' => $studentID, 'maininvoicedeleted_at' => 1));

                    if(customCompute($maininvoices)) {
                        $invoices = $this->invoice_m->get_order_by_invoice(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID, 'deleted_at' => 1));
                        $invoices = pluck_multi_array($invoices, 'obj', 'maininvoiceID');
                        foreach ($maininvoices as $maininvoice) {
                            if(isset($invoices[$maininvoice->maininvoiceID])) {
                                $maininvoicecheckstatus = [];
                                $maininvoicecheckstatusfordueorpar = [];
                                foreach ($invoices[$maininvoice->maininvoiceID] as $invoice) {
                                    if($invoice->paidstatus == 2) {
                                        $maininvoicecheckstatus[] = TRUE; 
                                    } else {
                                        $maininvoicecheckstatus[] = FALSE; 
                                    }

                                    if($invoice->paidstatus == 1) {
                                        $maininvoicecheckstatusfordueorpar[] = TRUE;
                                    } else {
                                        $maininvoicecheckstatusfordueorpar[] = FALSE;
                                    }
                                }


                                if(in_array(FALSE, $maininvoicecheckstatus)) {
                                    if(in_array(TRUE, $maininvoicecheckstatusfordueorpar)) {
                                        $this->maininvoice_m->update_maininvoice(array('maininvoicestatus' => 1), $maininvoice->maininvoiceID);
                                    } else {
                                        $this->maininvoice_m->update_maininvoice(array('maininvoicestatus' => 0), $maininvoice->maininvoiceID);
                                    }
                                } else {
                                    $this->maininvoice_m->update_maininvoice(array('maininvoicestatus' => 2), $maininvoice->maininvoiceID);
                                }
                            }
                        }
                    }
                }

                $this->session->set_flashdata('paymentGenerateStatus', TRUE);
                $this->session->set_flashdata('paymentGenerateGlobalLastID', $globalLastID);
                $this->session->set_flashdata('paymentGenerateLastStudentID', $studentID);
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));

                echo json_encode($retArray);
                exit;
            }
        } else {
            $retArray['message'] = 'Something wrong';
            echo json_encode($retArray);
            exit;
        }
    }
}

