<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function courses()
    {
        $courses = Course::where('active', 1)->get();
        return view('front.courses.index', compact('courses'));
    }

    public function viewCourse($id)
    {
        $resource = Course::where('active', 1)->where('id', $id)->first();
        return view('front.lectures.index', compact('resource'));
    }

    public function viewLecture($id)
    {
        $resource = Lecture::where('active', 1)->where('id', $id)->first();
        return view('front.lessons.index', compact('resource'));
    }

    public function buyLesson(Request $request)
    {
        if (!$request->lesson_id) {
            toast(__('lang.error'), 'error');
            return redirect()->back();
        }

        $lessonId = $request->lesson_id;
        $lesson = Lesson::find($lessonId);

        if (!auth('student')->user()) {
            Session::put('lecture_id', $lesson->lecture_id);
            return redirect()->route('student.login');
        }
        DB::beginTransaction();
        $resource = UserLessons::create([
            'user_id' => auth('student')->user()->id,
            'lesson_id' => $lessonId,
        ]);

        Session::remove('lecture_id');

        toast(__('lang.lesson_bought_successfully'), 'success');

        // update wallet of the user
        auth('student')->user()->updateWallet(-1 * $lesson->price, $resource, "شراء درس" . $lesson->title);

        DB::commit();
        return redirect()->route('student.lessons.index');
    }
}
