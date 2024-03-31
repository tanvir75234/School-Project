<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;
use Session;
use Auth;

class TestimonialController extends Controller{
    public function index(){
        $testimonial = Testimonial::where('testi_status',1)->orderBy('testi_id','DESC')->get();
        return view('admin.testimonial.all',compact('testimonial'));
    }

    public function add(){
        return view('admin.testimonial.add');
    }

    public function view($slug){
        $testimonial = Testimonial::where('testi_status',1)->where('testi_slug',$slug)->firstOrFail();
        return view('admin.testimonial.view',compact('testimonial'));
    }

    public function edit($slug){
        $testimonial = testimonial::where('testi_status',1)->where('testi_slug',$slug)->first();
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    public function insert(Request $request){

        $slug = 'S'.uniqid(20);
        $creator=Auth::user()->id;

        $insert = Testimonial::insert([
            'testi_name' => $request['testi_name'],
            'testi_designation' => $request['testi_designation'],
            'testi_feedback' => $request['testi_feedback'],
            'testi_star' => $request['testi_star'],
            'testi_order' => $request['testi_order'],
            'testi_company' => $request['testi_company'],
            'testi_slug' => $slug,
            'testi_creator' =>$creator,
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($insert){
            Session::flash('success',' Successfully add your testimonial information');
            return redirect('/dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/testimonial/add');
        }
    }   

    public function update(Request $request){

        $id = $request['id'];
        $slug = 'T'.uniqid(20);
        
        $update = Testimonial::where('testi_status',1)->where('testi_id',$id)->update([
            'testi_name' => $request['testi_name'],
            'testi_designation' => $request['testi_designation'],
            'testi_feedback' => $request['testi_feedback'],
            'testi_star' => $request['testi_star'],
            'testi_order' => $request['testi_order'],
            'testi_company' => $request['testi_company'],
            'testi_slug' => $slug,
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(), 
        ]);

        if($update){
            Session::flash('success',' Successfully update your testimonial information');
            return redirect('/dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/testimonial/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Testimonial::where('testi_status',1)->where('testi_id',$id)->update([
            'testi_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your testimonial information');
            return redirect('/dashboard/testimonial');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/testimonial');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
