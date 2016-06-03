<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseRelation;
use Parse\ParseACL;
use Parse\ParseRole;
use Parse\ParseQuery;

class Card extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		// Load helpers
		$this->load->model('login/Login_model', 'login');
		$this->load->helper(['notification_helper']);
		$this->load->helper(['loginval_helper']);
		$this->load->helper(['buildpage_helper']);

		// Load Parse Initialization Library (very important for login).
	    $this->load->library(array('Parseinit'));
		
	}

	public function index()
	{
		$currentUser = $this->session->userdata('user_vars');
			if($currentUser){
				$data = array(
					'displayData' => 'display:none'
				);
				$this->load->view('login/card', $data);
			}else{
				$data = array(
					'displayData' => 'display:none'
				);

				//ParseUser::logOut();

				$this->load->view('login/signup', $data);
			}
	}
	
	public function doVoucherPay(){
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//declare variables
			//holding boolean for error checking
			$status1 = true;
			$currentUser = $this->session->userdata('user_vars');
			//code from card form
			$code = $this->input->post('code');
			$result = $this->db->get_where('vouchers', ['vouchercode' => $code])->row();

			if($result == NULL){
				notify('danger', 'Invalid Join Code', site_url('Main/Card'));
			}else{
				$userid = $currentUser['userid'];
				$vid = $result->id;

				$voucherRes = $this->db->get_where('subusers', ['voucherid' => $vid])->row();
				if($voucherRes == NULL){
					$datadb = ['userid' => $userid,
			                   'voucherid' => $vid,
		                      ];
	                if($this->db->insert('subusers', $datadb)){
	                	$exp = new DateTime('+365 day');
	                	$data = ['expDate'=> $exp->format('Y-m-d H:i:s'),
	                			 'status' => 1,
	                			];
	                	$this->db->where('id', $userid);
						$this->db->update('userdetails', $data);
						$this->session->unset_userdata('user_vars');
	                	notify('success', 'You have a one year validity, please login again', site_url('login'));
	                }
				}else{
					notify('danger', 'This Code has already been used, sorry', site_url('payment'));
				}
				
			}
		}else{
			
		}
	}
		
}