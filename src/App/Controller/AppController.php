<?php

namespace App\Controller;

use App\Model\Reservation;
use App\Model\Traveller;
use Slim\Http\Request;
use Slim\Http\Response;

class AppController extends Controller
{
    public function home(Request $request, Response $response)
    {
        return $this->view->render($response, 'Home/home.twig');
    }

    public function months(Request $request, Response $response)
    {
        $data['months'] = Reservation::selectRaw('*, sum(amount) as amount,  MONTH(collection) as month, YEAR(collection) as year')
            ->orderBy('year', 'DESC')
            ->orderBy('month', 'DESC')
            ->groupBy('year', 'month')
            ->get();
        return $this->view->render($response, 'Show/months.twig', $data);
    }

    public function oneMonth(Request $request, Response $response, $year, $month)
    {
        $data['id'] = $year . '/' . $month;
        $data['reservations'] = Reservation::whereYear('collection', $year)
            ->whereMonth('collection', $month)
            ->get();
        return $this->view->render($response, 'Show/oneMonth.twig', $data);
    }

    public function years(Request $request, Response $response)
    {
        $data['years'] = Reservation::selectRaw('*,count(id) as count, sum(amount) as amount,  YEAR(collection) as year')
            ->groupBy('year')
            ->get();
        return $this->view->render($response, 'Show/years.twig', $data);
    }

    public function oneYear(Request $request, Response $response, $id)
    {
        $data['id'] = $id;
        $data['reservations'] = Reservation::whereYear('collection', $id)->orderBy('collection', 'DESC')->get();
        return $this->view->render($response, 'Show/oneYear.twig', $data);
    }

    public function newReservation(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $traveller = new Traveller();
            $reservation = new Reservation();

            $traveller->username = $request->getParam('username');
            $traveller->country = $request->getParam('country');
            $traveller->city = $request->getParam('city');
            $traveller->save();

            $reservation->start = $request->getParam('start');
            $reservation->end = $request->getParam('end');
            $reservation->collection = $request->getParam('collection');
            $reservation->amount = $request->getParam('amount');
            $reservation->nb_traveller = $request->getParam('nb_traveller');
            $reservation->location_id = 1;
            $reservation->intermediate_id = 1;
            $reservation->traveller_id = $traveller->id;

            $reservation->save();
            $this->flash('success', 'The reservation has been added.');
        }
        return $this->view->render($response, 'Forms/newReservation.twig');
    }
}
