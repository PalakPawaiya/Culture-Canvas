<?php

namespace App\Models;

use CodeIgniter\Model;

class PptDownloadModel extends Model
{
   protected $table = 'downloadppt';   // 👈 apna table name sahi likho
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'user_id', 'password'];

    // Agar aap custom checkUser() function chahte ho:
    public function User($conditionArray)
    {
        return $this->where($conditionArray)->first(); 
    }
}