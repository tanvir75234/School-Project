<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;
use Session;
use Auth;

class ProjectController extends Controller{
    public function index(){
        $project = Project::where('project_status',1)->orderBy('project_id','DESC')->get();
        return view('admin.project.main.all',compact('project'));
    }

    public function add(){
        return view('admin.project.main.add');
    }

    public function view($slug){
        $project = Project::where('project_status',1)->where('project_slug',$slug)->firstOrFail();
        return view('admin.project.main.view',compact('project'));
    }

    public function edit($slug){
        $project = Project::where('project_status',1)->where('project_slug',$slug)->first();
        return view('admin.project.main.edit',compact('project'));
    }

    public function insert(Request $request){

        $slug = 'C'.uniqid(20);

        $insert = Project::insert([
            'project_title' => $request['project_title'],
            'procate_id' => $request['category'],
            'project_url' => $request['project_url'],
            'project_order' => $request['project_order'],
            'project_remarks' => $request['project_remarks'],
            'project_image' => $request['project_image'],
            'project_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
        ]);

        if($insert){
            Session::flash('success',' Successfully add your project information');
            return redirect('/dashboard/project');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/project/add');
        }
    }   

    public function update(Request $request){

        $id = $request['project_id'];
        $slug = 'S'.uniqid(20);

        $update = Project::where('project_status',1)->where('project_id',$id)->update([
            'project_name' => $request['project_name'],
            'project_url' => $request['project_url'],
            'project_order' => $request['project_order'],
            'project_logo' => $request['project_logo'],
            'project_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

        if($update){
            Session::flash('success',' Successfully add your project information');
            return redirect('/dashboard/project');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/project/add');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Project::where('project_status',1)->where('project_id',$id)->update([
            'project_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your project information');
            return redirect('/dashboard/project');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/project');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
