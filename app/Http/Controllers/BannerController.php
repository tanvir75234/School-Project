<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Banner;
use Carbon\Carbon;
use Session;
use Auth;


class BannerController extends Controller
{
    public function index(){
        $banner = Banner::where('banner_status',1)->orderBy('banner_id','DESC')->get();      
        return view('admin.banner.all',compact('banner'));
    }

    public function add(){
        return view('admin.banner.add');
    }

    public function view($slug){
        $banner = Banner::where('banner_status',1)->where('banner_slug',$slug)->firstOrFail();
        return view('admin.banner.view',compact('banner'));
    }

    public function edit($slug){
        $banner = Banner::where('banner_status',1)->where('banner_slug',$slug)->first();
        return view('admin.banner.edit',compact('banner'));
    }

    public function insert(Request $request){
        $request->validate([
            'banner_title' => 'required',
            'banner_subtitle' => 'required',
        ],[
            'banner_title.required' => 'Please enter your banner title',
            'banner_subtitle.required' => 'Please enter your banner subtitle',
        ]);

        $slug = 'B'.uniqid(20); 

        $banner_id = Banner::insertGetId([
            'banner_title' => $request['banner_title'],
            'banner_images' => $request['images'],
            'banner_subtitle' => $request['banner_subtitle'],
            'banner_button' => $request['banner_button'],
            'banner_slug' => $slug,    
            'created_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),  
            'updated_at' =>Carbon::now('asia/dhaka')->toDateTimeString(),    
        ]);

     
        if($request->hasfile('images')){
            $manager = new ImageManager(new Driver());
            $logo = $request->file('images');
            $logoName = 'images'.time().'.'.$logo->getClientOriginalExtension(); 
            $logo = $manager->read($logo);
            $logo = $logo->resize(300,300);
            $logo->save('contents/uploads/banner/'.$logoName);
            
            Banner::where('banner_id', $banner_id)->update([
                      'banner_images' => $logoName,
        
                    ]);

        }
   

        if($banner_id){
            Session::flash('success',' Successfully add your banner information');
            return redirect('/dashboard/banner');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/banner/add/'.$slug);
        }
    }   

    public function update(Request $request){
        $request->validate([
            'banner_title' => 'required',
            'banner_subtitle' => 'required',
        ],[
            'banner_title.required' => 'Please enter your banner title',
            'banner_subtitle.required' => 'Please enter your banner subtitle',
        ]);
        
        $id = $request['banner_id'];
        $slug = 'B'.uniqid(20);


        $update = Banner::where('banner_status',1)->where('banner_id',$id)->update([
            'banner_title' => $request['banner_title'],
            'banner_subtitle' => $request['banner_subtitle'],
            'banner_button' => $request['banner_button'],
            'banner_images' => $request['banner_images'],
            'banner_slug' => $slug,

            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);
        
        if($update){
            Session::flash('success',' Successfully updated your banner information');
            return redirect('/dashboard/banner');
        }else{
            Session::flash('error','Opps! Operation Failed');
            return redirect('/dashboard/banner/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Banner::where('banner_status',1)->where('banner_id',$id)->update([
            'banner_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success', 'Successfully delete your banner information');
            return redirect('/dashboard/banner');
        }else{
            Session::flash('error', 'Please try again');
            return redirect('/dashboard/banner');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
