<?php
namespace Wark;

class Controller
{
    /**
     * [$db description]
     * @var [type]
     */
    private $template = null;
    private $template_vars = array();
    /**
     * [__construct description]
     * @param [type] $db
     */
    public function __construct()
    {
        //
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
            throw new \Exception("view file does not exist :: $view");
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
            return new $model();
        } else {
            throw new \Exception("model file does not exist :: $model_file");
        }
    }

    /**
     * [redirect description]
     * @param  [type] $uri
     * @return [type]
     */
    public function redirect($uri)
    {
        /*
         * a simple redirect (if we need it);
         */
        header("location:$uri");
        die();
    }

    public function jsonResponse(array $output)
    {
        header('Content-Type: application/json');
        echo json_encode($output);
    }
}
