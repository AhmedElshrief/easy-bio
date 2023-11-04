<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminStatisticsBuilder;

class HomeController extends Controller
{
    public function index()
    {
        $data = (new AdminStatisticsBuilder())
            ->withCoursesCount()
            ->withLecturesCount()
            ->withLessonsCount()
            ->withStudentsCount()
            ->withLevelsCount()
            ->withCitiesCount()
            ->withFaqsCount()
            ->withAdminsCount()
            ->withWithdrawRequestsCount()
            ->builder();

        $totals = [
            [
                'label' => __('lang.courses'),
                'image' => 'assets/images/sidebar/course.png',
                'count' => $data['coursesCount'],
               ],
            [
                'label' => __('lang.lectures'),
                'image' => 'assets/images/sidebar/lecture.png',
                'count' => $data['lecturesCount'],
            ],
            [
                'label' => __('lang.lessons'),
                'image' => 'assets/images/sidebar/lesson.png',
                'count' => $data['lessonsCount'],
            ],
            [
                'label' => __('lang.students'),
                'image' => 'assets/images/sidebar/student.png',
                'count' => $data['studentsCount'],
            ],
            // [
            //     'label' => __('lang.levels'),
            //     'image' => 'assets/images/sidebar/level.png',
            //     'count' => $data['levelsCount'],
            // ],
            [
                'label' => __('lang.cities'),
                'image' => 'assets/images/sidebar/city.png',
                'count' => $data['citiesCount'],
            ],
            // [
            //     'label' => __('lang.faqs'),
            //     'image' => 'assets/images/sidebar/faq.png',
            //     'count' => $data['faqsCount'],
            // ],
            [
                'label' => __('lang.admins'),
                'image' => 'assets/images/sidebar/admin.png',
                'count' => $data['adminsCount'],
            ],
            // [
            //     'label' => __('lang.withdraw_requests'),
            //     'image' => 'assets/images/sidebar/withdraw.png',
            //     'count' => $data['withdrawRequestsCount'],
            // ],
        ];

        return view('admin.home.index', [
            'totals' => $totals
        ]);
    }
}
