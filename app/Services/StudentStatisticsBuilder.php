<?php

namespace App\Services;

use App\Models\Faq;
use App\Models\Lesson;

class StudentStatisticsBuilder
{
    private array $data = [];

    public function withLessonsCount() {
        $this->data['lessonsCount'] = Lesson::count();
        return $this;
    }

    public function withFaqsCount() {
        $this->data['faqsCount'] = Faq::count();
        return $this;
    }

    public function builder()
    {
        return $this->data;
    }
}
