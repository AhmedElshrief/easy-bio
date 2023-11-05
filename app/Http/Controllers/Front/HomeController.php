<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $courses = Course::where('active', 1)->get();
        $data = [
            'courses' => count($courses),
            'students' => User::count(),
            'lectures' => Lecture::count(),
            'lessons' => Lesson::count(),
        ];

        return view('front.home.index', compact('courses', 'data'));
    }

    public function contact()
    {
        return view('front.contact.index');
    }
}
