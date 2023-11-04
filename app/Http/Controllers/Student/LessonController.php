<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

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
        $lessons = auth()->user()->lessons();
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('student.lessons.index', [
            'lessons' => $lessons->paginate(15),
        ]);
    }

}
