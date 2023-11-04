<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\City;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\User;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\DB;

class AdminStatisticsBuilder
{
    private array $data = [];

    public function withCoursesCount()
    {
        $this->data['coursesCount'] = Course::count();
        return $this;
    }

    public function withLecturesCount()
    {
        $this->data['lecturesCount'] = Lecture::count();
        return $this;
    }

    public function withLessonsCount()
    {
        $this->data['lessonsCount'] = Lesson::count();
        return $this;
    }

    public function withStudentsCount()
    {
        $this->data['studentsCount'] = User::count();
        return $this;
    }

    public function withLevelsCount()
    {
        $this->data['levelsCount'] = Level::count();
        return $this;
    }

    public function withCitiesCount()
    {
        $this->data['citiesCount'] = City::count();
        return $this;
    }

    public function withFaqsCount()
    {
        $this->data['faqsCount'] = Faq::count();
        return $this;
    }

    public function withAdminsCount()
    {
        $this->data['adminsCount'] = Admin::count();
        return $this;
    }

    public function withWithdrawRequestsCount()
    {
        $this->data['withdrawRequestsCount'] = WithdrawRequest::count();
        return $this;
    }

    public function withSubscriptionsChart()
    {
        $this->data['subscriptionsChart'] = DB::table('user_lessons')
            ->select(DB::raw('MONTH(created_at) as month, COUNT(*) as count'))
            ->groupBy('month')
            ->get();
        return $this;
    }

    // public function withUserLessons()
    // {
    //     $this->data['userLessons'] = DB::table('user_lessons')
    //         ->select('lesson_id')
    //         ->groupBy('lesson_id')
    //         ->select(DB::raw('COUNT(lesson_id) as count, lesson_id'))
    //         ->max('count')
    //         ->get();
    //     return $this;
    // }

    public function withMaxLesson()
    {
        $r = DB::table('user_lessons')
            ->selectRaw('lesson_id, COUNT(*) as count')
            ->groupBy('lesson_id')
            ->orderByDesc('count')
            ->first();

        $this->data['maxLesson'] = Lesson::find($r->lesson_id);
        $this->data['maxLessonCount'] = $r->count;
        return $this;
    }

    


    public function builder()
    {
        return $this->data;
    }
}
