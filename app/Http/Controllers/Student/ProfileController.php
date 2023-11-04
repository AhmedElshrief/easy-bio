<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('admin.admins.index', [
            'data' => $this->model->filter($request)->paginate(15)
        ]);
    }

    /**
     * Display the admin's profile.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('student.profile.profile', [
            'resource' => auth()->guard('student')->user()
        ]);
    }

    /**
     * Update the user's profile.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(ProfileRequest $request, User $user)
    {
        $data = $request->except('password', 'image');
        //check if password
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        //check if image
        if ($request->image) {
            $data['image'] = uploadImage($request->image, config('paths.STUDENTS_PATH'), $user->image);
        }

        $user->update($data);

        toast(__('lang.updated_successfully'), 'success');
        return redirect()->back();
    }
}
