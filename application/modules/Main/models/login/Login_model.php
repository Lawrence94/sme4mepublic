<?php

/*Login_model
This model gets email and password from the Login controller
and logs in the admin through the doLogin() function.
Database used all through this project is Parse.com's backend as a service.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseRole;

class Login_model extends CI_Model {

	public function __construct()
        {
                parent::__construct();
        }

    public function doLogin($username, $password){

    	try {
  			$loginMysql = $this->login($username, $password);
        $isLogin = $loginMysql['status'];

        if($isLogin){
          return ['status' => true,];
        }else{
          return ['status' => false, 'parseMsg' => 'username or password incorrect'];
        }
        

			} catch (Exception $ex) {
				//return false to the Login controller along with the error message 
				//so that it can send the error message to the view 
				//through the notification_helper
				return ['status' => false, 'parseMsg' => $ex->getMessage()];

		}

    }

    public function doPost($postArray)
    {
      # code...
      if($this->db->insert('posts', $postArray)){
        return ['status' => true,];
      }else{
        return ['status' => false, 'parseMsg' => 'There was an error, please try again'];
      }
    }

    public function doSignup($fullname, $username, $password)
    {
      // create the new company owner
      $datadb = ['fullname' => $fullname,
                 'username' => $username,
                 'password' => $password,
                 'email' => $username,
                 'aid' => 5,
                 'dateCreated' => new DateTime('now'),
                 'endDate'=> new DateTime('+2 day'),
                ];
      // other fields can be set just like with ParseObject
      try {
        //Sign-up user
        if($this->db->insert('userdetails', $datadb)){
          //Now Log user in
          $this->login($username, $password);
        }

        return ['status' => true,];
      } catch (Exception $ex) {
        // Show the error message somewhere and let the user try again.
        // echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
        return ['status' => false, 'parseMsg' => $ex->getMessage()];
      }
    }

    public function checkCount($value)
    {
      $result = $this->db->get_where('posts', ['category' => $value])->result();
      return count($result);
    }

    public function checkCash()
    {
      $result = $this->db->get('posts')->result();
      $sum = 0;
      $row1 = [];
      foreach ( $result as $row ) {
        // += str_replace(",", "", $row['amount']);
        $sum += $row->valuedoll;
      }

      return number_format( $sum, 0 );;
    }

    public function login($username, $password)
    {
      $details = $this->db->get_where('userdetails', ['username' => $username, 'password' => $password])->row();
      
      if($details == null){
        return ['status' => false,];
      }else{
        $key = sha1($details->username.'_'.$details->aid);
        $userdetails = ['user_vars' => ['userid' => $details->id,
                                      'username' => $details->username,
                                      'email' => $details->username,
                                      'firstname' => $details->firstname,
                                      'lastname' => $details->lastname,
                                      'accesslevel' => $details->aid,
                                      'k' => $key,
                                     ]
                     ];
        return ['status' => true, 'session' => $this->session->set_userdata( $userdetails )];
      }
      
    }
	
}

/*
End of Login_Model.
 */
