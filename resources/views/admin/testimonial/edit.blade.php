@extends('layouts.master')
@section('content')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{ url('/dashboard/testimonial/update') }}" method="post" >
                  @csrf
                    <div class="card mb-3">
                      <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>All Testimonial Information
                            </div>  
                            <div class="col-md-4 card_button_part">
                                <a href="{{ route('testimonial') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Testimonial</a>
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
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Client Name<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="id" value="{{ $testimonial->testi_id }}">
                              <input type="text" class="form-control form_control" id="" name="testi_name" value="{{ $testimonial->testi_name }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label"> Designation:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form_control" id="" name="testi_designation" value="{{ $testimonial->testi_designation }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label"> Feedback:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form_control" id="" name="testi_feedback" value="{{ $testimonial->testi_feedback }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label"> Rating:</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control form_control" id="" name="testi_star" min="1" max="5" value="{{ $testimonial->testi_star }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label"> Company:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form_control" id="" name="testi_company" min="1" max="5" value="{{ $testimonial->testi_star }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Order<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form_control" id="" name="testi_order" value="{{ $testimonial->testi_order }}">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Photo<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form_control" id="" name="testi_photo" value="{{ $testimonial->testi_photo }}">
                            </div>
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