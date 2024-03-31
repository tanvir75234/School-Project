<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Session;
use Auth;

class IndexController extends Controller{

    public function index(){
        return view('website.home.index');
    }

    public function about(){
        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }

    public function news(){
        return view('website.news');
    }

    public function contact_insert(Request $_request){
        $slug = 'CM'.uniqid(20);
        $insert = ContactMessage::insert([
            'cm_name' => $_request['first_name'],
            'cm_last_name' => $_request['last_name'],
            'cm_phone' => $_request['number'],
            'cm_email' => $_request['email'],
            'cm_message' => $_request['message'],
            'cm_slug' => $slug,
            'created_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($insert){
            return back();
        }else{
            return back();
        }
    }
}
