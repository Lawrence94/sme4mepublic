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

    public function doSignup($fullname, $username, $password, $country = '')
    {
      // create the new user
      $created = new DateTime('now');
      $end = new DateTime('+30 day');
      $datadb = ['fullname' => $fullname,
                 'username' => $username,
                 'password' => $password,
                 'email' => $username,
                 'country' => $country,
                 'aid' => 5,
                 'dateCreated' => $created->format('Y-m-d H:i:s'),
                 'expDate'=> $end->format('Y-m-d H:i:s'),
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
      $result = $this->db->get_where('posts', ['category' => $value, 'status' => '1'])->result();
      return count($result);
    }

    public function doProfileEdit($fullname='', $username='', $userid, $firstname='', $lastname='', $country='', $password='')
    {
      try {
        $currentUser = $this->session->userdata('user_vars');
        $details = $this->db->get_where('userdetails', ['username' => $currentUser['username']])->row();

        $access = $currentUser['accesslevel'];
        $postArray = [];
        if ($access == '1') {
          if($password != null){
            $postArray = ['firstname' => $firstname,
                          'lastname' => $lastname,
                          'username' => $username,
                          'password' => $password,
                         ];
          }else{
            $postArray = ['firstname' => $firstname,
                          'lastname' => $lastname,
                          'username' => $username,
                          'country' => $country,
                         ];
          }

          if ($password != null && $country != null) {
            $postArray = ['firstname' => $firstname,
                          'lastname' => $lastname,
                          'username' => $username,
                          'country' => $country,
                          'password' => $password,
                         ];
          }
          
        }else{
          if ($password != null) {
            $postArray = ['fullname' => $fullname,
                          'username' => $username,
                          'password' => $password
                         ];
          }else{
            $postArray = ['fullname' => $fullname,
                          'username' => $username,
                          'country' => $country,
                         ];
          }

          if ($password != null && $country != null) {
            $postArray = ['fullname' => $fullname,
                          'username' => $username,
                          'country' => $country,
                          'password' => $password,
                         ];
          }
          
        }
        
        $this->db->where('id', $userid);
        if($this->db->update('userdetails', $postArray)){
          $this->session->unset_userdata('user_vars');
          
          $this->login($details->username, $details->password);
          return ['status' => true,];
        }else{
          return ['status' => false, 'parseMsg' => 'There was an error, please try again'];
        }

      } catch (Exception $ex) {
        return ['status' => false, 'parseMsg' => 'There was an error, please try again'];
      }
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
                                        'fullname' => $details->fullname,
                                        'firstname' => $details->firstname,
                                        'lastname' => $details->lastname,
                                        'country' => $details->country,
                                        'accesslevel' => $details->aid,
                                        'status' => $details->status,
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
