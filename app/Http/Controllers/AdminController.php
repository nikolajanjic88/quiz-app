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
    $question = $request['question'];
    $incorrect_answers = json_encode($request['incorrect_answers']);
    $correct_answer = $request['correct_answer'];

    if(!$this->adminModel->validate($request))
    {
      Session::flash('errors', $this->adminModel->errors());
      Session::flash('old', [
          'question' => $question,
          'incorrect_answers' => $request['incorrect_answers'],
          'correct_answer' => $correct_answer
      ]);
      
      return view('admin/addQuestion', [
        'errors' => Session::get('errors')
      ]);
    }
    
    $this->adminModel->insert($question, $incorrect_answers, $correct_answer);
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
    $request = $this->request->getBody();
    $question = $request['question'];
    $incorrect_answers = json_encode($request['incorrect_answers']);
    $correct_answer = $request['correct_answer'];

    if(!$this->adminModel->validate($request))
    {
      Session::flash('errors', $this->adminModel->errors());
      Session::flash('old', [
          'question' => $question,
          'incorrect_answers' => $request['incorrect_answers'],
          'correct_answer' => $correct_answer
      ]);
      $question = $this->adminModel->find($_GET['id']);
      $incorrect_answers = json_decode($question['incorrect_answers'], true);

      return view('admin/editQuestion', [
        'errors' => Session::get('errors'),
        'question' => $question,
        'incorrect_answers' => $incorrect_answers
      ]);
    }

    $this->adminModel->update($question, $incorrect_answers, $correct_answer, $_GET['id']);
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
    $title = $request['title'];
    $text = $request['text'];
    $image = $_FILES['image'];

    if(!$this->loreModel->validate($request) || !$this->loreModel->validateImage($image))
    {
      Session::flash('errors', $this->loreModel->errors());
      Session::flash('old', [
          'title' => $title,
          'text' => $text,
          'image' => $image
      ]);
      
      return view('admin/addLore', [
        'errors' => Session::get('errors')
      ]);
    }

    $this->loreModel->insert($title, $text, $image);
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
    $request = $this->request->getBody();
    $title = $request['title'];
    $text = $request['text'];
  
    if(!$this->loreModel->validate($request))
    {
      Session::flash('errors', $this->loreModel->errors());
      Session::flash('old', [
          'title' => $title,
          'text' => $text
      ]);
      $lore = $this->loreModel->find($_GET['id']);

      return view('admin/editLore', [
        'errors' => Session::get('errors'),
        'lore' => $lore,
        'title' => $title,
        'text' => $text
      ]);
    }
    
    $this->loreModel->update($title, $text, $_GET['id']);
    Session::put('message', 'Lore updated successfully');

    return redirect('/all-lore');
  }

  public function destroyLore()
  {
    $this->admin();
    $request = $this->request->getBody();
    $id = $request['id'];

    $this->loreModel->delete($id);
    Session::put('message', 'Character deleted successfully');

    return redirect('/all-lore');
  }
}