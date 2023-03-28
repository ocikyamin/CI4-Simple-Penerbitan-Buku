<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MAnggota;
use App\Models\MBuku;
use App\Models\MPenerbitan;
use App\Models\MPembayaran;

class Admin extends BaseController
{
    protected $helpers = ['custom'];
function __construct()
{
$this->MAnggota = new MAnggota;
$this->MBuku = new MBuku;
$this->MPenerbitan = new MPenerbitan;
$this->MPembayaran = new MPembayaran;
}
    public function index()
    {
        $data =['title'=> 'Home'];
         return view('Admin/Home', $data);
    }


    public function Buku()
    {
        $data = ['title'=> 'Daftar Buku', 'buku'=> $this->MBuku->findAll()];
         return view('Admin/Buku/index', $data);
    }

    public function EntryBuku()
    {
        $data = ['title'=> 'Entry Buku'];
        return view('Admin/Buku/Entry', $data);
    }

    // SaveBuku
    public function SaveBuku()
    {
        if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'judul_buku' => [
            'label'  => 'Judul Buku',
            'rules'  => 'required|is_unique[tb_buku.judul_buku]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Telah Terdaftar'
            ]
            ],
            'jenis_buku' => [
            'label'  => 'Jenis Buku',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'tahun_terbit' => [
            'label'  => 'Tahun Terbit',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
     
            ]
            );
        
            if (!$validate) {
            $msg = [
            'error' => [
            'judul_buku' => $this->validate->getError('judul_buku'),
            'jenis_buku' => $this->validate->getError('jenis_buku'),
            'tahun_terbit' => $this->validate->getError('tahun_terbit')
            ]
            ];
            }else{
        
            $data = [
                'kode_buku' => $this->request->getPost('kode_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'penulis' => $this->request->getPost('penulis'),
                'jenis_buku' => $this->request->getPost('jenis_buku'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit')
            ];
        
            $this->MBuku->save($data);
        
            $msg = ['sukses'=> 200];
        
            }
        
            echo json_encode($msg);
            }
    }

    // Penerbitan 
    function PenerbitanBaru(){
        $data = ['title'=> 'Daftar Pengajuan Baru', 'baru'=> $this->MPenerbitan->ListPengajuanBaru()];
         return view('Admin/Penerbitan/Baru', $data);
    }

    // List Penerbitan
    function ListPenerbitan(){
        $data = ['title'=> 'Daftar Penerbitan', 'list'=> $this->MPenerbitan->ListPengajuan()];
         return view('Admin/Penerbitan/List', $data);
    }

    function DetailPengajuan($id){
        $data = ['title'=> 'Detail Pengajuan',
         'data'=> $this->MPenerbitan->DetailPengajuanId($id),
         'pay'=> $this->MPembayaran->GetPembayaran($id)
        ];
        return view('Admin/Penerbitan/Detail', $data);
    }

    function SetPublic(){
        if ($this->request->isAJAX()) {
        $bukuid = $this->request->getVar('id');
        $buku = $this->MBuku->find($bukuid);
        $status = $buku['is_publis'];
        $data = [
            'id'=> $bukuid,
            'is_publis'=> $status==NULL ? 1 : NULL
        ];
        
        $this->MBuku->save($data);
        
        $msg = ['ok'=> 200, 'link' => base_url('admin/buku')];
        
        echo json_encode($msg);  
        }
        }


function SetCover(){
if ($this->request->isAJAX()) {
$bukuid = $this->request->getVar('id');
$data = ['buku'=>$this->MBuku->find($bukuid)];

$msg = ['view'=> view('Admin/Buku/SetCover',$data)];

echo json_encode($msg);  
}
}
function SaveCover(){

    $id = $this->request->getPost('id');
    $files         = $this->request->getFile('cover');
    $file_ext      = $files->getExtension();
    $newName       = $files->getRandomName();
    $set_file_name = $newName;  
    $path = ROOTPATH.'/public/buku/'; 
    // pindahkan file pada folder 
    $files->move($path, $set_file_name);
    $data=[
    'id'   =>$id,
    'cover'=>$set_file_name
    
    ];
    
 
    $this->MBuku->save($data);
    return redirect('admin/buku')->with('sukses', 'Cover Berhasil Diupload.');
    

}


            


        

// function SetPublic(){
// if ($this->request->isAJAX()) {
// $bukuid = $this->request->getVar('bukuid');
// $id_pengajuan = $this->request->getVar('id');
// $buku = $this->MBuku->find($bukuid);
// $status = $buku['is_publis'];
// $data = [
//     'id'=> $bukuid,
//     'is_publis'=> $status==NULL ? 1 : NULL
// ];

// $this->MBuku->save($data);

// $msg = ['ok'=> 200, 'link' => base_url('admin/penerbitan/detail/'.$id_pengajuan)];

// echo json_encode($msg);  
// }
// }


    

    public function LihatPembayaran(){
        if ($this->request->isAJAX()) {
        $id = $this->request->getVar('id');
        $data = [
        'pay'=> $this->MPembayaran->find($id)
       ];
        $msg = ['view'=> view('Admin/Penerbitan/LihatPembayaran',$data)];
        echo json_encode($msg);  
        }
        }

        function KonfirmPembayaran(){
            $status = $this->request->getPost('status');
            $pengajuan_id = $this->request->getPost('id_pengajuan');
            $data = [
            'id'=>$this->request->getPost('id'),
            'stt_bukti'=>$status,
            'ket'=>$this->request->getPost('ket')
            ];
            $this->MPembayaran->save($data);
        
            $pengajuan_data = [
            'id'=>$pengajuan_id,
            'status'=> $status==1 ? 1:3 ,
            'is_payment'=> $status==1 ? 1:3 
            ];
            $this->MPenerbitan->save($pengajuan_data);
            return redirect()->to(base_url('admin/penerbitan/detail/'.$pengajuan_id))->with('sukses', 'Pembayaran Telah Dikonfirmasi.');
        }

        function HapusPembayaran($id){
            $getFile = $this->MPembayaran->find($id);
            $old_file = $getFile['bukti'];
            $id_pengajuan= $getFile['id_pengajuan'];
            $path = ROOTPATH.'/files'; 
            $file_links = isset($old_file) ?  unlink($path.'/'.$old_file) : null;
            $this->MPembayaran->delete($id);
            return redirect()->to(base_url('admin/penerbitan/detail/'.$id_pengajuan))->with('sukses', 'Pembayaran Telah Dihapus.');
        }

        // Pembayaran

        function Pembayaran(){
            $data = ['title'=> 'Daftar Pembayaran', 'list'=> $this->MPembayaran->PembayaranNull()];
             return view('Admin/Pembayaran/List', $data);
        }
// Anggota 
        function Anggota(){
            $data = ['title'=> 'Daftar Anggota', 'list'=> $this->MAnggota->findAll()];
             return view('Admin/Anggota/List', $data);
        }

        // Detail Anggota
        function DetailAnggota($id){
            $data = ['title'=> 'Detail Anggota',
             'data'=> $this->MAnggota->find($id),
             'buku' => $this->MBuku->MyBook($id),
             'penerbitan' => $this->MPenerbitan->MyPenerbitan($id)
            ];
             return view('Admin/Anggota/Detail', $data);
        }
        // PrintAnggota
        function PrintAnggota($id){
            $data = ['title'=> 'Detail Anggota',
             'data'=> $this->MAnggota->find($id),
             'buku' => $this->MBuku->MyBook($id),
             'penerbitan' => $this->MPenerbitan->MyPenerbitan($id)
            ];
             return view('Print/PrintAnggota', $data);
        }


        // Laporan 

        function PrintBuku(){
            $data = ['buku' => $this->MBuku->ListBook()
            ];
             return view('Print/PrintBuku', $data);
        }
        function PrintPenerbitan(){
            $data = ['list'=> $this->MPenerbitan->ListPengajuan()
            ];
             return view('Print/PrintPenerbitan', $data);
        }

        function PrintPembayaran(){
            $data = ['list'=> $this->MPembayaran->PembayaranNull()
            ];
             return view('Print/PrintPembayaran', $data);
        }


        function PrintAnggotas(){
            $data = ['list'=> $this->MAnggota->findAll()
            ];
             return view('Print/PrintAllAnggota', $data);
        }
        

        
      
function Logout()
{
session()->remove('admin');
return redirect()->to(base_url('/login'));
    
}  
    
}
