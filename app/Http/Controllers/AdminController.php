<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Session;
use App\Models\Admin;
use App\Request;

class AdminController 
{
  use Guard;

  private Admin $adminModel;
  private Request $request;

  public function __construct()
  {
    $this->adminModel = new Admin();
    $this->request = new Request();
  }
  
  public function index()
  {   
    $this->admin();
    $userCount = $this->adminModel->getUserCount();
    $questionCount = $this->adminModel->getQuestionCount();
    $scoreCount = $this->adminModel->getScoreCount();
    $recentQuestions = $this->adminModel->recentAddedQuestions();

    return view('admin/dashboard', [
      'userCount' => $userCount,
      'questionCount' => $questionCount,
      'scoreCount' => $scoreCount,
      'recentQuestions' => $recentQuestions
    ]);
  }

  public function allQuestions()
  {
    $this->admin();
    $questions = $this->adminModel->all();
 
    return view('admin/questions', [
      'questions' => $questions
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
}