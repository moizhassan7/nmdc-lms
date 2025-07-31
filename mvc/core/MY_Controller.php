<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property document_m $document_m
 * @property email_m $email_m
 * @property error_m $error_m
 */
class MY_Controller extends CI_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL / COLLEGE MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			KIT & SWITCH 2 ITECH TEAM
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY KING IT CENTRE
| -----------------------------------------------------
*/
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->config('iniconfig');
        $this->data['errors'] = [];

        if ( !$this->config->config_install() ) {
            redirect(site_url('install'));
        }
    }
}

