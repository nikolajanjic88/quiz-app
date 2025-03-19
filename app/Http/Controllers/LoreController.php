<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Lore;

class LoreController 
{
  use Guard;

  private Lore $loreModel;

  public function __construct()
  {
    $this->loreModel = new Lore();
  }

  public function index()
  {
    $this->user();

    $data = $this->loreModel->all();
   
    return view('lore', [
      'data' => $data
    ]);
  }

  public function show()
  {
    $this->user();

    $data = $this->loreModel->find($_GET['id']);
    
    return view('character', [
      'data' => $data
    ]);
  }
  
}