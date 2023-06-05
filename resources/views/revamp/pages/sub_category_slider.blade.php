<style>

    .CategorySlider {
        margin-left: 20px;
        margin-right: 20px;
    }

    .sub-cat-card {
        background-color: white;
        padding: 0px;
        border-radius: 0px;
        transition: background-color 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        border: none;
        margin-top: 12px;
        margin-bottom: 12px;
        /* Adjust the height as needed */
    }
    .sub-cat-card:hover {
        box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2) !important;
        transition: all 0.3s !important;
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
    font-size: 10px;
    padding: 10px 0px;
    text-transform: uppercase;
}
    .card-content {
        text-align: center;
        flex: 1;
        justify-content: center;
    }

    .card-content span {
        display: block;
        margin-top: 0px;
    }
    span.text {
    font-size: 10px;
    color: black;
    padding: 10px 0px;
    }
    .owl-stage-outer{
        margin-top: 0px;
    }
    .owl-carousel .owl-item img {
    display: block;
    width: 65%;
    margin: 15px 30px 17px;
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
 
    button.owl-next{
        margin-right: 25px !important;
    }
    .CategorySlider .custom-width {
        /* width: 171px;  */
        width: 144px;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-dots {
    display: none;
    }

    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
    color: #aba59a;
    margin-left: -40px;
    background: #f3f3f3;
}
/* 
.SUBLinks {
    left: 6% !important; 
    padding: 5px !important;
}
.SUBLinks ul.menu-carousel li {
    width: 19%;
    margin: 1.5px 0px;
    margin-left: 2px;
} */

.owl-carousel .owl-nav button.owl-next {
    right: -40px;
    /* transform: translate(100%, -50%); */
}
.owl-carousel .owl-nav button.owl-prev:hover, .owl-carousel .owl-nav button.owl-next:hover {
    background: #aba59a;
    color: white;
    margin-left: -40px;
}
.owl-carousel .owl-stage-outer {
    background: none;
}
@media (min-width: 992px) {
    .owl-carousel {
        max-width: 1095px; /* Adjust the value as per your preference */
        margin: 0 auto; /* Center the carousel horizontally */
    }
}
    @media only screen and (max-width: 320px) {
    .CategorySlider .custom-width {
        width: 140px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    display: none;
    }
}

@media only screen and (min-width: 321px) and (max-width: 375px) {
    .CategorySlider .custom-width {
        width: 170px;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    display: none;
    }
}

@media only screen and (min-width: 376px) and (max-width: 424px) {
    .CategorySlider .custom-width {
        width: 170px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    display: none;
    }
}
@media only screen and (min-width: 425px) and (max-width: 520px) {
    .CategorySlider .custom-width {
        width: 135px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    display: none;
    }   
}
@media only screen and (min-width: 522px) and (max-width: 640px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    display: none;
    }
}
@media only screen and (min-width: 522px) and (max-width: 766px) {
    .CategorySlider .custom-width {
        width: 120px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -12px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: -16px;
    }
}
@media only screen and (width: 767px) {
    .CategorySlider .custom-width {
        width: 120px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
}
@media only screen and (width: 768px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: 0px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: 15px;
    }
}
@media only screen and (min-width: 769px) and  (max-width: 825px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -2px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: 16px;
    }
}
@media only screen and (min-width: 826px) and  (max-width: 900px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -15px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: 0px;
    }
}
@media only screen and (min-width: 900px) and  (max-width: 980px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -15px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: 0px;
    }
}
@media only screen and (width: 980px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -30px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: -15px;
    }
}
@media only screen and (min-width: 992px) and  (max-width: 1009px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -1px;
}
.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next {
    width: 25px;
    height: 25px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -4px;
    }
}
@media only screen and (min-width: 1010px) and  (max-width: 1055px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -1px;
}
.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next {
    width: 35px;
    height: 35px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -3px;
    }
}
@media only screen and (min-width: 1055px) and  (max-width: 1090px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -20px;
}
.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next {
    width: 35px;
    height: 35px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -20px;
    }
}
@media only screen and (width: 1200px) {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav 
    button.owl-prev, .owl-carousel button.owl-dot {
    margin-left: -10px;
    }
    .owl-carousel .owl-nav button.owl-next {
    right: 0px;
    }
}
@media only screen and (min-width: 1201px) and  (max-width: 1240px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -20px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -4px;
    }
}
@media only screen and (min-width: 1240px) and  (max-width: 1300px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -20px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -4px;
    }
}
@media only screen and (min-width: 1301px) and  (max-width: 1310px)  {
    .owl-carousel .owl-nav button.owl-next, .owl-carousel
     .owl-nav button.owl-prev, .owl-carousel button.owl-dot {    
        margin-left: -20px;
}
    .owl-carousel .owl-nav button.owl-next {
    right: -4px;
    }
}
@media only screen and (min-width: 991px) {
    .CategorySlider .custom-width {
        width: 143px !important;
        border: solid 1px #8080801a;
        height: 120px;
    }
}
    @media only screen and (min-width: 992px) and  (max-width: 1199px) {
    .CategorySlider .custom-width {
    width: 125px !important;
    border: solid 1px #8080801a;
    height: 120px;
}
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
                            <div class="col-lg-12 CategorySlider owl-carousel mt-3 mb-3">
                                @foreach($subcategories as $cat)
                                <a href="{{url('revamp/sub-category/'.$cat->cat_slug)}}" class="card sub-cat-card custom-width">
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
    });
</script>
