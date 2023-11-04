<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LectureRequest;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    protected $model;

    public function __construct(Lecture $model) {
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
        return view('admin.lectures.index', [
            'lectures' => $this->model->filter($request)->paginate(15),
            'courses' => Course::get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lectures.form', [
            'courses' => Course::get()->pluck('title', 'id'),
            'lecture' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureRequest $request)
    {
        $data = $request->validated();
        $data['image'] = uploadImage($data['image'], config('paths.LECTURES_PATH'));
        $this->model->create($data);
        toast(__('lang.added_successfully'), 'success');
        return redirect()->route('admin.lectures.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('admin.lectures.form', [
            'courses' => Course::get()->pluck('name', 'id'),
            'lecture' => $lecture
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(LectureRequest $request, Lecture $lecture)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.LECTURES_PATH'), $lecture->image);
        }
        if (!isset($data['active'])) {
            $data['active'] = 0;
        }
        $lecture->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.lectures.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        deleteImage($lecture->image);
        $lecture->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.lectures.index');
    }

    public function changeActive(Request $request) {
        $lecture = $this->model->findOrFail($request->id);
        $lecture->active = $request->value;
        $lecture->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.updated_successfully'),
        ]);
    }

}
