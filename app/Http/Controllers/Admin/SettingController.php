<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }


    public function index(){

        return view('admin.settings.index',[
            'settings'=> $this->model->get(),
        ]);
    }

    public function saveSettings(Request $request)
    {
        try{
            $inputs = $request->except('_token');
            $settings =$this->model->get();
            // Check if there is logo to update
            if($request->file('logo'))
            {
                $setting = $settings->where('key','logo')->first();
                $path = optional($setting)->value? public_path(optional($setting)->value) : null;
                $inputs['logo'] = uploadImage($request->file('logo') , config('paths.SETTINGS_PATH'), $path ?? null);
            }
            // Check if there is logo_white to update
            $this->model->setMany($inputs);
            toast(__('lang.stored'),'success','top-right')->hideCloseButton();
            return back();
        }catch(Exception $e)
        {
            alert()->error('',$e->getMessage());
            return back();
        }
    }
}
