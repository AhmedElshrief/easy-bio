<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('student.home.index');
    }
}
