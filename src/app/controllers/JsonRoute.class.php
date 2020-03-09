<?php
namespace Wark\App\Controllers;

use Wark\Wark\Controller;

class JsonRoute extends Controller
{

    public function index()
    {
        $data = [
            'test' => true
        ];
        $this->jsonResponse($data);
    }
}
