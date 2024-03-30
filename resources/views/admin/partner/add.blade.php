@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/partner/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Partners
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{ route('partner') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Partners</a>
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
                                      <div class="row mb-3 {{ $errors->has('partner_title') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="partner_title">
                                          @if($errors->has('partner_title'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('partner_title') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('partner_url') ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Partner Url:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="partner_url">
                                          @if($errors->has('partner_url'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('partner_url') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Logo<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="file" class="form-control form_control" id="" name="partner_logo">
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