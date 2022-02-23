<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonSuccess($msg,$data)
    {
        return response()->json(['code' =>200 ,'msg' => $msg,'data'=>$data,'time'=>date('Y-m-d')]);
    }

    public function jsonError($msg)
    {
        return response()->json(['code' =>500 ,'msg' => $msg,'time'=>date('Y-m-d')]);
    }
}
