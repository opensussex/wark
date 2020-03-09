<?php
namespace Wark\App\Controllers;

use Wark\Wark\Controller;

class Json extends Controller
{

    private $meta_title = 'Wark';

    public function index()
    {
        $data = [
            'test' => true
        ];
        $this->jsonResponse($data);
    }
}
