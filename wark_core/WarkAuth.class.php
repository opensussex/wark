<?php

// Import the necessary classes
use Cartalyst\Sentinel\Native\Facades\Sentinel;
/*
 * User class
 * 
 */
class WarkAuth{

    public function register(array $credentials)
    {
        try{
            $user = Sentinel::register($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }


    public function registerAndActivate(array $credentials)
    {
        try{
            $user = Sentinel::registerAndActivate($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }


    public function authenticate(array $credentials)
    {
        try{
            $user = Sentinel::authenticate($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function authenticateAndRemember(array $credentials)
    {
        try{
            $user = Sentinel::authenticateAndRemember($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function forceAuthentication(array $credentials)
    {
        try{
            $user = Sentinel::forceAuthentication($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function forceAuthenticationAndRemember(array $credentials)
    {
        try{
            $user = Sentinel::forceAuthenticationAndRemember($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function check()
    {
        try{
            $user = Sentinel::check();
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function guest()
    {
        try{
            $user = Sentinel::guest();
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function getUser()
    {
        try{
            $user = Sentinel::getUser();
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function login(User $user,$remember = false)
    {
        try{
            $login = Sentinel::login($user,$remember);
            return $login;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }   
    }

    public function logout()
    {
        // this terminates the session for the current logged in user.
        return Sentinel::logout(null, true);
    }

    public function findById(int $id)
    {
        try{
            $user = Sentinel::findById($id);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function findByCredentials(array $credentials)
    {
        try{
            $user = Sentinel::findByCredentials($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function validateCredentials(array $credentials)
    {
        try{
            $user = Sentinel::validateCredentials($credentials);
            return $user;
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function validForCreation(array $credentials)
    {
        try{
            return Sentinel::validForCreation($credentials);
        }catch(Exception $e) {
            //echo $e->getMessage();
            return null;
        }
    }


    public function validForUpdate(User $user, array $credentials)
    {
        try{
            return Sentinel::validForUpdate($user, $credentials);
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function create(array $credentials, $closure = null)
    {
        try{
            return Sentinel::validForUpdate($credentials, $closure);
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function update(User $user, array $credentials)
    {
        try{
            return Sentinel::update($user, $credentials);
        }catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    public function delete(User $user)
    {
        try{
            $user->delete();
        }catch(Exception $e) {
            //echo $e->getMessage();
            return null;
        }
    }

}        
