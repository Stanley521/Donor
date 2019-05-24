<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MarkedLocation;
use Auth;
use Mail;

class AddEventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $value = session()->all();
        return view('addevent', ['users'=>$users, 'value'=>$value]);
    }
    
    protected function PostEvent() {
        $location = new MarkedLocation;
        $location->location = request('location');
        $location->address = request('address');
        $location->latitude = request('latitude');
        $location->longitude = request('longitude');
        $location->event = request('event');
        $location->user_id = Auth::user()->id;
        $location->description = request('description');
        $location->urgent = request('urgent');
        $location->accessible_until = $_REQUEST['accessible'];
        // echo '<pre>';
        // print_r($location);
        // echo '</pre>';
        // $location->save();
        if ( request('urgent') == 1) {
            // $users = User::where('lastDonor')->first();
            // $user = User::where('name','Stanley')->first();
            $users = User::all();
            $this->sendEmailUrgent($users, $location);
        }
        // return redirect()->action('HomeController@index');
    }

    public function sendEmailUrgent( $users, $location)
    {
        $emails = array();
        $names = array();
        foreach ($users as $user) {
            array_push($emails, $user->email);
            array_push($names, $user->name);
        }
        print_r($emails);
        print_r($names);
        $index = 0;
        $name = 'Aguav';
        $email = 'stanley@yahoo.com';
        Mail::send('emails.urgent',['name' => $name, 'email' => $email, 'location' => $location], function($m) use ( $emails) {
            $m->from('hello@app.com', 'Donor Darah');
            $m->to($emails);
            $m->subject('Nearby family need your help now!');
        });
        // Mail::send('emails.urgent', ['user' => $user], function ($m) use ($user) {
        //     $m->from('hello@app.com', 'Your Application');

        //     $m->to($user->email, $user->name)->subject('Nearby family need your help now!');
        // });
    }
}
