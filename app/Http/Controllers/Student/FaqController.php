<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\FaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    protected $model;

    public function __construct(Faq $model) {
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
        return view('student.faqs.index', [
            'faqs' => $this->model->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.faqs.form', [
            'faq' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $data = $request->validated();
        $this->model->create($data);
        toast(__('lang.added_successfully'), 'success');
        return redirect()->route('student.faqs.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('student.faqs.form', [
            'faq' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $data = $request->validated();
        $faq->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('student.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('student.faqs.index');
    }
}
