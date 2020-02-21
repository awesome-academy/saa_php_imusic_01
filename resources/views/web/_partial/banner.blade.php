<div class="banner-section">
    <div class="banner">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
                <li>
                    <div class="banner-img">
                        <img src="web/images/11.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="banner-info">
                        <a class="trend" href="single.html">TRENDING</a>
                        <h3>Let Your Home</h3>
                        <p>Album by <span>Rock star</span></p>
                    </div>
          
                </li>
                <li>
                      <div class="banner-img">
                          <img src="web/images/22.jpg" class="img-responsive" alt="">
                      </div>
                      <div class="banner-info">
                          <a class="trend" href="single.html">TRENDING</a>
                          <h3>Charis Brown feet</h3>
                          <p>Album by <span>Rock star</span></p>
                      </div>
                </li>
                <li>
                      <div class="banner-img">
                          <img src="web/images/22.jpg" class="img-responsive" alt="">
                      </div>
                      <div class="banner-info">
                          <a class="trend" href="single.html">TRENDING</a>
                          <h3>Charis Brown feet</h3>
                          <p>Album by <span>Rock star</span></p>
                      </div>
                </li>
            </ul>
        </div>
        <!--banner-->
        <script src="{{url("web/js/responsiveslides.min.js")}}"></script>
        <script>
            $(function () {
                $("#slider4").responsiveSlides({
                    auto: true,
                    pager:true,
                    nav:true,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>
        <div class="clearfix"> </div>
    </div>
</div>

