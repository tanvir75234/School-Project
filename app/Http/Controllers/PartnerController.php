<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Carbon\Carbon;
use Session;
use Auth;

class PartnerController extends Controller{
    public function index(){
        $partner = partner::where('partner_status',1)->orderBy('partner_id','DESC')->get();
        return view('admin.partner.all',compact('partner'));
    }

    public function add(){
        return view('admin.partner.add');
    }

    public function view($slug){
        $partner = partner::where('partner_status',1)->where('partner_slug',$slug)->firstOrFail();
        return view('admin.partner.view',compact('partner'));
    }

    public function edit($slug){
        $partner = partner::where('partner_status',1)->where('partner_slug',$slug)->first();
        return view('admin.partner.edit',compact('partner'));
    }

    public function insert(Request $request){
        $request->validate([
            'partner_title' => 'required',
            'partner_url' => 'required',
        ],[
            'partner_title.required' => "Please enter your partner title",
            'partner_url.required' => "Please enter your partner url",
        ]);

        $slug = 'P'.uniqid(20);

        $insert = partner::insert([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_logo' => $request['partner_logo'],
            'partner_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($insert){
            Session::flash('success',' Successfully add your partner information');
            return redirect('/dashboard/partner');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/partner/add/'.$slug);
        }
    }   

    public function update(Request $request){
        $request->validate([
            'partner_title' => 'required',
            'partner_url' => 'required',
        ],[
            'partner_title.required' => "Please enter your partner title",
            'partner_url.required' => "Please enter your partner url",
        ]);
        
        $id = $request['partner_id'];
        $slug = 'P'.uniqid(20);

        $update = partner::where('partner_status',1)->where('partner_id',$id)->update([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_logo' => $request['partner_logo'],
            'partner_slug' => $slug,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);
        
        if($update){
            Session::flash('success',' Successfully updated your partner information');
            return redirect('/dashboard/partner');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/partner/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Partner::where('partner_status',1)->where('partner_id',$id)->update([
            'partner_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your partner information');
            return redirect('/dashboard/partner');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/partner');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}

