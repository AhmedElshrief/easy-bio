<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
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
        return view('admin.students.index', [
            'students' => $this->model->paginate(15)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        return view('admin.students.form', [
            'levels' => Level::get()->pluck('name', 'id'),
            'cities' => City::get()->pluck('name', 'id'),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, User $student)
    {
        $data = $request->validated();
        unset($data['password']);
        if(isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.STUDENTS_PATH'), $student->image);
        }
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $student->password;
        }
        if (!isset($data['status'])) {
            $data['status'] = User::BLOCKED;
        }
        $student->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        deleteImage($student->image);
        $student->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.students.index');
    }

    public function changeStatus(Request $request)
    {
        $student = $this->model->findOrFail($request->id);
        if ($request->value == 1) {
            $student->status = User::ACTIVE;
        } else {
            $student->status = User::BLOCKED;
        }
        $student->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.updated_successfully'),
        ]);
    }
}
