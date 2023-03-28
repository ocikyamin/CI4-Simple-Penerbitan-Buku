<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MAnggota;
use App\Models\MBuku;
use App\Models\MPenerbitan;
use App\Models\MPembayaran;

class Anggota extends BaseController
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
        $data = ['title'=> 'Home'];
        return view('Anggota/Home',$data);
    }

    public function Buku()
    {
        $data = ['title'=> 'Buku',
        'buku' => $this->MBuku->MyBook(session('anggota'))
    ];
        return view('Anggota/Buku/index',$data);
    }


    public function EntryBuku()
    {
        $data = ['title'=> 'Buku'];
        return view('Anggota/Buku/EntryBuku',$data);
    }

    public function SimpanBuku()
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
    'link_naskah' => [
    'label'  => 'Link Naskah',
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
    'tahun_terbit' => $this->validate->getError('tahun_terbit'),
    'link_naskah' => $this->validate->getError('link_naskah')
    ]
    ];
    }else{

    $data = [
        'kode_buku' => $this->request->getPost('kode_buku'),
        'judul_buku' => $this->request->getPost('judul_buku'),
        'penulis' => $this->request->getPost('penulis'),
        'jenis_buku' => $this->request->getPost('jenis_buku'),
        'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        'link_naskah' => $this->request->getPost('link_naskah'),
    ];

    $this->MBuku->save($data);

    $msg = ['sukses'=> 200];

    }

    echo json_encode($msg);
    }
    }

  public function Penerbitan()
    {
        $data = ['title'=> 'Penerbitan Buku','penerbitan' => $this->MPenerbitan->MyPenerbitan(session('anggota'))];
        return view('Anggota/Penerbitan/index',$data);
    }
    public function EntryPenerbitan()
    {$data = ['title'=> 'Pengajuan Penerbitan Buku',
    'buku' => $this->MBuku->MyBook(session('anggota'))
];
        return view('Anggota/Penerbitan/entry',$data);
    }


public function GetBukuId(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $msg =['buku'=> $this->MBuku->GetDetailBuku($id)];
            echo json_encode($msg);
        }
    }


    public function SimpanPengajuan()
    {
        if ($this->request->isAJAX()) {
    $this->validate= \Config\Services::validation();
    $validate = $this->validate(
    [
    'buku_id' => [
    'label'  => 'Kode Buku',
    'rules'  => 'required|is_unique[tb_penerbitan.buku_id]',
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong',
    'is_unique' => '{field} Telah Di Ajukan'
    ]
    ],
    'tgl_pengajuan' => [
    'label'  => 'Tanggal Pengajuan',
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
    'buku_id' => $this->validate->getError('buku_id'),
    'tgl_pengajuan' => $this->validate->getError('tgl_pengajuan')
    ]
    ];
    }else{

    $data = [
        'user_id' => $this->request->getPost('user_id'),
        'buku_id' => $this->request->getPost('buku_id'),
        'kode_pengajuan' => $this->request->getPost('kode_pengajuan'),
        'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan')
    ];

    $this->MPenerbitan->save($data);

    $msg = ['sukses'=> 200];

    }


    echo json_encode($msg);
    }
    }


    public function Pembayaran()
    {
        $data = ['title'=> 'Buku',
        'tagihan' => $this->MPenerbitan->MyPenerbitan(session('anggota'))
    ];
        return view('Anggota/Pembayaran/index',$data);
    }

public function UploadPembayaran(){
if ($this->request->isAJAX()) {
$id = $this->request->getVar('id');
$data = ['id'=> $id];
$msg = ['view'=> view('Anggota/Pembayaran/UploadPembayaran',$data)];
echo json_encode($msg);  
}
}

public function ConfirmPembayaran(){
$id = $this->request->getPost('id_pengajuan');
$files         = $this->request->getFile('bukti');
$file_ext      = $files->getExtension();
$newName       = $files->getRandomName();
$set_file_name = $newName;  
$path = ROOTPATH.'/files/'; 
// pindahkan file pada folder 
$files->move($path, $set_file_name);
$data=[
'id_pengajuan'   =>$id,
'norek'        =>$this->request->getPost('norek'), 
'bank'         =>$this->request->getPost('bank'), 
'nm_penyetor'  =>$this->request->getPost('nm_penyetor'),
'wkt_bayar'    =>$this->request->getPost('wkt_bayar'),
'jml_transfer' =>$this->request->getPost('jml_transfer'), 
'bukti'        =>$set_file_name

];

$statur_bayar = [
'id'=> $id,
'is_payment'=> 2
];
$this->MPembayaran->save($data);
$this->MPenerbitan->save($statur_bayar);
return redirect('anggota/pembayaran')->with('sukses', 'Bukti Pembayaran Berhasil Diupload.');


}





function Logout()
{
session()->remove('anggota');
return redirect()->to(base_url('/login'));
    
}
}
