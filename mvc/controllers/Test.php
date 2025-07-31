<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends Admin_Controller {
// class Test extends CI_Controller {
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
//		if(config_item('demo') == FALSE || ENVIRONMENT == 'production') {
//			redirect('dashboard/index');
//		}
	}

	public function index()
    {
        $this->load->model('teacherclasses_m');
        dump($this->teacherclasses_m->teacherClass());

	}
}
