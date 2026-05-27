<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Request;
use App\Models\Location;

class MapQuizController
{
    use Guard;
    private Request $request;
    private Location $locationModel;

    public function __construct()
    {
        $this->request = new Request();
        $this->locationModel = new Location();
    }

    public function index()
    {
        return view('mapQuiz');
    }

    public function questions()
    {
        header('Content-Type: application/json');

        $data = $this->locationModel->getQuestions(5);
     
        echo json_encode($data);
    }
 
}
