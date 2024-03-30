@extends('layouts.master')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>View Partner Information
                      </div>  
                      <div class="col-md-4 card_button_part">
                          <a href="{{ route('partner') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Partner</a>
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
                  <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                          <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                              <td>Partner Title</td>  
                              <td>:</td>  
                              <td>{{ $partner->partner_title }}</td>  
                            </tr>
                            <tr>
                              <td>Partner Url</td>  
                              <td>:</td>  
                              <td>{{ $partner->partner_url }}</td>  
                            </tr>
                            <tr>
                              <td>Photo</td>  
                              <td>:</td>  
                              <td>
                                  <img class="img200" src="images/avatar.jpg" alt=""/>  
                              </td>  
                            </tr>
                          </table>
                      </div>
                      <div class="col-md-2"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="btn-group" role="group" aria-label="Button group">
                    <button type="button" class="btn btn-sm btn-dark">Print</button>
                    <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                    <button type="button" class="btn btn-sm btn-dark">Excel</button>
                  </div>
                </div>  
              </div>
          </div>
      </div>
@endsection