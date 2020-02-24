<div class="header-section">
    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
    <div class="menu-right">
        <div class="profile_details" style="height: 64px;">		
            <div class="col-md-4 serch-part">
                <div id="sb-search" class="sb-search">
                    <form action="{{route('search')}}" method="get">
                        <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"> </span>
                    </form>
                </div>
            </div>
            <script src="{{url('web/js/classie.js')}}"></script>
            <script src="{{url('web/js/uisearch.js')}}"></script>
            <script>
                new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <div class="col-md-4 login-pop">
                <div id="loginpop">
                    @if(Auth::check())
                    <a id="loginButton" class=""><span>{{auth('web')->user()->name}} <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
                    {{-- <a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"></a> --}}
                    <div id="loginBox" style="display: none;">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="javascipt:void(0);" data-toggle="modal" data-target="#modalChangePass">{{ trans('messages.change_password_title') }}</a></li>
                            <li class="list-group-item"><a href="{{route('logout')}}">{{ trans('messages.logout_title') }}<i class="fa fa-sign-in"></i></a></li>
                        </ul>
                    </div>
                    
                    @else
                    <a id="" class="" href="{{route('login')}}"><span>{{ trans('messages.login_title') }}<i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
                    @endif
                </div>
                
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@if(auth('web')->check())
@include('web._partial.change_password')
@endif
