<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\LessonFile;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $model;

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons = Lesson::getAvailableLessonsForUser();
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('student.lessons.index', [
            'lessons' => $lessons->filter($request)->paginate(15),
            'lectures' => Lecture::get()->pluck('title', 'id'),
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
    public function downloadFile($id)
    {
        $file = LessonFile::findOrFail($id);
        return response()->download($file->path);
    }
}
