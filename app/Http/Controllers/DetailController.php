<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\MarkedLocation;

class DetailController extends Controller
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
    public function index($id)
    {
        $location = MarkedLocation::find($id);
        $user = MarkedLocation::find($id)->user;
        // echo '<pre>';
        // print_r($location);
        // print_r($user);
        // echo '</pre>';
        // https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Museum%20of%20Contemporary%20Art%20Australia&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key=YOUR_API_KEY
        
        // return view('detail', ['location'=>$location, 'user'=>$user]);

        $name = 'Aguav';
        return view('emails.urgent', ['location'=>$location, 'user'=>$user, 'name'=>$name]);
    }
}
