<?php

namespace App\Controllers;
use App\Models\MBuku;

class Home extends BaseController
{
    function __construct()
{

$this->MBuku = new MBuku;
}
    public function index()
    {
        $data = ['buku'=> $this->MBuku->ListPublis()];
        return view('Landing/Layouts', $data);
    }
}
