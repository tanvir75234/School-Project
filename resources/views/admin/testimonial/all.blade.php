@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Testimonial Information
                    </div>  
                    <div class="col-md-4 card_button_part">
                        <a href="{{ route('testimonial.add') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Testimonial</a>
                    </div>  
                </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            @if(Session::has('success'))
                                <div class="alert alert-success alertsuccess">
                                    <strong>Success!</strong>{{ Session::get('success') }}
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
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                    <tr>
                        <th>Client Name</th>
                        <th>Identity</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th>Order</th>
                        <th>Photo</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    @foreach($testimonial as $data) 
                    <tbody>
                    <tr>
                        <td>{{ $data->testi_name }}</td>
                        <td>{{ $data->testi_designation }} </td>
                        <td>{{ $data->testi_star }} </td>
                        <td>{{ $data->testi_feedback }} </td>
                        <td>{{ $data->testi_order }}</td>
                        <td>
                            @if( $data->banner_images!='')
                            <img class="img-thumbnail img40" src="{{asset('uploads/banners/'.$banner->banner_images)}}"/>
                            @else
                            <img class="" src="{{ asset('contents') }}/images/avatar.png/">
                            @endif    
                        </td>
                        <td>
                            <div class="btn-group btn_group_manage" role="group">
                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/dashboard/testimonial/view/'.$data->testi_slug) }}">View</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/dashboard/testimonial/edit/'.$data->testi_slug) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" title="delete" id="softDelete"  data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{ $data->testi_id }}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
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

<!-- SOFTDELETE MODAL START    -->

<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('testimonial.softdelete') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="softDeleteModalLabel"> <i class="fab fa-gg-circle"></i>Confirm Message</h3>
            </div>
            <div class="modal-body modal_card">
                Are want to delete your data ?
                <input type="text" name="modal_id" id="modal_id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger fs-6">Delete</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection