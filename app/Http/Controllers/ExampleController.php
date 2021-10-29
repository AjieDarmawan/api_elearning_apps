<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

     function index(){
        echo "tes";
        die;
        $tes =  DB::table('piutangbpjsip2j_v')
            //    ->where('status','=',3)
               ->limit(1)
               ->first();
               return $tes;
    }
}
