<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;
use Session;
use Auth;

class ClientController extends Controller{
    public function index(){
        $client = Client::where('client_status',1)->orderBy('client_id','DESC')->get();
        return view('admin.client.all',compact('client'));
    }

    public function add(){
        return view('admin.client.add');
    }

    public function view($slug){
        $client = Client::where('client_status',1)->where('client_slug',$slug)->firstOrFail();
        return view('admin.client.view',compact('client'));
    }

    public function edit($slug){
        $client = Client::where('client_status',1)->where('client_slug',$slug)->first();
        return view('admin.client.edit',compact('client'));
    }

    public function insert(Request $request){
        $request->validate([
            'client_name' => 'required',
            'client_url' => 'required',
        ],[
            'client_name.required' => "Please enter your client name .",
            'client_url.required' => "Please enter your client url .",
        ]); 

        $slug = 'C'.uniqid(20);

        $insert = Client::insert([
            'client_name' => $request['client_name'],
            'client_url' => $request['client_url'],
            'client_order' => $request['client_order'],
            'client_logo' => $request['client_logo'],
            'client_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($insert){
            Session::flash('success',' Successfully add your client information');
            return redirect('/dashboard/client');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/client/add');
        }
    }   

    public function update(Request $request){
        $request->validate([
            'client_name' => 'required',
            'client_url' => 'required',
        ],[
            'client_name.required' => "Please enter your client name .",
            'client_url.required' => "Please enter your client url .",
        ]); 

        $id = $request['client_id'];
        $slug = 'S'.uniqid(20);

        $update = Client::where('client_status',1)->where('client_id',$id)->update([
            'client_name' => $request['client_name'],
            'client_url' => $request['client_url'],
            'client_order' => $request['client_order'],
            'client_logo' => $request['client_logo'],
            'client_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($update){
            Session::flash('success',' Successfully add your client information');
            return redirect('/dashboard/client');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/client/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Client::where('client_status',1)->where('client_id',$id)->update([
            'client_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your client information');
            return redirect('/dashboard/client');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/client');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
