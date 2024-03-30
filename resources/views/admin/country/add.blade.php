@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/country/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Country
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{ route('country') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Country Information</a>
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
                                      <div class="row mb-3 {{ $errors->has('country_name') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Country Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="country_name">
                                          @if($errors->has('country_name'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('country_name') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('country_title') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Country Title<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="country_title">
                                          @if($errors->has('country_title'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('country_title') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                        </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="country_phone">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Country Subtitle<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="message" class="form-control form_control" id="" name="country_subtitle">
                                        </div>
                                      </div>                                      
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Country Details<span class="req_star">*</span>:</label>
                                          <div class="col-sm-7">
                                            <input type="summernote" class="form-control form_control" id="" name="country_details">
                                          </div>
                                        </div>   
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Country Order<span class="req_star">*</span>:</label>
                                          <div class="col-sm-7">
                                            <input type="number" class="form-control form_control" id="" name="country_order" min="1" max="5">
                                          </div>
                                        </div>                                        
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label"> Country Url<span class="req_star">*</span>:</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control form_control" id="" name="country_url">
                                          </div>
                                        </div>   
                                        <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label"> Country Image<span class="req_star">*</span>:</label>
                                          <div class="col-sm-7">
                                            <input type="file" class="form-control form_control" id="" name="country_image">
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