<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Carbon\Carbon;
use Session;
use Auth;

class CountryController extends Controller{
    public function index(){
        $country = Country::where('country_status',1)->orderBy('country_id','DESC')->get();
        return view('admin.country.all',compact('country'));
    }

    public function add(){
        return view('admin.country.add');
    }

    public function view($slug){
        $country = Country::where('country_status',1)->where('country_slug',$slug)->firstOrFail();
        return view('admin.country.view',compact('country'));
    }

    public function edit($slug){
        $country = Country::where('country_status',1)->where('country_slug',$slug)->first();
        return view('admin.country.edit',compact('country'));
    }

    public function insert(Request $request){
        $request->validate([
            'country_name' => 'required',
            'country_title' => 'required',
        ],[
            'country_name.required' => "Please enter your country name",
            'country_title.required' => "Please enter your country title",
        ]);

        $slug = 'C'.uniqid(20);

        $insert = Country::insert([
            'country_name' => $request['country_name'],
            'country_title' => $request['country_title'],
            'country_subtitle' => $request['country_subtitle'],
            'country_phone' => $request['country_phone'],
            'country_url' => $request['country_url'],
            'country_order' => $request['country_order'],
            'country_image' => $request['country_image'],
            'country_details' => $request['country_details'],
            'country_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($insert){
            Session::flash('success',' Successfully add your country information');
            return redirect('/dashboard/country');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/country/add');
        }
    }   

    public function update(Request $request){
        $request->validate([
            'country_name' => 'required',
            'country_title' => 'required',
        ],[
            'country_name.required' => "Please enter your country name",
            'country_title.required' => "Please enter your country title",
        ]);

        $id = $request['country_id'];
        $slug = 'S'.uniqid(20);

        $update = Country::where('country_status',1)->where('country_id',$id)->update([
            'country_name' => $request['country_name'],
            'country_title' => $request['country_title'],
            'country_subtitle' => $request['country_subtitle'],
            'country_phone' => $request['country_phone'],
            'country_url' => $request['country_url'],
            'country_order' => $request['country_order'],
            'country_image' => $request['country_image'],
            'country_details' => $request['country_details'],
            'country_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),   
        ]);

        if($update){
            Session::flash('success',' Successfully add your country information');
            return redirect('/dashboard/country');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/country/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Country::where('country_status',1)->where('country_id',$id)->update([
            'country_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your country information');
            return redirect('/dashboard/country');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/country');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
