<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Basic;
use App\Models\Social;
use Carbon\Carbon;
use Session;
use Auth;

class ManageController extends Controller{

    public function basic(){
        $basic=Basic::where('basic_status',1)->orderBy('basic_id','DESC')->first();
        return view('admin.manage.basic',compact('basic'));
    }

    public function basic_update(Request $request){
        
          $id = $request['id'];
          $slug='B'.uniqid();
          
          $update=Basic::where('basic_status',1)->where('basic_id',$id)->update([
            'basic_company'=>$request['basic_company'],
            'basic_title'=>$request['basic_title'],
            'basic_logo' => $request['basic_logo'],
            'basic_favicon' => $request['basic_favicon'],
            'basic_flogo' => $request['basic_flogo'],
            
            'basic_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString()
          ]);

          if($request->hasfile('basic_logo')){
            $manager = new ImageManager(new Driver());
            $logo = $request->file('basic_logo');
            $logoName = 'basic_logo'.time().'.'.$logo->getClientOriginalExtension(); 
            $logo = $manager->read($logo);
            $logo = $logo->resize(300,300);
            $logo->save('contents/uploads/basic/logo/'.$logoName);
            
            Basic::where('basic_id', $update)->update([
                      'basic_logo' => $logoName,      
                    ]);

        }

        if($request->hasfile('basic_favicon')){
          $manager = new ImageManager(new Driver());
          $favicon = $request->file('basic_favicon');
          $faviconName = 'basic_favicon'.time().'.'.$favicon->getClientOriginalExtension(); 
          $favicon = $manager->read($favicon);
          $favicon = $favicon->resize(300,300);
          $favicon->save('contents/uploads/basic/favicon/'.$faviconName);
          
          Basic::where('basic_id', $update)->update([
                    'basic_favicon' => $faviconName,
      
                  ]);

      }
          
        if($update){
          Session::flash('success','Successfully update your basic information');
          return redirect('/dashboard/manage/basic');
        }else{
          Session::flash('opps!','Operation failed');
          return back();
        }

    }

    public function social(){
      $social=Social::where('sm_status',1)->where('sm_id',1)->first();
      return view('admin.manage.social',compact('social'));
    }

    public function social_update(Request $request){
      $slug='SM'.uniqid();
      $editor=Auth::user()->id;
      $update=Social::where('sm_status',1)->where('sm_id',1)->update([
        'sm_facebook'=>$request['facebook'],
        'sm_twitter'=>$request['twitter'],
        'sm_linkedin'=>$request['linkedin'],
        'sm_instagram'=>$request['instagram'],
        'sm_youtube'=>$request['youtube'],
        'sm_pinterest'=>$request['pinterest'],
        'sm_flickr'=>$request['flickr'],
        'sm_vimeo'=>$request['vimeo'],
        'sm_skype'=>$request['skype'],
        'sm_rss'=>$request['rss'],
        'sm_editor'=>$editor,
        'sm_slug'=>$slug,
        'updated_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($update){
          Session::flash('success','successfully update social media information.');
          return redirect('dashboard/manage/social');
      }else{
          Session::flash('error','please try again.');
          return redirect('dashboard/manage/social');
      }
    }
}