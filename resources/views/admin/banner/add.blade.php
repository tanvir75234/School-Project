@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/banner/submit') }}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Banner
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{route('banner')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
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
                                      <div class="row mb-3 {{ $errors->has('banner_title')  ? 'is-invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="banner_title">
                                          @if ($errors->has('banner_title'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('banner_title') }}</strong>
                                              </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3 {{ $errors->has('banner_subtitle') ? 'is invalid' : '' }}">
                                        <label class="col-sm-3 col-form-label col_form_label">Subtitile<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="banner_subtitle">
                                          @if($errors->has('banner_subtitle'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('banner_subtitle') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Button:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="banner_button">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Status:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="banner_status">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                                        <div class="col-sm-7">
                                          <input type="file" class="form-control form_control" id="" name="images">
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