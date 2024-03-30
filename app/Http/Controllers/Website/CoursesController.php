<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller{
    public function single_course(){
        return view('website.course.course-single');
    }

    public function courses(){
        return view('website.course.courses');
    }
}
