<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonFile;

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

    public function show(Lesson $lesson)
    {
        return view('student.lessons.show', [
            'lesson' => $lesson
        ]);
    }

    /**
     * Download a file.
     * @param int $id The ID of the file to be downloaded.
     */
    public function downloadFile ($id)
    {
        $file = LessonFile::findOrFail($id);
        return response()->download($file->path);
    }

}




