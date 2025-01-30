<?php

namespace App\Models;

use App\Model;

class Admin extends Model
{
  private array $errors = [];
  private string $question = 'question';
  private string $correct_answer = 'correct_answer';
  private string $incorrect_answers = 'incorrect_answers';
  private string $questionsTable = 'questions';
  private string $usersTable = 'users';
  private string $scoresTable = 'scores';

  public function all()
  {
    if(isset($_GET['search']))
    {
      $sql = "SELECT * FROM $this->questionsTable 
              WHERE question LIKE CONCAT('%',?,'%') 
              ORDER BY id DESC";

      $questions = $this->db->query($sql, [$_GET['search']])->get();
    }
    else
    {
      $sql = "SELECT * FROM $this->questionsTable 
              ORDER BY id DESC"; 

      $questions = $this->db->query($sql)->get(); 
    } 
       
    return $questions;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM $this->questionsTable WHERE id = ?";
    $question = $this->db->query($sql, [$id])->findOrFail();
    
    return $question;
  }
  
  public function getUserCount()
  {
    $sql = "SELECT count(*) as total FROM $this->usersTable 
            WHERE is_admin = 0";
    $res = $this->db->query($sql);
    $userCount = $res->find();

    return $userCount['total'];
  }

  public function getQuestionCount()
  {
    $sql = "SELECT count(*) as total FROM $this->questionsTable";
    $res = $this->db->query($sql);
    $questionCount = $res->find();

    return $questionCount['total'];
  }

  public function getScoreCount()
  {
    $sql = "SELECT count(*) as total FROM $this->scoresTable";
    $res = $this->db->query($sql);
    $scoreCount = $res->find();

    return $scoreCount['total'];
  }

  public function recentAddedQuestions()
  {
    $sql = "SELECT question FROM $this->questionsTable 
            ORDER BY id DESC LIMIT 5";
    $res = $this->db->query($sql);
    $recentQuestions = $res->get();

    return $recentQuestions;
  }

  public function insert($question, $incorrect_answers, $correct_answer)
  {
    $sql = "INSERT INTO $this->questionsTable (question, incorrect_answers, correct_answer)
                                      VALUES (:question, :inccorect_answers, :correct_answer)";
    $this->db->query($sql, [
      'question' => $question,
      'inccorect_answers' => $incorrect_answers,
      'correct_answer' => $correct_answer
    ]);
  }

  public function update($question, $incorrect_answers, $correct_answer, $id)
  {
    $sql = "UPDATE $this->questionsTable SET
                          question = :question,
                          incorrect_answers = :incorrect_answers,
                          correct_answer = :correct_answer
                          WHERE id = :id";

    $this->db->query($sql, [
      'question' => $question,
      'incorrect_answers' => $incorrect_answers,
      'correct_answer' => $correct_answer,
      'id' => $id
    ]);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->questionsTable WHERE id = ?";
    $this->db->query($sql, [$id]);
  }

  public function validate($data) 
  {
    if(trim($data[$this->question]) === '') 
    {
      $this->errors[$this->question] = 'Required';
    } 

    if(trim($data[$this->correct_answer]) === '') 
    {
      $this->errors[$this->correct_answer] = 'Required';
    } 

    foreach($data[$this->incorrect_answers] as $key => $data['incorrect_answer'])
    {
      if(trim($data['incorrect_answer']) === '') 
      {
        $this->errors[$this->incorrect_answers][$key] = 'Required';
      } 
     
    }

    return empty($this->errors);    
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
  }

  public function errors()
  {
    return $this->errors;
  }
}