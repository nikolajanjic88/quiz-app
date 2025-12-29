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

    $page = (int) ($_GET['page'] ?? 1);
    $search = $_POST['search-character'] ?? null;

    $data = $this->loreModel->all($page, null, $search);
    $pages = $this->loreModel->pages();

    return view('lore', [
        'data' => $data,
        'pages' => $pages,
        'currentPage' => $page,
        'search' => $search
    ]);
  }

  public function show()
  {
    $this->user();

    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (!$id) {
        abort(404);
    }

    $data = $this->loreModel->find($id);

    return view('character', [
        'data' => $data
    ]);
  }
  
}