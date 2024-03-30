<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Session;
use Auth;

class ServiceController extends Controller{
    public function index(){
        $service = Service::where('service_status',1)->orderBy('service_id','DESC')->get();
        return view('admin.service.all',compact('service'));
    }

    public function add(){
        return view('admin.service.add');
    }

    public function view($slug){
        $service = Service::where('service_status',1)->where('service_slug',$slug)->firstOrFail();
        return view('admin.service.view',compact('service'));
    }

    public function edit($slug){
        $service = Service::where('service_status',1)->where('service_slug',$slug)->first();
        return view('admin.service.edit',compact('service'));
    }

    public function insert(Request $request){

        $slug = 'S'.uniqid(20);

        $insert = Service::insert([
            'service_title' => $request['service_title'],
            'service_subtitle' => $request['service_subtitle'],
            'service_details' => $request['service_details'],
            'service_order' => $request['service_order'],
            'service_icon' => $request['service_icon'],
            'service_slug' => $slug,
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($insert){
            Session::flash('success',' Successfully add your service information');
            return redirect('/dashboard/service');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/service/add');
        }
    }   

    public function update(Request $request){

        $slug = 'S'.uniqid(20);

        $update = Service::where9('service_status',1)->where('service_slug',$slug)->update([
            'service_title' => $request['service_title'],
            'service_subtitle' => $request['service_subtitle'],
            'service_details' => $request['service_details'],
            'service_order' => $request['service_order'],
            'service_image' => $request['service_image'],
            'partner_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($update){
            Session::flash('success',' Successfully add your service information');
            return redirect('/dashboard/service');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/service/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Service::where('service_status',1)->where('service_id',$id)->update([
            'service_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your service information');
            return redirect('/dashboard/service');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/service');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
