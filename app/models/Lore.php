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

  public function all(int $page = 1, ?int $rowsPerPage = null, ?string $search = null): array
  {
    $rowsPerPage = $rowsPerPage ?? $this->rows_per_page;
    $start = ($page - 1) * $rowsPerPage;

    if ($search !== null && trim($search) !== '') {
        $sql = "SELECT * FROM {$this->table}
                WHERE title LIKE CONCAT('%', ?, '%')
                ORDER BY id DESC";
        $data = $this->db->query($sql, [$search])->get();
    } else {
        $sql = "SELECT * FROM {$this->table}
                ORDER BY id DESC
                LIMIT $start, $rowsPerPage";
        $data = $this->db->query($sql)->get();
    }
    return $data;
  }

  public function find(int $id)
  {
    $sql = "SELECT * FROM {$this->table} 
                     WHERE id = ?"; 

    return $this->db->query($sql, [$id])->findOrFail();
  }

  public function recent(int $limit = 5): array
  {
    $limit = max(1, min(20, (int)$limit));

    $sql = "SELECT title FROM {$this->table}
            ORDER BY id DESC
            LIMIT $limit";

    return $this->db->query($sql)->get();
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

  public function delete(int $id)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = ?";
    return $this->db->query($sql, [$id]);
  }

  public function validate(array $data) 
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

  public function errors(): array
  {
    return $this->errors;
  }

  public function searchByName(string $query): array
  {
      $sql = "SELECT title FROM {$this->table} 
              WHERE title LIKE :q 
              ORDER BY title 
              LIMIT 10";

      return $this->db->query($sql, [
          'q' => '%' . $query . '%'
      ])->get();
  }

  public function forSelect(): array
  {
      $sql = "SELECT id, title FROM {$this->table} ORDER BY title ASC";
      return $this->db->query($sql)->get();
  }

}