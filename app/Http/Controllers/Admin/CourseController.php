<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $model;

    public function __construct(Course $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');

        confirmDelete($title, $text);
        return view('admin.courses.index', [
            'courses' => $this->model->filter($request)->paginate(15),
            'levels' => Level::get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.form', [
            'levels' => Level::get()->pluck('name', 'id'),
            'course' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        $data['image'] = uploadImage($data['image'], config('paths.COURSES_PATH'));
        $this->model->create($data);
        toast(__('lang.added_successfully'), 'success');
        return redirect()->route('admin.courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.form', [
            'levels' => Level::get()->pluck('name', 'id'),
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.COURSES_PATH'), $course->image);
        }
        if (!isset($data['active'])) {
            $data['active'] = 0;
        }
        $course->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        deleteImage($course->image);
        $course->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.courses.index');
    }

    public function changeActive(Request $request) {
        $course = $this->model->findOrFail($request->id);
        $course->active = $request->value;
        $course->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.updated_successfully'),
        ]);
    }

}
