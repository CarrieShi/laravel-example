<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if (!$request->session()->has('laravel_test')) {
            $value = $request->session()->put('laravel_test', 'scl');
        }

        $value = $request->session()->get('laravel_test', 'default');
        echo 'put laravel_test : scl<br>';
        print_r($value);
        echo '<br>';


        $request->session()->forget('laravel_test');
        $value = $request->session()->get('laravel_test', 'default');
        echo 'forget laravel_test : default<br>';
        print_r($value);
        echo '<br>';
    }
}
