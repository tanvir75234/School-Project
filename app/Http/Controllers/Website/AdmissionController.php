<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller{
    public function admission(){
        return view('website.admission.admissions');
    }
}
