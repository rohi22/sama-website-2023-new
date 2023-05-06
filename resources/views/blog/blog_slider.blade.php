 <div class="vc_row wpb_row vc_row-fluid vc_custom_1499884320305">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($) {

                                            if ($.isFunction($.fn.slick)) {
                                                $('.blog-slider-bSMYknh7dJ').slick({

                                                    autoplay: true,
                                                    autoplaySpeed: 6000,

                                                    dots: true,
                                                    arrows: true,
                                                    swipe: true,
                                                    swipeToSlide: true,
                                                    cssEase: 'cubic-bezier(0.445, 0.05, 0.55, 0.95)',
                                                    appendDots: $('.blog-slider-bSMYknh7dJ .blog-slider-dots'),
                                                    fade: false,
                                                    speed: 500,
                                                    slidesToScroll: 0,

                                                    prevArrow: '<div class="slick-prev"><i class="icon icon-arrow-left-circle"></i></div>',
                                                    nextArrow: '<div class="slick-next"><i class="icon icon-arrow-right-circle"></i></div>',

                                                });
                                            }

                                        });
                                    </script>

                                    <div class="blog-slider blog-slider-style5 blog-slider-bSMYknh7dJ">
                                       
                                        @forelse($sliders as $i)
                                        <div class="blog-grid-list">
                                            <!-- Slider Start  -->
                                            <div class="blog-grid-large blog-grid-item1">
                                                <div class="blog-grid-item-container blog-slider-item" style="background-image: url({{asset('uploads/blog/slider/'.$i->s_image1)}});">

                                                    <div class="blog-slider-container">
                                                        <div class="blog-slider-content">

                                                            <div class="blog-slider-content-details">
                                                                <div class="post-categories-container">
                                                                    <div class="post-categories"></div>
                                                                </div>
                                                                <a href="https://gillion.shufflehound.com/personal/2017/01/31/who-else-wants-to-know-the-mystery-behind-web-trends/">
                                                                    <h2 class="post-title"></h2>
                                                                </a>
                                                                <div class="post-meta">

                                                                    <div class="post-meta-content">
                                                                        <span class="post-auhor-date"><span>
                                                                        <a href="https://gillion.shufflehound.com/personal/author/gillionshufflehound/" class="post-author"></a></span>
                                                                        <a href="https://gillion.shufflehound.com/personal/2017/01/31/who-else-wants-to-know-the-mystery-behind-web-trends/" class="post-date">
                                                                                                                      </a>
                                                                        </span>

                                                                        </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="blog-grid-small blog-grid-item2">
                                                <div class="blog-grid-item-container blog-slider-item" style="background-image: url( {{asset('uploads/blog/slider/'.$i->s_image2)}} );">

                                                    <div class="blog-slider-container">
                                                        <div class="blog-slider-content">

                                                            <div class="blog-slider-content-details">
                                                                <div class="post-categories-container">
                                                                    <div class="post-categories"><a href="https://gillion.shufflehound.com/personal/category/guide/"></a></div>
                                                                </div>
                                                                <a href="https://gillion.shufflehound.com/personal/2017/01/31/how-to-navigate-old-school-way-with-maps/">
                                                                    <h2 class="post-title"></h2>
                                                                </a>
                                                                <div class="post-meta">

                                                                    <div class="post-meta-content">
                                                                        <span class="post-auhor-date"><span>
                                                                            <a href="https://gillion.shufflehound.com/personal/author/gillionshufflehound/" class="post-author"><!-- Gillion --></a></span>
                                                                        <a href="https://gillion.shufflehound.com/personal/2017/01/31/how-to-navigate-old-school-way-with-maps/" class="post-date">
                                                                          <!--   2 years ago  -->                                           </a>
                                                                        </span>

                                                                         </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="blog-grid-small blog-grid-item3">
                                                <div class="blog-grid-item-container blog-slider-item" style="background-image: url( {{asset('uploads/blog/slider/'.$i->s_image3)}} );">

                                                    <div class="blog-slider-container">
                                                        <div class="blog-slider-content">

                                                            <div class="blog-slider-content-details">
                                                                <div class="post-categories-container">
                                                                    <div class="post-categories"><!-- Travel --></a></div>
                                                                </div>
                                                                <a href="https://gillion.shufflehound.com/personal/2017/01/31/top-10-most-visited-tourist-places-in-the-world/">
                                                                    <h2 class="post-title"><!-- Top 10 most visited tourist places in the world --></h2>
                                                                </a>
                                                                <div class="post-meta">

                                                                    <div class="post-meta-content">
                                                                        <span class="post-auhor-date">
                                                                            <span>
                                                                            <a href="https://gillion.shufflehound.com/personal/author/gillionshufflehound/" class="post-author"><!-- Gillion --></a></span>
                                                                        <a href="https://gillion.shufflehound.com/personal/2017/01/31/top-10-most-visited-tourist-places-in-the-world/" class="post-date">
                                                                            <!-- 2 years ago            -->                                 </a>
                                                                        </span>

                                                                          </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                          </div>

                                     @empty
                                     @endforelse     
                                        <!-- Slider End  -->
                                        
                                      
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>