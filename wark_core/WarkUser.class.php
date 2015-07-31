<?php

// Import the necessary classes
use Cartalyst\Sentinel\Native\Facades\Sentinel;
/*
 * User class
 * 
 */
class WarkUser{

    public function register(array $userVals)
    {
         // Register a new user
        try{
            $user = Sentinel::register($userVals);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


}        
