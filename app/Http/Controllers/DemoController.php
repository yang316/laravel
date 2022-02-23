<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
class DemoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request)
    {

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
