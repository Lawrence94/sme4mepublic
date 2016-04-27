<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseRelation;
use Parse\ParseACL;
use Parse\ParseRole;
use Parse\ParseQuery;

class Payment extends CI_Controller {

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
				$this->load->view('login/payment', $data);
			}else{
				redirect('register');
			}
	}

	public function next($url='')
	{
		$currentUser = $this->session->userdata('user_vars');
		if($currentUser){
			$data = array(
				'displayData' => 'display:none',
				'url' => $url,
			);
			$this->load->view('login/payment', $data);
		}else{
			redirect('register/'.$url);
		}
	}
	
	public function showCard(){
		redirect('Main/Card');
	}
		
}