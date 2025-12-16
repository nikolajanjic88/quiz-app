<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Request;
use App\Session;
use App\Models\Lore;
use App\Models\Admin;

class AdminController 
{
  use Guard;

  private Admin $adminModel;
  private Lore $loreModel;
  private Request $request;

  public function __construct()
  {
    $this->adminModel = new Admin();
    $this->loreModel = new Lore();
    $this->request = new Request();
  }
  
  public function index()
  {   
    $this->admin();
    $userCount = $this->adminModel->getUserCount();
    $questionCount = $this->adminModel->getQuestionCount();
    $scoreCount = $this->adminModel->getScoreCount();
    $recentQuestions = $this->adminModel->recentAddedQuestions();
    $recentLore = $this->loreModel->recentAddedLore();

    return view('admin/dashboard', [
      'userCount' => $userCount,
      'questionCount' => $questionCount,
      'scoreCount' => $scoreCount,
      'recentQuestions' => $recentQuestions,
      'recentLore' => $recentLore
    ]);
  }

  public function allQuestions()
  {
    $this->admin();
    $questions = $this->adminModel->all();
    $pages = $this->adminModel->pages();
  
    return view('admin/questions', [
      'questions' => $questions,
      'pages' => $pages
    ]);
  }

  public function create()
  {
    $this->admin();
    return view('admin/addQuestion');
  }

  public function store()
  {
      $this->admin();

      $request = $this->request->getBody();

      if(!$this->adminModel->validate($request)) {
          Session::flash('errors', $this->adminModel->errors());
          Session::flash('old', $request);

          return view('admin/addQuestion', [
              'errors' => Session::get('errors')
          ]);
      }

      $data = [
          'question' => $request['question'],
          'incorrect_answers' => json_encode($request['incorrect_answers']),
          'correct_answer' => $request['correct_answer']
      ];

      $this->adminModel->insert($data);
      Session::put('message', 'Question added successfully');

      return redirect('/all-questions');
  }

  public function edit()
  {
    $this->admin();
    $question = $this->adminModel->find($_GET['id']);
    $incorrect_answers = json_decode($question['incorrect_answers'], true);

    return view('admin/editQuestion', [
      'question' => $question,
      'incorrect_answers' => $incorrect_answers]);
  }

  public function update()
  {
      $this->admin();

      $id = $_GET['id'] ?? 0;

      if (!$id) {
          return redirect('/all-questions');
      }

      $request = $this->request->getBody();

      if (!$this->adminModel->validate($request)) {
          Session::flash('errors', $this->adminModel->errors());
          Session::flash('old', $request);
       
          $question = $this->adminModel->find($id);
         
          return view('admin/editQuestion', [
              'errors' => Session::get('errors'),
              'question' => $question,
              'incorrect_answers' => json_decode($question['incorrect_answers'], true)
          ]);
      }

      $data = [
          'question' => $request['question'],
          'incorrect_answers' => json_encode($request['incorrect_answers']),
          'correct_answer' => $request['correct_answer'],
      ];

      $this->adminModel->update($id, $data);

      Session::put('message', 'Question updated successfully');

      return redirect('/all-questions');
  }


  public function destroy()
  {
    $this->admin();
    $request = $this->request->getBody();
    $question = $request['id'];
    
    $this->adminModel->delete($question);
    Session::put('message', 'Question deleted successfully');

    return redirect('/all-questions');
  }

  public function lore()
  {
    $this->admin();

    $pages = $this->loreModel->pages();
    $data = $this->loreModel->all();
   
    return view('admin/lore', [
      'data' => $data,
      'pages' => $pages
    ]);
  }

  public function createLore()
  {
    $this->admin();
    return view('admin/addLore');
  }

  public function storeLore()
  {
    $this->admin();

    $request = $this->request->getBody();
    $image   = $_FILES['image'] ?? null;

    if (!$this->loreModel->validate($request) || !$this->loreModel->validateImage($image)) {
        Session::flash('errors', $this->loreModel->errors());
        Session::flash('old', [
            'title' => $request['title'],
            'text'  => $request['text']
        ]);

        return view('admin/addLore', [
            'errors' => Session::get('errors')
        ]);
    }

    $imagePath = null;

    if ($image && $image['tmp_name']) {
        $name = microtime(true) . '_' . basename($image['name']);
        $path = BASE_PATH . '/public/images/lore/' . $name;

        move_uploaded_file($image['tmp_name'], $path);
        $imagePath = '/images/lore/' . $name;
    }

    $this->loreModel->insert([
        'title' => $request['title'],
        'text'  => $request['text'],
        'image' => $imagePath
    ]);

    Session::put('message', 'Lore added successfully');
    return redirect('/all-lore');
  }

  public function editLore()
  {
    $this->admin();
    $lore = $this->loreModel->find($_GET['id']);
    
    return view('admin/editLore', [
      'lore' => $lore
    ]);
  }
  
  public function updateLore()
  {
    $this->admin();

    $id = $_GET['id'] ?? 0;
    if (!$id) {
      return redirect('/all-lore');
    } 

    $request = $this->request->getBody();

    if (!$this->loreModel->validate($request)) {
        Session::flash('errors', $this->loreModel->errors());
        Session::flash('old', [
            'title' => $request['title'],
            'text'  => $request['text']
        ]);

        $lore = $this->loreModel->find($id);

        return view('admin/editLore', [
            'errors' => Session::get('errors'),
            'lore'   => $lore
        ]);
    }

    $this->loreModel->update($id, [
        'title' => $request['title'],
        'text'  => $request['text']
    ]);

    Session::put('message', 'Lore updated successfully');
    return redirect('/all-lore');
  }

  public function destroyLore()
  {
    $this->admin();

    $id = $this->request->getBody()['id'];
    if (!$id) {
        Session::put('message', 'Invalid lore ID');
        return redirect('/all-lore');
    }

    $lore = $this->loreModel->find($id);
    if (!$lore) {
        Session::put('message', 'Lore not found');
        return redirect('/all-lore');
    }

    if (!empty($lore['image'])) {
        $imagePath = BASE_PATH . '/public' . $lore['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $this->loreModel->delete($id);

    Session::put('message', 'Lore deleted successfully');
    return redirect('/all-lore');
  }

}