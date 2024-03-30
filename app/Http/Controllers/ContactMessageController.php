<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Session;
use Auth;

class ContactMessageController extends Controller{
    public function index(){
        $contact = ContactMessage::where('cm_status',1)->orderBy('cm_id','DESC')->get();
        return view('admin.contact-message.all',compact('contact'));
    }

    public function add(){
        return view('admin.contact-message.add');
    }

    public function view($slug){
        $contact = ContactMessage::where('cm_status',1)->where('cm_slug',$slug)->firstOrFail();
        return view('admin.contact-message.view',compact('contact'));
    }

    public function edit($slug){
        $contact = ContactMessage::where('cm_status',1)->where('cm_slug',$slug)->firstOrFail();
        return view('admin.contact-message.edit',compact('contact'));
    }

    public function insert(Request $request){
        $request->validate([
            'cm_name' => 'required',
            'cm_phone' => 'required',
            'cm_email' => 'required',
            'cm_subject' => 'required',
        ],[
            'cm_name.required' => "Please enter your name .",
            'cm_phone.required' => "Please enter your phone .",
            'cm_email.required' => "Please enter your email .",
            'cm_subject.required' => "Please enter your subject .",
        ]);
      
        $slug = 'CM'.uniqid(20);

        $insert = ContactMessage::insert([
            'cm_name' => $request['cm_name'],
            'cm_phone' => $request['cm_phone'],
            'cm_email' => $request['cm_email'],
            'cm_subject' => $request['cm_subject'],
            'cm_message' => $request['cm_message'],
            'cm_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($insert){
            Session::flash('success',' Successfully add your client information');
            return redirect('/dashboard/contact/message');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/contact/message/add');
        }
    }   

    public function update(Request $request){
        $request->validate([
            'cm_name' => 'required',
            'cm_phone' => 'required',
            'cm_email' => 'required',
            'cm_subject' => 'required',
        ],[
            'cm_name.required' => "Please enter your name .",
            'cm_phone.required' => "Please enter your phone .",
            'cm_email.required' => "Please enter your email .",
            'cm_subject.required' => "Please enter your subject .",
        ]);
        
        $id = $request['cm_id'];
        $slug = 'CM'.uniqid(20);

        $update = ContactMessage::where('cm_status',1)->where('cm_id',$id)->update([
            'cm_name' => $request['cm_name'],
            'cm_phone' => $request['cm_phone'],
            'cm_email' => $request['cm_email'],
            'cm_subject' => $request['cm_subject'],
            'cm_message' => $request['cm_message'],
            'cm_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($update){
                Session::flash('success',' Successfully add your client information');
                return redirect('/dashboard/contact/message');
            }else{
                Session::flash('error','Opps! Operation Failed');
                return redirect('/dashboard/contact/message/add');
        }
    }
    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = ContactMessage::where('cm_status',1)->where('cm_id',$id)->update([
            'cm_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your client information');
            return redirect('/dashboard/contact/message');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/contact/message');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
