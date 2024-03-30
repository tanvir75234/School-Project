<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team_member;
use Carbon\Carbon;
use Session;
use Auth;

class Team_MemberController extends Controller{

    public function index(){
        $team = Team_member::where('member_status',1)->orderBy('team_member_id','DESC')->get();
        return view('admin.team_member.all',compact('team'));
    }

    public function add(){
        return view('admin.team_member.add');
    }

    public function view($slug){
        $team = Team_member::where('member_status',1)->where('member_slug',$slug)->firstOrFail();
        return view('admin.team_member.view',compact('team'));
    }

    public function edit($slug){
        $team = Team_member::where('member_status',1)->where('member_slug',$slug)->firstOrFail();
        return view('admin.team_member.edit',compact('team'));
    }

    public function insert(Request $request){
        $request->validate([
            'member_name' => 'required',
            'member_designation' => 'required'
        ],[
            'member_name.required' => "Please enter your member name .",
            'member_designation.required' => "Please enter your member designation .",
        ]);

        $slug = 'TM'.uniqid(20);

        $insert = Team_member::insert([
            'member_name' => $request['member_name'],
            'member_designation' => $request['member_designation'],
            'member_facebook' => $request['member_facebook'],
            'member_twitter' => $request['member_twitter'],
            'member_whatsapp' => $request['member_whatsapp'],
            'member_instagram' => $request['member_instagram'],
            'member_order' => $request['member_order'],
            'member_photo' => $request['member_photo'],
            'member_slug' => $slug,
            'created_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully add your team member information');
            return redirect ('/dashboard/team');
        }else{
            Session::flash('Opps!','Operation failed');
            return redirect ('/dashboard/team');
        }
    }

    public function update(Request $request){
        $request->validate([
            'member_name' => 'required',
            'member_designation' => 'required'
        ],[
            'member_name.required' => "Please enter your member name .",
            'member_designation.required' => "Please enter your member designation .",
        ]);
        
        $id = $request['team_member_id'];
        $slug = 'TM'.uniqid(20);

        $update = Team_member::where('member_status',1)->where('team_member_id',$id)->update([
            'member_name' => $request['member_name'],
            'member_designation' => $request['member_designation'],
            'member_facebook' => $request['member_facebook'],
            'member_twitter' => $request['member_twitter'],
            'member_whatsapp' => $request['member_whatsapp'],
            'member_instagram' => $request['member_instagram'],
            'member_order' => $request['member_order'],
            'member_photo' => $request['member_photo'],
            'member_slug' => $slug,
            'created_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Successfully update your team member information');
            return redirect ('/dashboard/team');
        }else{
            Session::flash('Opps!','Operation failed');
            return redirect ('/dashboard/team');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Team_member::where('member_status',1)->where('team_member_id',$id)->update([
            'member_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully deleted your data');
            return redirect('/dashboard/team');
        }else{
            ession::flash('Opps!','Operation failed');
            return redirect('/dashboard/team');
        }
    }
}
