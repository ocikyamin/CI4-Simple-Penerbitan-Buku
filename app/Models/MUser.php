<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{

    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function CekEmail($email)
    {
      return $this->db->table('users')->where('email',$email)->get()->getRow();
    }
}
