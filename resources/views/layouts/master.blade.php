<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('contents') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('contents') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('contents') }}/css/style.css">
  </head>
  <body>
    <header>
        <div class="container-fluid header_part">
            <div class="row g-0">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3  text-end">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('contents') }}/images/avatar.png" class="img-fluid">
                          Saidul Islam Uzzal
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                      </ul>
                      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>  
    </header>
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img class="" src="{{ asset('contents') }}/images/avatar.png" alt="avatar"/>
                        <h5>Saidul Islam Uzzal</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                            
                            <li><a href="all-user.html"><i class="fas fa-user-circle"></i> Users</a></li>
                            <li><a href="#"><i class="fas fa-user-circle"></i> Manage</a>
                                <ul>
                                    <li><a href="{{route('basic')}}" class="px-5">Basic</a></li>
                                    <li><a href="{{route('social')}}" class="px-5">Social</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('project')}}"><i class="fas fa-user-circle"></i> Project</a>
                                <ul>
                                    <li><a class="px-5" href="{{ route('project')}}">All Projet</a></li>
                                    <li><a class="px-5" href="{{ route('project.add') }}">Add Projet</a></li>
                                    <li><a class="px-5" href="{{ url('dashboard/project/category') }}">Projet Category</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="{{ route('banner') }}"><i class="fas fa-images"></i> Banner</a></li>
                            <li><a href="{{ route('team') }}"><i class="fas fa-images"></i> Team</a></li>
                            <li><a href="{{ route('service') }}"><i class="fas fa-images"></i> Service</a></li>
                            <li><a href="{{ route('partner') }}"><i class="fas fa-images"></i> Partner</a></li>
                            <li><a href="{{ route('client') }}"><i class="fas fa-images"></i> Client</a></li>
                            <li><a href="{{ route('country') }}"><i class="fas fa-images"></i> Study Aboard</a>
                                <ul>
                                    <li><a href="{{ route('country') }}" class="px-5">Country</a></li>
                                    <li><a href="{{ route('university') }}" class="px-5">University</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('testimonial') }}"><i class="fas fa-images"></i> Testimonial</a></li>
                            <li><a href="{{ route('contact.message') }}"><i class="fas fa-comments"></i> Contact Message</a></li>
                            <li><a href="#"><i class="fas fa-globe"></i> Live Site</a></li>
                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>                             
                                </ul>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                      
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2022 | All rights reserved by Dashboard | Development By <a href="#">Creative System Limited.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('contents') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('contents') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('contents') }}/js/custom.js"></script>
  </body>
</html>