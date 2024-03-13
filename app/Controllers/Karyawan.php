<?php

namespace App\Controllers;

class Karyawan extends BaseController
{
    public function index(): string
    {
        return view('karyawan');
    }
}
