
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="text-seperator2 text-seperator2-align-left  vc_custom_1499884293971">
                    <div class="text-seperator2-holder">
                        <div class="text-seperator2-line" style=""></div>
                    </div>
                    <div class="text-seperator2-content">
                    <h3 class="text-seperator2-content-heading size-24px" style=";">
                        Featured Posts
                    </h3>
                    </div>
                    <div class="text-seperator2-holder">
                        <div class="text-seperator2-line" style=""></div>
                    </div>
                </div>

                <div class="blog-posts-fancy-m7Og3NtZKz sh-blog-fancy">

                    <div class="blog-fancy-carousel-disabled blog-style-mini1 columns4 ">
                       <?php $count = 0;?>
                       @forelse($feature_posts as $i)
                        <?php ++$count;?>
                        @if($count > 4)
                        @break;
                        @else
                        <article id="post-45" class="post-item post-45 post type-post status-publish format-standard has-post-thumbnail hentry category-guide tag-maps tag-tips tag-work">
                            <div class="post-container">

                                <div class="post-thumbnail">
                                    <div class="sh-ratio">
                                        <div class="sh-ratio-container">
                                            <div class="sh-ratio-content" style="background-image: url(uploads/blog/post/{{$i->p_image}});"></div>
                                        </div>
                                    </div>

                                    <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-overlay"></a>
                                </div>

                                <div class="post-content-container">
                                    <div class="post-categories-container">
                                        <div class="post-categories">{{$i->cat_title}}</div>
                                    </div>
                                    <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-title">
                                        <h4>{{$i->p_title}}<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="45"><i class="fa fa-bookmark-o"></i></span>					</h4> </a>

                                    <div class="post-meta">

                                        <div class="post-meta-content">
                                            <span class="post-auhor-date">
                            <span>
                                <a href="javascript:;" class="post-author"><!-- Gillion --></a></span>,
                                <a href="javascript:;" class="post-date">
                                    {{$i->created_at}}
                                </a>
                            </span>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endif
                        @empty
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>