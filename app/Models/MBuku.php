<?php

namespace App\Models;

use CodeIgniter\Model;

class MBuku extends Model
{

    protected $table            = 'tb_buku';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

public function ListPublis()
{
  return $this->db->table('tb_buku')
  ->join('tb_anggota','tb_buku.penulis=tb_anggota.id')
  ->join('tb_jenis_buku','tb_buku.jenis_buku=tb_jenis_buku.id')
  ->where('tb_buku.is_publis',1)
  ->get()->getResultArray();
}


    public function MyBook($id)
    {
      return $this->db->table('tb_buku')->where('penulis',$id)->get()->getResultArray();
    }


    public function GetDetailBuku($id)
    {
      return $this->db->table('tb_buku')
      ->select('tb_buku.*, tb_anggota.nama ')
      ->join('tb_anggota','tb_buku.penulis=tb_anggota.id')
      ->where('tb_buku.id',$id)->get()->getRowArray();
    }

    public function ListBook()
    {
      return $this->db->table('tb_buku')
      ->join('tb_anggota','tb_buku.penulis=tb_anggota.id')
      ->join('tb_jenis_buku','tb_buku.jenis_buku=tb_jenis_buku.id')
      ->get()->getResultArray();
    }

}
