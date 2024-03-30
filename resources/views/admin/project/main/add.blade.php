@extends('layouts.master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="{{ url('/dashboard/project/submit') }}" method="post" >
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Project
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.html" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
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
                                        <label class="col-sm-3 col-form-label col_form_label">Projec Titlet<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="project_title">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Project Url:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="project_url">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Remarks:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="project_remarks">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Category:</label>
                                        <div class="col-sm-7">
                                            @php
                                              $allCate=App\Models\ProjectCategory::where('procate_status',1)->orderBy('procate_name','ASC')->get();
                                            @endphp
                                            <select class="form-control" name="category">
                                              <option value="">choose category</option>
                                              @foreach($allCate as $cate)
                                              <option value="{{$cate->procate_id}}">{{$cate->procate_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>                                          
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Order<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="number" class="form-control form_control" id="" name="project_order" min='1' max="5">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Image<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="file" class="form-control form_control" id="" name="project_image">
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