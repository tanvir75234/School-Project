@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/client/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Client
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{ route('client') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Client</a>
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
                                      <div class="row mb-3 {{ $errors->has('client_name') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Client Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="client_name">
                                          @if($errors->has('client_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('client_name') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('client_url') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Client Url:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="client_url">
                                          @if($errors->has('client_url'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('client_url') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Order<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="summernote" class="form-control form_control" id="" name="client_order">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Logo<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="file" class="form-control form_control" id="" name="client_logo">
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