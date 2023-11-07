<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\LoginRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function view()
    {
        return view('student.auth.login');
    }

    /**
     * Login Student
     * @param Login $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request)
    {
        $credentials = $this->credentials($request);
        if (!$credentials) {
            return $this->invalid($request);
        }
        $remember = $request->input('remember') ? true : false;
        if (!auth('student')->attempt($credentials, $remember)) {
            return $this->invalid($request);
        }
        toast(__('lang.login_successfully'), 'success');

        if (request()->session()->get('lecture_id')) {
            return redirect()->route('front.showLecture', request()->session()->get('lecture_id'));
        }

        return redirect()->route('student.home');
    }

    /**
     * Filter Member Credentials
     * @param $request
     * @return array|bool
     */
    private function credentials($request)
    {
        $inputs = $request->validated();

        if (is_numeric($inputs['email'])) {
            return ['phone' => $inputs['email'], 'password' => $inputs['password']];
        } elseif (filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['email'], 'password' => $inputs['password']];
        }
        return false;
    }

    /**
     * Return MSG Error
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function invalid($request)
    {
        alert()->error('', __('lang.email_or_password_error'));
        return back();
    }

    /**
     * Logout Student
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (auth('student')->check()) {
            auth('student')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('student.view_login'));
    }
}
