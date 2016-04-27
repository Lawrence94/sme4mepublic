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
			redirect('login', 'refresh');
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
			redirect('login', 'refresh');
		}
		//$result = $this->db->get_where('post', ['category' => $value])->result();
		
	}

	public function contact()
	{
		$currentUser = $this->session->userdata('user_vars');
		if ($currentUser){		
			if($currentUser['status'] == '1'){
				// $result = $this->db->get_where('posts', ['id' => $value])->row();
				// $groupArray = ['result' => $result,
				// 			   'count' => $this->login->checkCount($result->category)
				// 			  ];
				$this->load->view('dashboard/contact');
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
			redirect('login', 'refresh');
		}
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
			redirect('login', 'refresh');
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
    		redirect('login','refresh');
		}
    }

    public function logout()
    {
    	$this->session->unset_userdata('user_vars');
    	redirect('dashboard','refresh');
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
    		//$dateDifff = date_diff($diff, $end);

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

    public function mailtest($name)
    {
    	$to      = 'l.agbani@hotmail.co.uk' . ', ';
    	$to      .= 'agbani92@gmail.com';
		$subject = 'Mail Test';
		$message = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pssword reset </title>
<!-- <link href="styles.css" media="all" rel="stylesheet" type="text/css" /> -->
<style type="text/css">
* {
  margin: 0;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  box-sizing: border-box;
  font-size: 14px;
}

img {
  max-width: 100%;
}

body {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  width: 100% !important;
  height: 100%;
  line-height: 1.6em;
  /* 1.6em * 14px = 22.4px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
  /*line-height: 22px;*/
}


table td {
  vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
  background-color: #f6f6f6;
}

.body-wrap {
  background-color: #f6f6f6;
  width: 100%;
}

.container {
  display: block !important;
  max-width: 600px !important;
  margin: 0 auto !important;
  /* makes it centered */
  clear: both !important;
}

.content {
  max-width: 600px;
  margin: 0 auto;
  display: block;
  padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
  background-color: #fff;
  border: 1px solid #e9e9e9;
  border-radius: 3px;
}

.content-wrap {
  padding: 20px;
}

.content-block {
  padding: 0 0 20px;
}

.header {
  width: 100%;
  margin-bottom: 20px;
}

.footer {
  width: 100%;
  clear: both;
  color: #999;
  padding: 20px;
}
.footer p, .footer a, .footer td {
  color: #999;
  font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  color: #000;
  margin: 40px 0 0;
  line-height: 1.2em;
  font-weight: 400;
}

h1 {
  font-size: 32px;
  font-weight: 500;
  /* 1.2em * 32px = 38.4px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
  /*line-height: 38px;*/
}

h2 {
  font-size: 24px;
  /* 1.2em * 24px = 28.8px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
  /*line-height: 29px;*/
}

h3 {
  font-size: 18px;
  /* 1.2em * 18px = 21.6px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
  /*line-height: 22px;*/
}

h4 {
  font-size: 14px;
  font-weight: 600;
}

p, ul, ol {
  margin-bottom: 10px;
  font-weight: normal;
}
p li, ul li, ol li {
  margin-left: 5px;
  list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
  color: #348eda;
  text-decoration: underline;
}

.btn-primary {
  text-decoration: none;
  color: #FFF;
  background-color: #FF9F00;
  border: solid #FF9F00;
  border-width: 10px 20px;
  line-height: 2em;
  /* 2em * 14px = 28px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
  /*line-height: 28px;*/
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  display: inline-block;
  border-radius: 5px;
  text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
  margin-bottom: 0;
}

.first {
  margin-top: 0;
}

.aligncenter {
  text-align: center;
}

.alignright {
  text-align: right;
}

.alignleft {
  text-align: left;
}

.clear {
  clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
  font-size: 16px;
  color: #fff;
  font-weight: 500;
  padding: 20px;
  text-align: center;
  border-radius: 3px 3px 0 0;
}
.alert a {
  color: #fff;
  text-decoration: none;
  font-weight: 500;
  font-size: 16px;
}
.alert.alert-warning {
  background-color: #FF9F00;
}
.alert.alert-bad {
  background-color: #D0021B;
}
.alert.alert-good {
  background-color: #68B90F;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
  margin: 40px auto;
  text-align: left;
  width: 80%;
}
.invoice td {
  padding: 5px 0;
}
.invoice .invoice-items {
  width: 100%;
}
.invoice .invoice-items td {
  border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
  border-top: 2px solid #333;
  border-bottom: 2px solid #333;
  font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }

  h1, h2, h3, h4 {
    font-weight: 800 !important;
    margin: 20px 0 5px !important;
  }

  h1 {
    font-size: 22px !important;
  }

  h2 {
    font-size: 18px !important;
  }

  h3 {
    font-size: 16px !important;
  }

  .container {
    padding: 0 !important;
    width: 100% !important;
  }

  .content {
    padding: 0 !important;
  }

  .content-wrap {
    padding: 10px !important;
  }

  .invoice {
    width: 100% !important;
  }
}
</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alert alert-warning">
							Warning: Your subscription is almost over. Please upgrade.
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										You have <strong>1 day</strong> remaining.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Add your credit card now to upgrade your account to a premium plan to ensure you do not miss out on any Scholarship offers.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<a href="http://www.sme4.me" class="btn-primary">Upgrade my account</a>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Thanks for choosing Smart Money Encyclopedia Inc.
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block"><a href="http://www.mailgun.com">Unsubscribe</a> from these alerts.</td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>';
    	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		//$headers .= 'To: Lawrence <l.agbani@hotmail.co.uk>' . "\r\n";
		$headers .= 'From: '.$name.' <lawrence@lawrencetalks.com>' . "\r\n";
		//$headers .= 'Cc: agbani92@gmail.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	   try {
	   	mail($to, $subject, $message, $headers, '-flawrence@lawrencetalks.com -rlawrence@lawrencetalks.com');
	   	echo "Mail sent ";
	   } catch (Exception $e) {
	   	echo "THere was a problem " . $e;
	   }
	   
    }
}
