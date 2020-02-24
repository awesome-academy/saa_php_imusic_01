<!--body wrapper start-->					
<div class="review-slider">
    <div class="tittle-head">
        <h3 class="tittle">{{ trans('messages.album_title') }}</h3>
        <div class="clearfix"> </div>
    </div>
    <ul id="flexiselDemo1">
        @foreach($hot_albums as $album)
        <li>
            <a href="single.html"><img src="{{$album->image}}" alt=""/></a>
            <div class="slide-title"><h4>{{$album->name}}</h4></div>
            <div class="date-city">
                <h5>{{date('d-m-y', strtotime($album->created_at))}}</h5>
                <div class="buy-tickets">
                    <a href="single.html">READ MORE</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <script type="text/javascript">
        $(window).load(function() {
            
            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,    		
                pauseOnHover: false,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 2
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 3
                    },
                    tablet: { 
                        changePoint:800,
                        visibleItems: 4
                    }
                }
            });
        });
    </script>
    <script type="text/javascript" src="web/js/jquery.flexisel.js"></script>	
</div>
</div>
<div class="clearfix"></div>
