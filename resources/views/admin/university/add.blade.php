@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/university/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>University
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{ route('university') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All University Information</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                  <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-7">
                                            @if(Session::has('success'))
                                                <div class="alert alert-success alertsuccess">
                                                    <strong>Success! </strong> {{ Session::get('success') }}
                                                </div>
                                            @endif
                                            @if(Session::has('error'))    
                                                <div class="alert alert-danger alerterror">
                                                    <strong>Opps!</strong> {{ Session::get('error') }}
                                                </div>
                                            @endif    
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="form-group row mb-3">
                                      <label class="col-sm-3 col-form-label col_form_label">Country Name:</label>
                                      <div class="col-sm-7">
                                            @php
                                               $allCountry=App\Models\Country::where('country_status',1)->orderBy('country_order','ASC')->get();
                                            @endphp
                                            <select class="form-control" name="country">
                                              <option value="">choose category</option>
                                              @foreach($allCountry as $country)
                                                <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>                                          
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">University Url<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="university_url">
                                        </div>
                                        </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Order:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="university_order">
                                        </div>
                                      </div>      
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">University Logo:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="university_logo">
                                        </div>
                                      </div>      
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">UPLOAD</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>
@endsection