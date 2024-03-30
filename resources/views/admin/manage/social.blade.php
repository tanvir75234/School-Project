@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-12 ">
        <form action="{{ url('/dashboard/manage/social/update') }}" method="post" >
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Social
                    </div>  
                    <div class="col-md-4 card_button_part">
                        <a href="{{ route('basic') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Social</a>
                    </div>  
                </div>
              </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-7">
                      @if(Session::has('success'))
                        <div class="alert alert-success alertsuccess" role="alert">
                           <strong>Success!</strong> {{Session::get('success')}}
                        </div>
                      @endif
                      @if(Session::has('error'))
                        <div class="alert alert-danger alerterror" role="alert">
                           <strong>Opps!</strong> {{Session::get('error')}}
                        </div>
                      @endif
                  </div>
                  <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-facebook fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="facebook" value="{{ $social->sm_facebook }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-twitter fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="twitter" value="{{ $social->sm_twitter }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-linkedin fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="linkedin" value="{{ $social->sm_linkedin }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-instagram fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="instagram" value="{{ $social->sm_instagram }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-youtube fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="youtube" value="{{ $social->sm_youtube }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-pinterest fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="pinterest" value="{{ $social->sm_pinterest }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-flickr fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="flickr" value="{{ $social->sm_flickr }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-vimeo fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="vimeo" value="{{ $social->sm_vimeo }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fab fa-skype fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="skype" value="{{ $social->sm_skype }}">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="input-group">
                      <div class="input-group-text"><i class="fas fa-rss fa-lg"></i></div>
                      <input type="text" class="form-control" id="" name="rss" value="{{ $social->sm_rss }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer card_footer text-center">
                <button type="submit" class="btn btn-md btn-dark">UPDATE</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
