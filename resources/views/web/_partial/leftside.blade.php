<div class="left-side sticky-left-side">
    <div class="logo">
        <h1><a href="{{route('index')}}">Mosai<span>c</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="{{route('index')}}">M </a>
    </div>
    <div class="left-side-inner">
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="active"><a href="{{route('index')}}"><i class="lnr lnr-home"></i><span>{{ trans('messages.menu_home') }}</span></a></li>
            <li class="menu-list"><a href="browse.html"><i class="lnr lnr-indent-increase"></i> <span>{{ trans('messages.menu_categories') }}</span></a>  
                <ul class="sub-menu-list">
                    @foreach ($categories as $category)
                    <li><a href="{{route('category.show', ['category_id' => $category->id])}}">{{$category->name}}   </a> </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('artist.index')}}"><i class="lnr lnr-users"></i> <span>{{ trans('messages.menu_artists') }}</span></a></li>
            <li><a href="{{route('album.index')}}"><i class="lnr lnr-music-note"></i> <span>{{ trans('messages.menu_albums') }}</span></a></li>
            <li class="menu-list"><a href="#"><i class="lnr lnr-heart"></i>  <span>{{ trans('messages.menu_my_favourites') }}</span></a> 
            </li>
        </ul>
    </div>
</div>
