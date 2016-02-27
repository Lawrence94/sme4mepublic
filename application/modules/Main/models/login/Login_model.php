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

    public function doLogin($userName, $password){

    	try {
  			$user = ParseUser::logIn($userName, $password);
  			// Do stuff after successful login.
  			// return true to the Login controller so that it can load the dashBoard
  			return ['status' => true,];

			} catch (ParseException $ex) {
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
      $user = new ParseUser();
      $user->set("fullname", $fullname);
      $user->set("username", $username);
      $user->set("password", $password);
      $user->set("email", $username);

      // other fields can be set just like with ParseObject
      try {

      // Query for the role to be assigned to the owner of the company
        $user->signUp();
        $role = new ParseObject("_Role");
        $query = new ParseQuery("_Role");
        $role = $query->get('n21t2vD9Ke');
        $role->getUsers()->add($user);
        $user->set("role", $role);
        $role->save();
        $user->save();
        // Hooray! Let them use the app now.
        return ['status' => true,];
      } catch (ParseException $ex) {
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
	
}

/*
End of Login_Model.
 */
