<?php

namespace App\Models;

use CodeIgniter\Model;

class MPenerbitan extends Model
{
    protected $table            = 'tb_penerbitan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    public function MyPenerbitan($id)
    {
    return $this->db->table('tb_penerbitan')
    ->select('tb_penerbitan.*, tb_buku.kode_buku,tb_buku.judul_buku')
    ->join('tb_buku','tb_penerbitan.buku_id=tb_buku.id')
    ->where('user_id',$id)->get()->getResultArray();
    }


    public function MyTagihan($id){
    return $this->db->table('tb_penerbitan')
    ->join('tb_buku','tb_penerbitan.buku_id=tb_buku.id')
    ->where('user_id',$id)
    ->where('is_payment',NULL)
    ->get()->getResultArray();
    }

    public function ListPengajuanBaru(){
    return $this->db->table('tb_penerbitan')
    ->select('tb_penerbitan.*, tb_buku.judul_buku,tb_anggota.nama')
    ->join('tb_buku','tb_penerbitan.buku_id=tb_buku.id')
    ->join('tb_anggota','tb_penerbitan.user_id=tb_anggota.id')
    ->where('tb_penerbitan.status',NULL)
    ->get()->getResultArray();
    }

    public function ListPengajuan(){
        return $this->db->table('tb_penerbitan')
        ->select('tb_penerbitan.*, tb_buku.judul_buku,tb_anggota.nama')
        ->join('tb_buku','tb_penerbitan.buku_id=tb_buku.id')
        ->join('tb_anggota','tb_penerbitan.user_id=tb_anggota.id')
        
        ->where('tb_penerbitan.status !=',NULL)
        ->get()->getResultArray();
        }



        public function DetailPengajuanId($id){
            return $this->db->table('tb_penerbitan')
            ->select('tb_penerbitan.*,
            tb_buku.id as bukuid,
             tb_buku.kode_buku,
             tb_buku.judul_buku,
             tb_buku.link_naskah,
             tb_buku.tahun_terbit,
             tb_buku.is_publis,
             tb_buku.cover,
             tb_jenis_buku.jenis,
             tb_anggota.nik,
             tb_anggota.nama,
             tb_anggota.tmp_lahir,
             tb_anggota.tgl_lahir,
             tb_anggota.jk,
             tb_anggota.alamat,
             tb_anggota.email')
            ->join('tb_buku','tb_penerbitan.buku_id=tb_buku.id')
            ->join('tb_jenis_buku','tb_buku.jenis_buku=tb_jenis_buku.id')
            ->join('tb_anggota','tb_penerbitan.user_id=tb_anggota.id')
            ->where('tb_penerbitan.id',$id)
            ->get()->getRowArray();
            }
    

    
}
