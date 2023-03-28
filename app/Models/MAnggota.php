<?php

namespace App\Models;

use CodeIgniter\Model;

class MAnggota extends Model
{
    protected $table            = 'tb_anggota';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function CekEmail($email)
    {
      return $this->db->table('tb_anggota')->where('email',$email)->get()->getRow();
    }

 
}
