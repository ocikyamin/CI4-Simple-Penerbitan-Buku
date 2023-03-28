<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAnggota;
use App\Models\MUser;
class Auth extends BaseController
{
protected $helpers = ['custom'];
function __construct()
{
$this->MAnggota = new MAnggota;
$this->MUser = new MUser;
}
public function index()
{
return view('Auth/Login');
}

// Form Register Anggota
public function Register()
{
return view('Auth/Register');
}
// Cek Register
public function CekRegister()
{
if ($this->request->isAJAX()) {
$this->validate= \Config\Services::validation();
$validate = $this->validate(
[

'nik' => [
'label'  => 'NIK',
'rules'  => 'required|is_unique[tb_anggota.nik]',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'is_unique' => '{field} Telah Terdaftar'
]
],
'nama' => [
'label'  => 'Nama Lengkap',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'tmp_lahir' => [
'label'  => 'Tempat Lahir',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'tgl_lahir' => [
'label'  => 'Tanggal Lahir',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'jk' => [
'label'  => 'Jenis Kelamin',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'alamat' => [
'label'  => 'Alamat',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],

'email' => [
'label'  => 'Email',
'rules'  => 'required|is_unique[tb_anggota.email]',
'errors' => [
'required' => '{field} Kosong',
'is_unique' => '{field} Telah Terdaftar'
]
],
'new_pass' => [
'label'  => 'Password Baru',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'konf_pass' => [
'label'  => 'Konfirmasi Password',
'rules'  => 'required|matches[new_pass]',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'matches' => '{field} Tidak Cocok'
]
],
]
);

if (!$validate) {
$msg = [
'error' => [
'nik' => $this->validate->getError('nik'),
'nama' => $this->validate->getError('nama'),
'tmp_lahir' => $this->validate->getError('tmp_lahir'),
'tgl_lahir' => $this->validate->getError('tgl_lahir'),
'jk' => $this->validate->getError('jk'),
'alamat' => $this->validate->getError('alamat'),
'email' => $this->validate->getError('email'),
'new_pass' => $this->validate->getError('new_pass'),
'konf_pass' => $this->validate->getError('konf_pass')
]
];
}else{

$data = [
'nik' => $this->request->getPost('nik'),
'nama' => $this->request->getPost('nama'),
'tmp_lahir' => $this->request->getPost('tmp_lahir'),
'tgl_lahir' => $this->request->getPost('tgl_lahir'),
'jk' => $this->request->getPost('jk'),
'alamat' => $this->request->getPost('alamat'),
'email' => $this->request->getPost('email'),
'password' =>password_hash($this->request->getPost('konf_pass'), PASSWORD_BCRYPT)
];

$this->MAnggota->save($data);

$msg = ['sukses'=> 200];

}


echo json_encode($msg);
}

}



// Cek Login 

public function CekLogin()
{
if ($this->request->isAJAX()) {
$this->validate= \Config\Services::validation();
$validate = $this->validate(
[

'email' => [
'label'  => 'Email',
'rules'  => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong'
]
],
'password' => [
'label'  => 'Password',
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
'email' => $this->validate->getError('email'),
'password' => $this->validate->getError('password')
]
];
}else{

$level = $this->request->getPost('level');
$email = $this->request->getPost('email');
$password = $this->request->getPost('password');
// Jika level Anggota 
if ($level==1) {
    $CekEmail = $this->MAnggota->CekEmail($email);
    // Jika email ditemukan
    if ($CekEmail) {
        $CekPassword= password_verify($password, $CekEmail->password);
        // Cek Jika password cocok 
        if ($CekPassword) {
            // Buat Session Login Anggota 
                $new_session = ['anggota' => intval($CekEmail->id)];
                session()->set($new_session);
                $msg = ['sukses'=> 200,'login'=> base_url('anggota')];
        }else{
             $msg = [
        'error' => [
        'password' => 'Password Salah.'
        ]
        ];
        }

    }else{
        $msg = [
        'error' => [
        'email' => 'Email Belum Terdaftar.'
        ]
        ];
    }
}else{
    $CekEmail = $this->MUser->CekEmail($email);
    // Jika email ditemukan
    if ($CekEmail) {
        $CekPassword= password_verify($password, $CekEmail->password);
        // Cek Jika password cocok 
        if ($CekPassword) {
            // Buat Session Login Anggota 
                $new_session = ['admin' => intval($CekEmail->id)];
                session()->set($new_session);
                $msg = ['sukses'=> 200,'login'=> base_url('admin')];
        }else{
             $msg = [
        'error' => [
        'password' => 'Password Salah.'
        ]
        ];
        }

    }else{
        $msg = [
        'error' => [
        'email' => 'Email Belum Terdaftar.'
        ]
        ];
    }

    // jika level admin / pimpinan
}

// $msg = ['level'=> $level];

}


echo json_encode($msg);
}

}
}
