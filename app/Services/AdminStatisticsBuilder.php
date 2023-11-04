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

class AdminStatisticsBuilder
{
    private array $data = [];

    public function withCoursesCount()
    {
        $this->data['coursesCount'] = Course::count();
        return $this;
    }

    public function withLecturesCount() {
        $this->data['lecturesCount'] = Lecture::count();
        return $this;
    }

    public function withLessonsCount() {
        $this->data['lessonsCount'] = Lesson::count();
        return $this;
    }

    public function withStudentsCount() {
        $this->data['studentsCount'] = User::count();
        return $this;
    }

    public function withLevelsCount() {
        $this->data['levelsCount'] = Level::count();
        return $this;
    }

    public function withCitiesCount() {
        $this->data['citiesCount'] = City::count();
        return $this;
    }

    public function withFaqsCount() {
        $this->data['faqsCount'] = Faq::count();
        return $this;
    }

    public function withAdminsCount() {
        $this->data['adminsCount'] = Admin::count();
        return $this;
    }

    public function withWithdrawRequestsCount() {
        $this->data['withdrawRequestsCount'] = WithdrawRequest::count();
        return $this;
    }

    public function builder()
    {
        return $this->data;
    }
}
