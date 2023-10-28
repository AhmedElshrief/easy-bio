<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\LessonRequest;
use App\Models\Lecture;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $model;

    public function __construct(Lesson $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('student.lessons.index', [
            'lessons' => $this->model->paginate(15)
        ]);
    }

}
