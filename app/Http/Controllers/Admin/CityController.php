<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $model;

    public function __construct(City $model) {
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
        return view('admin.cities.index', [
            'cities' => $this->model->filter($request)->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.form', [
            'city' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $data = $request->validated();
        $this->model->create($data);
        toast(__('lang.added_successfully'), 'success');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.form', [
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->model->findOrFail($id);
        $city->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.cities.index');
    }
}
