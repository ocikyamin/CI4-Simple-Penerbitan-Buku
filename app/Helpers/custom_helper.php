<?php
function con()
{
	return $db= \Config\Database::connect(); 
}

// Data Login Anggota 

function Anggota()
{
return $builder = con()->table('tb_anggota')->where('id',session('anggota'))->get()->getRow();
}

function User()
{
return $builder = con()->table('users')
->join('users_level','users.level_id=users_level.id')
->where('users.id',session('admin'))->get()->getRow();
}

// Tabel Master 
function Master($table){
$builder = con()->table($table);
return $query = $builder->get()->getResultArray();
}


function CekStatusBayar($pengajuan)
{
return $builder = con()->table('tb_pembayaran')->where('id_pengajuan',$pengajuan)->get()->getRow();
}

function Counts($table='')
{
return $builder = con()->table($table)->countAllResults();
}

