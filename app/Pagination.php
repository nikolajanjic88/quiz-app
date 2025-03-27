<?php

namespace App;

trait Pagination 
{
  private int $start = 0;
  private int $rows_per_page = 5;

  public function pages()
  {
    $sql = "SELECT COUNT(*) as total_rows FROM $this->table";
    $records = $this->db->query($sql)->find();
    $total_rows = $records['total_rows'];

    $pages = ceil($total_rows / $this->rows_per_page);

    return $pages;
  }
}