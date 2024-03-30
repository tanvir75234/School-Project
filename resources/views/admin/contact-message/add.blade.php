@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/contact/message/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Banner
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.html" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Contact Message Information</a>
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
                                      <div class="row mb-3 {{ $errors->has('cm_name') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="cm_name">
                                          @if($errors->has('cm_name'))
                                            <span class='invalid-feedback'>
                                                <strong>{{ $errors->first('cm_name') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('cm_phone') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="cm_phone">
                                          @if($errors->has('cm_phone'))
                                            <span class='invalid-feedback'>
                                                <strong>{{ $errors->first('cm_phone') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('cm_email') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="cm_email">
                                          @if($errors->has('cm_email'))
                                            <span class='invalid-feedback'>
                                                <strong>{{ $errors->first('cm_email') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('cm_subject') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Subject<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="cm_subject">
                                          @if($errors->has('cm_subject'))
                                            <span class='invalid-feedback'>
                                                <strong>{{ $errors->first('cm_subject') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Message<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="cm_message">
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