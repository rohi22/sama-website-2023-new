<style>

    .CategorySlider {
        margin-left: 20px;
        margin-right: 20px;
    }

    .sub-cat-card {
        background-color: white;
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
/* 
    .sub-cat-card:hover {
        background-color: #EC2424;
        color: white;
        border-color: #EC2424;
    } */
    span.text:hover{
    width: 100%;
    text-align: center;
    background-color: #EC2424;
    border-color: #EC2424;
    color: white;
    font-size: 0.75rem;
    padding: 10px 4px;
    text-transform: uppercase;
}
    .card-content {
        text-align: center;
        flex: 1;
        justify-content: center;
    }

    .card-content span {
        display: block;
        margin-top: 25px;
    }

    /* .card-content img {
        height: 85px;
        width: auto !important;
        margin-bottom: 10px;
    } */

    .card-content img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
    .text {
        word-wrap: break-word;
    }
    .owl-carousel {
        max-width: 100%; /* Adjust the value as per your preference */
        margin: 0 auto; /* Center the carousel horizontally */
    }
    @media (min-width: 992px) {
        .owl-carousel {
            max-width: 1200px; /* Adjust the value as per your preference */
            margin: 0 auto; /* Center the carousel horizontally */
        }
    }
    button.owl-next{
        margin-right: 25px !important;
    }
    
</style>
@if($currentCat->menu_mode==1 && count($subcategories) > 0)
<section class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12 CategorySlider owl-carousel mt-3">
                                @foreach($subcategories as $cat)
                                <a href="{{url('revamp/sub-category/'.$cat->cat_slug)}}" class="card sub-cat-card">
                                    <div class="card-content">
                                        <span><img src="{{url('uploads/'.$cat->cat_icon)}}" /></span>
                                        <span class="text">{{$cat->cat_title}}</span>
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


<!-- Include the Owl Carousel library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Owl Carousel
        $(".CategorySlider").owlCarousel({
            items: 3, // Number of items to show at a time
            loop: true, // Enable infinite loop
            margin: 10, // Space between items
            nav: true, // Show navigation arrows
            navText: [
                "<i class='fa fa-chevron-left'></i>", // Previous arrow
                "<i class='fa fa-chevron-right'></i>" // Next arrow
            ],
            responsive: {
                0: {
                    items: 1 // Number of items to show on small screens
                },
                425: {
                    items: 2 // Number of items to show on small screens
                },
                768: {
                    items: 4 // Number of items to show on medium screens
                },
                992: {
                    items: 6 // Number of items to show on large screens
                }
            }
        });
    });
</script>