<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLessons;
use App\Models\WithdrawRequest;
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

    public function withdraw()
    {
        return view('front.withdraw.index');
    }

    public function StoreWithdraw(Request $request)
    {
        if (!auth('student')->user()) {
            Session::put('lecture_id', $request->lecture_id);
            return redirect()->route('student.login');
        }

        if (!$request->amount || !$request->hasFile('image')) {
            toast(__('lang.error'), 'error');
            return redirect()->back();
        }

        DB::beginTransaction();
        WithdrawRequest::create([
            'user_id' => auth('student')->user()->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'image' => uploadImage($request->file('image'), config('paths.WITHDRAW_REQUESTS_PATH')),
        ]);

        toast(__('lang.request_sent_successfully'), 'success');
        return back();
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

        if (auth('student')->user()->wallet()->value < $lesson->price) {
            toast(__('lang.your_balance_is_not_enough'), 'error');
            return redirect()->route('front.withdraw');
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
