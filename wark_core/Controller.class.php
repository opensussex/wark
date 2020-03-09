<?php

namespace Wark;

/*
 * This is the core controller class this will be extended by other controllers.
 *
 */
 
class Controller
{
    /**
     * [$db description]
     * @var [type]
     */
    private $template = null;
    private $template_vars = array();
    private $warkAuth = null;

    /**
     * [__construct description]
     * @param [type] $db
     */
    public function __construct()
    {
        $this->warkAuth = new WarkAuth();
    }
    
    /**
     * [loadView description]
     * @param  [type]  $view
     * @param  [type]  $view_vars
     * @param  boolean $buffer
     * @return [type]
     */
    public function loadView($view, $view_vars = null, $buffer = false)
    {
        $view_file = DEPLOY_DIR . VIEW_DIR . $view . VIEW_SUFFIX;
        if (file_exists($view_file)) {
            if ($buffer == true) {
                return file_get_contents($view_file);
            } else {
                require_once($view_file);
            }
        } else {
            echo "view file does not exist :: $view_file";
        }
    }
    
    /**
     * [loadModel description]
     * @param  [type] $model
     * @return [type]
     */
    public function loadModel($model)
    {
        $model = ucfirst($model);
        $model_file = DEPLOY_DIR . MODEL_DIR . $model . MODEL_SUFFIX;
        if (file_exists($model_file)) {
            require_once($model_file);
            return Model::factory($model);
        } else {
            echo "model file does not exist :: $model_file";
        }
    }
    
    /**
     * [redirect description]
     * @param  [type] $uri
     * @return [type]
     */
    public function redirect($uri)
    {
        header("location:$uri");
        die();
    }

    public function warkAuth()
    {
        return $this->warkAuth;
    }


    public function isLoggedIn()
    {
        return $this->warkAuth()->check();
    }

    public function jsonResponse(array $output)
    {
        header('Content-Type: application/json');
        echo json_encode($output);
    }
}
