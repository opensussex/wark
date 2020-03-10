<?php
namespace Wark\App\Controllers;

use Wark\Wark\Controller;

class ModelExample extends Controller
{

    private $meta_title = 'Wark';

    public function index()
    {
        $model = $this->loadModel('Example');
        dump($model);
    }
}
