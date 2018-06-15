<?php

namespace Admin\Controller;

use App\Controller\Controller;
use Illuminate\Database\Capsule\Manager;
use Slim\Http\Request;
use Slim\Http\Response;

class DataController extends Controller
{
    public function home(Request $request, Response $response)
    {
        return $this->view->render($response, 'Admin/home.twig');
    }

    public function data(Request $request, Response $response, $table = 'notable')
    {
        if (Manager::schema()->hasTable($table)) {
            if ($table === 'User') {
                $data['data'] = ('Security\Model\\' . $table)::all()->toArray();
            } else {
                $data['data'] = ('App\Model\\' . $table)::all()->toArray();
            }
        }
        return $this->view->render($response, 'Admin/home.twig', $data);
    }
}
