<?php
namespace App\Models;

use App\Model;

class Quote extends Model
{
    private string $table = 'quotes';
    private array $errors = [];
    private string $text = 'text';

    public function getRandomQuote(): array
    {
        $sql = "SELECT q.*, l.title AS lore_title
                FROM {$this->table} q
                JOIN lore l ON q.lore_id = l.id
                ORDER BY RAND()
                LIMIT 1";
        $data = $this->db->query($sql)->findOrFail();

        return $data;
    }

    public function insert(array $data)
    {
        $sql = "INSERT INTO {$this->table} (text, audio, lore_id)
                VALUES (:text, :audio, :lore_id)";

        return $this->db->query($sql, [
            'text'    => $data['text'],
            'audio'   => $data['audio'],
            'lore_id' => $data['lore_id']
        ]); 
    }

    public function uploadAudio(array $audio): string
    {
        $dir = 'quotes/';

        if (!is_dir($dir)) {
            if (!mkdir($dir, 0777, true)) {
                $this->errors['audio'] = 'Failed to create upload directory';
                return '';
            }
        }

        $fileName = uniqid('quote_') . '.mp3';
        $path = $dir . $fileName;

        if (!move_uploaded_file($audio['tmp_name'], $path)) {
            $this->errors['audio'] = 'Failed to upload audio';
            return '';
        }

        return $path;
    }

    public function validate(array $data) 
    {
        if(trim($data[$this->text]) === '') {
            $this->errors[$this->text] = 'Required';
        } 

        if (empty($data['lore_id'])) {
            $this->errors['lore_id'] = 'Required';
        } elseif (!ctype_digit((string)$data['lore_id'])) {
            $this->errors['lore_id'] = 'Invalid value';
        }

        return empty($this->errors);    
    }

    public function validateAudio(array $audio): bool
    {
        if ($audio['error'] === UPLOAD_ERR_NO_FILE) {
            $this->errors['audio'] = 'Audio file is required';
            return false;
        }

        if ($audio['error'] !== UPLOAD_ERR_OK) {
            $this->errors['audio'] = 'Audio upload failed';
            return false;
        }

        $mime = mime_content_type($audio['tmp_name']);
        if ($mime !== 'audio/mpeg') {
            $this->errors['audio'] = 'Invalid audio format (MP3 only)';
            return false;
        }

        $ext = strtolower(pathinfo($audio['name'], PATHINFO_EXTENSION));
        if ($ext !== 'mp3') {
            $this->errors['audio'] = 'File must be .mp3';
            return false;
        }

        if ($audio['size'] > 10 * 1024 * 1024) {
            $this->errors['audio'] = 'Audio must be 10MB or less';
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
    
}
