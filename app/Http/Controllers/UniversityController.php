<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use Carbon\Carbon;
use Session;
use Auth;

class UniversityController extends Controller{
    public function index(){
        $university = University::where('university_status',1)->orderBy('university_id','DESC')->get();
        return view('admin.university.all',compact('university'));
    }
    

    public function add(){
        return view('admin.university.add');
    }

    public function view($slug){
        $university = University::where('university_status',1)->where('university_slug',$slug)->firstOrFail();
        return view('admin.university.view',compact('university'));
    }

    public function edit($slug){
        $university = University::where('university_status',1)->where('university_slug',$slug)->first();
        return view('admin.university.edit',compact('university'));
    }

    public function insert(Request $request){

        $slug = 'C'.uniqid(20);

        $insert = University::insert([
            'country_id' => $request['country'],
            
            'university_url' => $request['university_url'],
            'university_order' => $request['university_order'],
            'university_logo' => $request['university_logo'],
            'university_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($insert){
            Session::flash('success',' Successfully add your university information');
            return redirect('/dashboard/university');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/university/add');
        }
    }   

    public function update(Request $request){

        $id = $request['university_id'];
        $slug = 'S'.uniqid(20);

        $update = University::where('university_status',1)->where('university_id',$id)->update([
            'country_id' => $request['country'],
            'university_url' => $request['university_url'],
            'university_order' => $request['university_order'],
            'university_logo' => $request['university_logo'],
            'university_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($update){
            Session::flash('success',' Successfully add your university information');
            return redirect('/dashboard/university');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/university/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = University::where('university_status',1)->where('university_id',$id)->update([
            'university_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your university information');
            return redirect('/dashboard/university');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/university');
        }
    }
}
