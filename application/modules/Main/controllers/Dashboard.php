<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseRole;

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	    $this->load->helper(['buildpage_helper']);
	    $this->load->library(array('Parseinit'));
	    $this->load->helper(['notification_helper']);
	    $this->load->model('login/Login_model', 'login');
	}


	public function index()
	{
		// $appId = 'BXzf9jtDNrJ4g3jcjgYMOy8tfdhnHw2DtCYikvbg';
  //       $restKey = 'xpTVAiyecFOm3irHq2NRFG0bwbfmTekq2Vgbns0O';
  //       $ch = curl_init();
        

  //       curl_setopt_array($ch, array( 
  //           CURLOPT_URL => 'https://api.parse.com/1/functions/hello',
  //           CURLOPT_RETURNTRANSFER => true,
  //           CURLOPT_CUSTOMREQUEST => "POST",
  //           CURLOPT_POSTFIELDS => '{}',
  //           CURLOPT_SSL_VERIFYPEER => false,
  //           CURLOPT_HTTPHEADER => array(
  //               "X-Parse-Application-Id: " . $appId,
  //               "X-Parse-REST-API-Key: " . $restKey,
  //               "Content-Type: application/json")
  //       ));

  //       // free
  //     $output = curl_exec($ch);
  //     var_dump($output);     
  //     curl_close($ch);
  //     exit;

		$currentUser = $this->session->userdata('user_vars');
		$adminName = $this->menu_header();
		if ($currentUser){		
		
			// $dashView = $this->load->view('dashboard/dashboard', $adminName, true);
			// buildPage($dashView, 'Dashboard');
			if($currentUser['status'] == '1'){
				//echo "Logging you in...";
				$this->load->view('dashboard/dashboard', $adminName);
			}else{
				$this->session->set_flashdata('msg0', 'Subscription Expired!');
				$this->session->set_flashdata('msg1', 'subscription expiration notice!');
				$this->session->set_flashdata('msg2', 'Unfortunately your subscription has expired. Please consider renewing using any of our various payment methods');
				$this->session->set_flashdata('msg3', 'Pay');
				$this->session->set_flashdata('msg4', 'Logout');
				redirect('Main/Payment');
			}
			
		}
		else{
			echo 'hey';
			redirect('Main/Login', 'refresh');
		}
		
	}

	// public function newpost()
	// {
	// 	$currentUser = ParseUser::getCurrentUser();
	// 	$adminName = $this->menu_header();
	// 	if ($currentUser){		
		
	// 		$dashView = $this->load->view('dashboard/newpost', $adminName, true);
	// 		buildPage($dashView, 'Dashboard - New Post');
	// 	}
	// 	else{
	// 		echo 'hey';
	// 		redirect('Main/Login', 'refresh');
	// 	}
	// }

	// public function makepost()
	// {
	// 	if ($this->input->post('adminpost')) {
	// 		$post = $this->input->post('adminpost');
	// 		$status1 = true;

	// 		$posttitle = $post['title'];
	// 		$purpose = $post['purpose'];
	// 		$eligibility = $post['eligibility'];
	// 		$level = $post['level'];
	// 		$value = $post['value'];
	// 		$valuedoll = $post['valuedoll'];
	// 		$frequency = $post['freq'];
	// 		$est = $post['est'];
	// 		$country = $post['country'];
	// 		$awards = $post['awards'];
	// 		$deadline = $post['deadline'];
	// 		$weblink = $post['weblink'];
	// 		$singlecat = $post['catsingle'];
	// 		//$multicat = $post['catmulti'];
	// 		$datecreated = date('Y-m-d h:i:s');

	// 		// var_dump($multicat);
	// 		// exit;

	// 		//$multijson = json_encode($multicat);

	// 		$postArray = ['title' => $posttitle,
	// 					  'purpose' => $purpose,
	// 					  'eligibility' => $eligibility,
	// 					  'level' => $level,
	// 					  'value' => $value,
	// 					  'valuedoll' => $valuedoll,
	// 					  'frequency' => $frequency,
	// 					  'establishment' => $est,
	// 					  'country' => $country,
	// 					  'awards' => $awards,
	// 					  'deadline' => $deadline,
	// 					  'weblink' => $weblink,
	// 					  'category' => $singlecat,
	// 					  'categories' => '',
	// 					  'datecreated' => $datecreated,
	// 					 ];

	// 		 // var_dump($postArray);
	// 		 // exit;

	// 		$postdb = $this->login->doPost($postArray);

	// 			if (!$postdb['status']){
	// 				$status1 = false;
	// 			}

	// 			if (!$status1){
	// 				//echo "fuck";
	// 				notify('danger', $loginParse['parseMsg'], 'Admin/Dashboard/newpost');
	// 			}else{
	// 				echo "Please wait, we'll take you back to the dashboard right away...";
	// 				notify('success', 'Post added sucessfully', 'Admin/Dashboard/newpost');
	// 			}
	// 	}
	// }

	public function getgroup($value)
	{
		$currentUser = $this->session->userdata('user_vars');
		if ($currentUser){		
			if($currentUser['status'] == '1'){
				$result = $this->db->get_where('posts', ['category' => $value, 'status' => '1'])->result();
				// var_dump($result);
				// exit;
				$groupArray = ['title' => strtoupper($value),
							   'result' => $result,
							   'count' => $this->login->checkCount($value)
							  ];
				$this->load->view('dashboard/group', $groupArray);
			}else{
				$this->session->set_flashdata('msg0', 'Subscription Expired!');
				$this->session->set_flashdata('msg1', 'subscription expiration notice!');
				$this->session->set_flashdata('msg2', 'Unfortunately your subscription has expired. Please consider renewing using any of our various payment methods');
				$this->session->set_flashdata('msg3', 'Pay');
				$this->session->set_flashdata('msg4', 'Logout');
				redirect('Main/Payment');
			}
			
		}
		else{
			echo 'Session Expired';
			redirect('Main/Login', 'refresh');
		}
		//$result = $this->db->get_where('post', ['category' => $value])->result();
		
	}

	public function getpost($value)
	{
		$currentUser = $this->session->userdata('user_vars');
		if ($currentUser){		
			if($currentUser['status'] == '1'){
				$result = $this->db->get_where('posts', ['id' => $value])->row();
				$groupArray = ['result' => $result,
							   'count' => $this->login->checkCount($result->category)
							  ];
				$this->load->view('dashboard/newpost', $groupArray);
			}else{
				$this->session->set_flashdata('msg0', 'Subscription Expired!');
				$this->session->set_flashdata('msg1', 'subscription expiration notice!');
				$this->session->set_flashdata('msg2', 'Unfortunately your subscription has expired. Please consider renewing using any of our various payment methods');
				$this->session->set_flashdata('msg3', 'Pay');
				$this->session->set_flashdata('msg4', 'Logout');
				redirect('Main/Payment');
			}
			
		}
		else{
			echo 'Session Expired';
			redirect('Main/Login', 'refresh');
		}
	}

	public function menu_header(){

		//getting the currently logged in admin
		$currentUser = $this->session->userdata('user_vars');
		$firstName = '';
		$lastName = '';
		$url = '/Main/dashboard';
		$cssClass = 'active';
		$cssClass1 = '""';
		$cssClass2 = '""';
		$cssClass3 = '""';
		if ($currentUser) {
    		// do stuff with the user
    		$firstName = $currentUser['firstname'];
    		$lastName = $currentUser["lastname"];
    		$username = $currentUser["username"];
    		$accessid = $currentUser['accesslevel'];
			$roleCheck = $this->db->get_where('accesslevel', ['id' => $accessid])->row();
    		$role = $roleCheck->name;
    		

    		return array(
    		'displayData' => 'display:none',
        	'firstName' => $firstName,
        	'lastName' => $lastName,
        	'redirect' => $url,
        	'role' => $role,
        	'active' => $cssClass,
        	'realcash' => $this->login->checkCash(),
        	//'grantcount' => $this->login->checkCount('Grant'),
        	'phdcount' => $this->login->checkCount('Phd'),
        	'fellowcount' => $this->login->checkCount('Award'),
        	'intcount' => $this->login->checkCount('Internship'),
        	//'corpcount' => $this->login->checkCount('Corporation'),
        	'bachelorcount' => $this->login->checkCount('Bachelor'),
        	//'scholcount' => $this->login->checkCount('Scholarship'),
        	'mastercount' => $this->login->checkCount('Master'),
        	//'compcount' => $this->login->checkCount('Competition'),
        	'doccount' => $this->login->checkCount('Postdoctorate'),
        	'startupcount' => $this->login->checkCount('Startup'),
        	//'socialcount' => $this->login->checkCount('SocialInnovation'),
        	'essaycount' => $this->login->checkCount('Essay'),
        	'ngocount' => $this->login->checkCount('Mba'),
        	//'govcount' => $this->login->checkCount('Government'),
        	'loancount' => $this->login->checkCount('Loan'),
        	'philcount' => $this->login->checkCount('Philantropy'),
        	'active2' => $cssClass1,
        	'active1' => $cssClass2,
        	'active4' => $cssClass1,
        	'active3' => $cssClass3,
        	'active5' => $cssClass1,
        	);

		} else {
    		// show the signup or login page
    		redirect('Main/Login','refresh');
		}
    }

    public function logout()
    {
    	$this->session->unset_userdata('user_vars');
    	redirect('Main/Dashboard','refresh');
    }

    public function userStatus()
    {
    	$logDating = new DateTime('now');
    	$logDate = $logDating->format('Y-m-d H:i:s');
    	$log = $logDate . ": User status check initiated...\n";
    	echo ($log);
    	$details = $this->db->get_where('userdetails', ['status' => '1', 'aid' => '5'])->result();
    	foreach ($details as $key => $val) {
    		$logDating = new DateTime('now');
    		$logDate = $logDating->format('Y-m-d H:i:s');
    		$start = new DateTime('now');
    		$startDate = new DateTime($val->dateCreated); 

    		
    		$end = new DateTime($val->expDate);
    		$diff = date_diff($start, $end);

    		$dateDiff = date_diff($start, $startDate);

    		echo "Difference between date on db and server is: ". $dateDiff->format("%R%a days")."\n";


    		$logFile = $_SERVER['DOCUMENT_ROOT'].'/logs/cronMethodLog.txt';
    		$log = $logDate . ": Checking for expired users...\n";
    		echo ($log);
    		//file_put_contents($logFile, $log, FILE_APPEND | LOCK_EX);

    		if($diff->format("%R%a days") > 0){
    			$log = $logDate . ": " . $val->fullname . " with id " . $val->id . " is still active with " . $diff->format("%R%a days") . " left\n";
    			echo ($log);
    			//file_put_contents($logFile, $log, FILE_APPEND | LOCK_EX);
    		}else{
    			$datadb = ['status' => 0];
    			$log = $logDate . ": " . $val->fullname . " with id " . $val->id . " has an expired license\n";
    			echo ($log);
    			//file_put_contents($logFile, $log, FILE_APPEND | LOCK_EX);
    			$this->db->where('id', $val->id);
				$this->db->update('userdetails', $datadb); 
				$this->session->unset_userdata('user_vars');
				echo "The user status has been changed on the db\n";
    		}
    		
    		//var_dump($logFile);
    	}
    	
    	//exit;
    	// $now = new DateTime('now');
    	// $twodays = new DateTime('+1 day');

    	// $diff = date_diff($now, $twodays);

    	// if($diff->format("%R%a days") > 0){
    	// 	var_dump('active');
    	// 	//exit;
    	// }else{
    	// 	var_dump('inactive');
    	// 	//exit;
    	// }
    	
    	// echo "Remaining Days ".$diff->format("%R%a days");
    	// exit;
    }
}
