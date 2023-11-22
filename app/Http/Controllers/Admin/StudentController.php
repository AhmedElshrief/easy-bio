<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use App\Models\Wallet;
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
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        $students = $this->model->filter($request);
        confirmDelete($title, $text);
        return view('admin.students.index', [
            'students' => $students->paginate(15)
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

    public function create()
    {
        return view('admin.students.form', [
            'levels' => Level::get()->pluck('name', 'id'),
            'cities' => City::get()->pluck('name', 'id'),
            'student' => $this->model
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
        if (isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.STUDENTS_PATH'), $student->image);
        }
        if ($request->password) {
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

    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        if($request->has('image')) {
            $data['image'] = uploadImage($data['image'], config('paths.STUDENTS_PATH'));
        }
        $student = $this->model->create($data);
        toast(__('lang.created_successfully'), 'success');
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
        $student->status = $request->value;
        $student->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.updated_successfully'),
        ]);
    }

    /**
     * Displays the list of trashed students.
     * @return View The view containing the trashed students list.
     */
    public function trashlist()
    {
        $title = __('lang.delete');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('admin.students.trashlist', [
            'students' => $this->model->onlyTrashed()->paginate(15)
        ]);
    }

    /**
     * Restore a student from the trash.
     * @param int $id The ID of the student to be restored.
     * @return \Illuminate\Http\RedirectResponse Redirects to the trash list page.
     */
    public function restore($id)
    {
        $student = $this->model->onlyTrashed()->findOrFail($id);
        $student->restore();
        toast(__('lang.restored_successfully'), 'success');
        return redirect()->route('admin.students.trashlist');
    }

    /**
     * Deletes a record permanently from the database.
     * @param int $id The ID of the record to be deleted.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the trash list page.
     */
    public function hardDelete($id)
    {
        $student = $this->model->onlyTrashed()->findOrFail($id);
        $student->forceDelete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.students.trashlist');
    }

    /**
     * Deletes students based on the given request.
     * @param Request $request The request object containing the student IDs to delete.
     * @return RedirectResponse The redirect response to the trashlist page.
     */
    public function deleteStudents(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array'
        ]);
        $this->model->whereIn('id', $request->student_ids)->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return back();
    }

    /**
     * Reset the wallets for the specified students.
     * @param Request $request The request object containing the student IDs.
     * @return \Illuminate\Http\RedirectResponse The redirect response to the students index page.
     */
    public function resetWallets(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array'
        ]);
        Wallet::where('model_type', User::class)
            ->whereIn('model_id', $request->student_ids)
            ->update(['value' => 0]);
        toast(__('lang.updated_successfully'), 'success');
        return back();
    }

    /**
     * Updates the status of the students to active based on the provided student IDs.
     * @param Request $request The HTTP request object.
     */
    public function activeStudents(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array'
        ]);
        $this->model->whereIn('id', $request->student_ids)->update(['status' => User::ACTIVE]);
        toast(__('lang.updated_successfully'), 'success');
        return back();
    }

    /**
     * Deactivates students based on the given student IDs.
     * @param Request $request The HTTP request object.
     */
    public function deactiveStudents(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array'
        ]);
        $this->model->whereIn('id', $request->student_ids)->update(['status' => User::BLOCKED]);
        toast(__('lang.updated_successfully'), 'success');
        return back();
    }

    /**
     * Edit a wallet.
     * @param int $wallet_id The ID of the wallet to edit.
     */
    public function editWallet($wallet_id)
    {
        $wallet = Wallet::findOrFail($wallet_id);
        return view('admin.students.edit_wallet_modal', [
            'wallet' => $wallet
        ]);
    }

    /**
     * Updates the wallet with the given ID.
     * @param int $wallet_id The ID of the wallet to update.
     */
    public function updateWallet($wallet_id)
    {
        $wallet = Wallet::findOrFail($wallet_id);

        $data = request()->validate([
            'value' => 'required|numeric|min:0',
        ]);
        $wallet->update([
            'value' => $data['value']
        ]);

        toast(__('lang.updated_successfully'), 'success');
        return back();
    }

}








