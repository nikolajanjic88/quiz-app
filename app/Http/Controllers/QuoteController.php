<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuoteController
{
    private Quote $quoteModel;

    public function __construct()
    {
        $this->quoteModel = new Quote();
    }

    public function index()
    {
        return view('quote');
    }

    public function random()
    {
        header('Content-Type: application/json');
        echo json_encode($this->quoteModel->getRandomQuote());
    }


}
