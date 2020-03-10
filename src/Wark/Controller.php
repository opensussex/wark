<?php
namespace Wark\Wark;

class Controller
{

    private $template = null;
    private $template_vars = array();



    /**
     * Constructs a new instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Loads a view.
     *
     * @param      string      $view       The view
     * @param      array       $view_vars  The view variables
     * @param      boolean     $buffer     The buffer
     *
     * @throws     \Exception
     *
     * @return     string
     */
    public function loadView(string $view, array $view_vars = null, bool $buffer = false) : string
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
        return '';
    }


    /**
     * redirect
     *
     * @param      string  $uri    The uri
     */
    public function redirect(string $uri)
    {
        /*
         * a simple redirect (if we need it);
         */
        header("location:$uri");
        die();
    }



    /**
     * send json response
     *
     * @param      array    $output  The output
     * @param      integer  $code    The code
     */
    public function jsonResponse(array $output, int $code = 200)
    {
        header('Content-Type: application/json');
        header('X-PHP-Response-Code: '. $code, true, $code);
        echo json_encode($output);
    }

    public function sendHeader(int $code = 200)
    {
        header('X-PHP-Response-Code: '. $code, true, $code);
    }
}
