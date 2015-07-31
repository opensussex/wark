<?php

// Import the necessary classes
use Cartalyst\Sentinel\Native\Facades\Sentinel;
/*
 * User class
 * 
 */
class WarkUser{

    public function register(array $credentials)
    {
         // Register a new user
        try{
            $user = Sentinel::register($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function registerAndActivate(array $credentials)
    {
         // Register and and Activate a user
        try{
            $user = Sentinel::registerAndActivate($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function authenticate(array $credentials)
    {
         // Register a new user
        try{
            $user = Sentinel::authenticate($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function authenticateAndRemember(array $credentials)
    {
         // Register a new user
        try{
            $user = Sentinel::authenticateAndRemember($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function forceAuthentication(array $credentials)
    {
         // Register a new user
        try{
            $user = Sentinel::forceAuthentication($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function forceAuthenticationAndRemember(array $credentials)
    {
         // Register a new user
        try{
            $user = Sentinel::forceAuthenticationAndRemember($credentials);
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function check()
    {
         // Register a new user
        try{
            $user = Sentinel::check();
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function guest()
    {
         // Register a new user
        try{
            $user = Sentinel::guest();
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getUser()
    {
         // Register a new user
        try{
            $user = Sentinel::getUser();
            return $user;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

}        
