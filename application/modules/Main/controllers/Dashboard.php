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

		$currentUser = ParseUser::getCurrentUser();
		$adminName = $this->menu_header();
		if ($currentUser){		
		
			// $dashView = $this->load->view('dashboard/dashboard', $adminName, true);
			// buildPage($dashView, 'Dashboard');
			$this->load->view('dashboard/dashboard', $adminName);
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
		$currentUser = ParseUser::getCurrentUser();
		if ($currentUser){		
			$result = $this->db->get_where('posts', ['category' => $value])->result();
			// var_dump($result);
			// exit;
			$groupArray = ['title' => strtoupper($value),
						   'result' => $result,
						   'count' => $this->login->checkCount($value)
						  ];
			$this->load->view('dashboard/group', $groupArray);
		}
		else{
			echo 'Session Expired';
			redirect('Main/Login', 'refresh');
		}
		//$result = $this->db->get_where('post', ['category' => $value])->result();
		
	}

	public function getpost($value)
	{
		$currentUser = ParseUser::getCurrentUser();
		if ($currentUser){		
			$result = $this->db->get_where('posts', ['id' => $value])->row();
			$groupArray = ['result' => $result,
						   'count' => $this->login->checkCount($result->category)
						  ];
			$this->load->view('dashboard/newpost', $groupArray);
		}
		else{
			echo 'Session Expired';
			redirect('Main/Login', 'refresh');
		}
	}

	public function menu_header(){

		//getting the currently logged in admin
		$currentUser = ParseUser::getCurrentUser();
		$firstName = '';
		$lastName = '';
		$url = '/Admin/dashboard';
		$cssClass = 'active';
		$cssClass1 = '""';
		$cssClass2 = '""';
		$cssClass3 = '""';
		if ($currentUser) {
    		// do stuff with the user
    		$firstName = $currentUser->get("firstName");
    		$lastName = $currentUser->get("lastName");
    		$username = $currentUser->get("username");
    		$roleCheck = $currentUser->get("role");
    		$roleCheck->fetch();
    		$role = $roleCheck->get("name");
    		$userDetails = array(
        	'firstName' => $firstName,
        	'lastName' => $lastName,
        	'username' => $username
        	);
        	$this->session->set_userdata($userDetails);

    		return array(
    		'displayData' => 'display:none',
        	'firstName' => $firstName,
        	'lastName' => $lastName,
        	'redirect' => $url,
        	'role' => $role,
        	'active' => $cssClass,
        	'grantcount' => $this->login->checkCount('Grant'),
        	'fellowcount' => $this->login->checkCount('Fellowship'),
        	'intcount' => $this->login->checkCount('Internship'),
        	'corpcount' => $this->login->checkCount('Corporation'),
        	'scholcount' => $this->login->checkCount('Scholarship'),
        	'compcount' => $this->login->checkCount('Competition'),
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
}
