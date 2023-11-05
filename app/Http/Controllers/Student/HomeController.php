<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\StudentStatisticsBuilder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = (new StudentStatisticsBuilder())
            ->withLessonsCount()
            ->withFaqsCount()
            ->builder();

        $totals = [
            [
                'label' => __('lang.lessons'),
                'image' => 'assets/images/sidebar/lesson.png',
                'count' => $data['lessonsCount'],
            ],
            [
                'label' => __('lang.faqs'),
                'image' => 'assets/images/sidebar/faq.png',
                'count' => $data['faqsCount'],
            ],
        ];

        return view('student.home.index', [
            'totals' => $totals
        ]);
    }
}
