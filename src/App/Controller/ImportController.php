<?php

namespace App\Controller;

use Security\Model\User;
use utils\classes\Ics;
use Slim\Http\Request;
use Slim\Http\Response;

class ImportController extends Controller
{
    public function import(Request $request, Response $response, array $data = [])
    {

        /* Replace the URL / file path with the .ics url */ //TODO passer en commentaire
        $file = "https://www.airbnb.fr/calendar/ical/6136083.ics?s=5f3e9f0a0fb33d91e88db6e6e7d1ffe1";



        $data['t'] = (new Ics())->getIcsEventsAsArray($file);
        return $this->view->render($response, 'Home/home.twig', $data);
    }
}
