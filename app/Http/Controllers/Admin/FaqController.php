<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('admin.faqs.index', [
            'faqs' => $this->model->filter($request)->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.form', [
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
        return redirect()->route('admin.faqs.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', [
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
        return redirect()->route('admin.faqs.index');
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
        return redirect()->route('admin.faqs.index');
    }
}
