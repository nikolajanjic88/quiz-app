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

  public function insert(array $data)
  {
      $sql = "INSERT INTO {$this->table} (title, text, image)
              VALUES (:title, :text, :image)";

      return $this->db->query($sql, [
          'title' => $data['title'],
          'text'  => $data['text'],
          'image' => $data['image']
      ]);
  }

  public function update(int $id, array $data)
  {
      $sql = "UPDATE {$this->table} SET
                  title = :title,
                  text = :text,
                  image = :image
              WHERE id = :id";

      return $this->db->query($sql, [
          'id'    => $id,
          'title' => $data['title'],
          'text'  => $data['text'],
          'image' => $data['image']
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

  public function validateImage($image, bool $required = false): bool
  {
    if ($image['error'] === UPLOAD_ERR_NO_FILE) {
      if ($required) {
        $this->errors['image'] = 'No file chosen';
        return false;
      }
      return true;
    }

    if ($image['error'] !== UPLOAD_ERR_OK) {
      $this->errors['image'] = 'Upload failed';
      return false;
    }

    $mime = mime_content_type($image['tmp_name']);
    if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'])) {
      $this->errors['image'] = 'Invalid format';
      return false;
    }

    if ($image['size'] > 1000000) {
      $this->errors['image'] = 'Must be 1MB or less';
      return false;
    }

    [$width, $height] = getimagesize($image['tmp_name']);
    if ($width > 1000 || $height > 1500) {
      $this->errors['image'] =
          'Width must be ≤ 1000px & height ≤ 1500px';
      return false;
    }

    return true;
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