<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Requests\Admin\LessonRequest;
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
        return view('admin.lessons.index', [
            'lessons' => $this->model->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lessons.form', [
            'lectures' => Lecture::get()->pluck('title', 'id'),
            'lesson' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $data['image'] = uploadImage($data['image'], config('paths.LESSONS_PATH'));
        $this->model->create($data);
        toast(__('lang.added_successfully'), 'success');
        return redirect()->route('admin.lessons.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.form', [
            'lectures' => Lecture::get()->pluck('name', 'id'),
            'lesson' => $lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.LESSONS_PATH'), $lesson->image);
        }
        if (!isset($data['active'])) {
            $data['active'] = 0;
        }
        $lesson->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        deleteImage($lesson->image);
        $lesson->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.lessons.index');
    }

    public function changeActive(Request $request) {
        $lesson = $this->model->findOrFail($request->id);
        $lesson->active = $request->value;
        $lesson->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.updated_successfully'),
        ]);
    }

}
