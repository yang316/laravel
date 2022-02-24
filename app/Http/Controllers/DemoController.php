<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Demo;
class DemoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request)
    {

        $rule = [ 
            'id' => ['required'],
            'name' => ['required']
        ];
        $msg = [
            'id.required'=>'ID不能为空'
        ];
        try {
            $request->validate([
                'id' => ['required'],
                'name' => ['required'],
                
            ],[
                'id.required'=>'ID不能为空'
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $this->jsonError($th->validator->errors()->first());
        }
        
    }
}
