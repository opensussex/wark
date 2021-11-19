<?php
namespace Wark\App\Controllers;

use Wark\Wark\Controller;

class Routed extends Controller
{

    private $meta_title = 'Wark';

    public function index()
    {
        //
    }

    public function test($test)
    {
        var_dump($test);
    }
}
