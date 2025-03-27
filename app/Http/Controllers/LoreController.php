<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Lore;
use App\Pagination;

class LoreController 
{
  use Guard, Pagination;

  private Lore $loreModel;

  public function __construct()
  {
    $this->loreModel = new Lore();
  }

  public function index()
  {
    $this->user();

    $data = $this->loreModel->all();
    $pages = $this->loreModel->pages();
   
    return view('lore', [
      'data' => $data,
      'pages' => $pages
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