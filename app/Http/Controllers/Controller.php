<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function paginatemodel($model,$limitpage)
    {
        $requestmodel = $model::orderBy('created_at','desc')->paginate($limitpage);
        return request()->json(200,$requestmodel);
    }
}
