<?php

namespace App\Models;

use CodeIgniter\Model;

class MPembayaran extends Model
{
    protected $table            = 'tb_pembayaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    public function GetPembayaran($id)
    {
      return $this->db->table('tb_pembayaran')->where('id_pengajuan',$id)->get()->getResultArray();
    }

    public function PembayaranNull()
    {
      return 
      $this->db->table('tb_pembayaran')
      ->select('tb_pembayaran.*, tb_penerbitan.kode_pengajuan')
      ->join('tb_penerbitan','tb_pembayaran.id_pengajuan=tb_penerbitan.id')
      // ->where('tb_pembayaran.stt_bukti',NULL)
      ->get()
      ->getResultArray();
    }

}
