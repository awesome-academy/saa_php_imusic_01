<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin/index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php $current_route = Route::getCurrentRoute()->getName(); ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($current_route == 'admin.index') active @endif">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item @if($current_route == 'admin.category.index') active @endif">
        <a class="nav-link" href="{{route('admin.category.index')}}">
            <i class="fas fa-bars"></i>
            <span>{{ trans('messages.category_title') }}</span>
        </a>
    </li>
    <li class="nav-item @if($current_route == 'admin.album.index') active @endif">
        <a class="nav-link" href="{{route('admin.album.index')}}">
            <i class="fas fa-compact-disc"></i>
            <span>{{ trans('messages.album_title') }}</span>
        </a>
    </li>
    <li class="nav-item @if($current_route == 'admin.song.index') active @endif">
        <a class="nav-link" href="{{route('admin.song.index')}}">
            <i class="fas fa-music"></i>
            <span>{{ trans('messages.song_title') }}</span>
        </a>
    </li>
    <li class="nav-item @if($current_route == 'admin.artist.index') active @endif">
        <a class="nav-link" href="{{route('admin.artist.index')}}">
            <i class="fas fa-users"></i>
            <span>{{ trans('messages.artist_title') }}</span>
        </a>
    </li>
    <li class="nav-item @if($current_route == 'admin.lyric.index') active @endif">
        <a class="nav-link" href="{{route('admin.lyric.index')}}">
            <i class="fas fa-align-left"></i>
            <span>{{ trans('messages.lyric_title') }}</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
