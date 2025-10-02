<?php

namespace App\Models;

use App\Model;
use App\Pagination;

class Lore extends Model
{
  use Pagination;

  private string $table = 'lore';
  private array $errors = [];
  private string $title = 'title';
  private string $text = 'text';

  public function all()
  { 
    if(isset($_GET['page']))
    {
      $page = $_GET['page'] - 1;
      $this->start = $page * $this->rows_per_page;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && trim($_POST['search-character']) != '')
    {
      $sql = "SELECT * FROM $this->table 
              WHERE title LIKE CONCAT('%',?,'%') 
              ORDER BY id DESC";

      $data = $this->db->query($sql, [$_POST['search-character']])->get();
    }
    else
    {
      $sql = "SELECT * FROM $this->table 
      ORDER BY id DESC LIMIT $this->start, $this->rows_per_page"; 

      $data = $this->db->query($sql)->get();
    }

    return $data;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM $this->table 
                     WHERE id = ?"; 

    $data = $this->db->query($sql, [$id])->findOrFail();

    return $data;
  }

  public function recentAddedLore()
  {
    $sql = "SELECT title FROM $this->table 
            ORDER BY id DESC LIMIT 5";
    $res = $this->db->query($sql);
    $recentLore = $res->get();

    return $recentLore;
  }

  public function insert($title, $text, $image)
  {
    $tmp = $image['tmp_name'];
    $name = microtime(true) . $image['name'];
    $path = BASE_PATH . "/public/images/lore/" . $name;
  
    move_uploaded_file($tmp, $path);

    $sql = "INSERT INTO $this->table (title, text, image)
                                      VALUES (:title, :text, :image)";
    $this->db->query($sql, [
      'title' => $title,
      'text' => $text,
      'image' => "/images/lore/" . $name
    ]);
  }

  public function update($title, $text, $id)
  {
    $sql = "UPDATE $this->table SET
                          title = :title,
                          text = :text
                          WHERE id = :id";

    $this->db->query($sql, [
      'title' => $title,
      'text' => $text,
      'id' => $id
    ]);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->table WHERE id = ?";
    $this->db->query($sql, [$id]);
  }

  public function validate($data) 
  {
    if(trim($data[$this->title]) === '') 
    {
      $this->errors[$this->title] = 'Required';
    } 

    if(trim($data[$this->text]) === '') 
    {
      $this->errors[$this->text] = 'Required';
    } 

    return empty($this->errors);    
  }

  public function validateImage($image)
  {      
    if(empty($image['tmp_name'])) 
    {
      $this->errors['image'] = 'No File chosen';
    }
    else if(!is_image($image['tmp_name']))
    {
      $this->errors['image'] = 'Invalid format';
    }
    else if($image['size'] > 1000000) 
    {
      $this->errors['image'] = 'Must be 1MB or less';
    }
    else if(!validImageDimensions($image['tmp_name'], 1000, 1500))
    {
      $this->errors['image'] = 'Width must be less than 1000 pixels & height must be less than 1500 pixels';
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