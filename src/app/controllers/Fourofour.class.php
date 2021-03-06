<?php
namespace Wark\App\Controllers;

use Wark\Wark\Controller;

/*
* Simple Controller to deal with any 404 page not found.
*
*/
class Fourofour extends Controller
{

    private $meta_title = '404 Error';

    public function index()
    {
        $this->sendHeader(404);
        $this->loadView('header', array('meta_title'=> $this->meta_title));
        $this->loadView('fourofour');
        $this->loadView('footer');
    }
}
