<style>

    .CategorySlider {
        margin-left: 20px;
        margin-right: 20px;
    }

    .sub-cat-card {
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        /* Adjust the height as needed */
    }

    .sub-cat-card:hover {
        background-color: #EC2424;
        color: white;
        border-color: #EC2424;
    }

    .card-content {
        text-align: center;
        flex: 1;
        justify-content: center;
    }

    .card-content span {
        display: block;
        margin-top: 10px;
    }

    .card-content img {
        height: 60px;
        width: auto !important;
        margin-bottom: 10px;
    }

    .text {
        word-wrap: break-word;
    }
</style>
@if($currentCat->menu_mode==1 && count($subcategories) > 0)
<section class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-12 CategorySlider owl-carousel mt-3">
                                @foreach($subcategories as $cat)

                                <a href="{{url('revamp/sub-category/'.$cat->cat_slug)}}" class="card sub-cat-card">
                                    <div class="card-content">
                                        <span><img src="{{url('uploads/'.$cat->cat_icon)}}" /></span>
                                        <span>{{$cat->cat_title}}</span>

                                    </div>
                                </a>
                                @endforeach
                                <!-- Add more items here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif