<?php

namespace App\Controllers;

use App\Models\Staff_model;
use CodeIgniter\Controller;

class Staff extends Controller
{
    // public function index()
    // {
    //     $staffModel = new Staff_model();
    //     $data['staffList'] = $staffModel->listing();

    //     return view('staff/index', $data);
    // }
    public function index()
    {
        $staffModel = new Staff_model();
        $data['staffList'] = $staffModel->staffWithCategory();

        return view('staff/index', $data);
    }
}
