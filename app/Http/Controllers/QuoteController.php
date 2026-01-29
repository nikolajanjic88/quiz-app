<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Request;
use App\Session;
use App\Models\Lore;
use App\Models\Quote;

class QuoteController
{
    use Guard;
    private Quote $quoteModel;
    private Lore $loreModel;
    private Request $request;

    public function __construct()
    {
        $this->quoteModel = new Quote();
        $this->loreModel = new Lore();
        $this->request = new Request();
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

    public function create()
    {
        $this->admin();
        $lores = $this->loreModel->forSelect();
        return view('admin/addQuote', ['lores' => $lores]);
    }

    public function store()
    {
        $this->admin();
        $lores = $this->loreModel->forSelect();

        $request = $this->request->getBody();
        $audio   = $_FILES['audio'] ?? null;
        
        if (!$this->quoteModel->validate($request) || !$this->quoteModel->validateAudio($audio)) {
            Session::flash('errors', $this->quoteModel->errors());
            Session::flash('old', [
                'text'  => $request['text'],
            ]);

            return view('admin/addQuote', [
                'errors' => Session::get('errors'),
                'lores'  => $lores
            ]);
        }
        
        $audioPath = $this->quoteModel->uploadAudio($audio);

        $this->quoteModel->insert([
            'text'    => $request['text'],
            'audio'   => $audioPath,
            'lore_id' => $request['lore_id']
        ]);

        Session::put('message', 'Quote added successfully');
        return redirect('/add-quote');
    }

}
