<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;

class DebugController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        $yyyymmdd = $_REQUEST['accessible'];
        $timestamp = strtotime($yyyymmdd);
        echo Auth::user()->id;
        echo $timestamp. '<br>';
        echo date("Y-m-d H:i:s", $timestamp);
    }
}
