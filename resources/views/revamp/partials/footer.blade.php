 <style>
     .sama-footer p,
     .sama-footer a {
         color: #9a9ca7 !important;
         font-size: 15px;
     }

     footer .btn-scroll-top {
         z-index: 9;
         border-radius: 10px;
         width: 3rem;
         height: 3rem;
         transform: rotate(-45deg);
         border: 0;
         /* box-shadow: -2px 2px 3px -1px #333, inset 0 0 1px 1px #333; */
         cursor: pointer;
         position: absolute;
         top: -2rem;
         right: 5rem;
         margin-right: -2rem;
         color: #fff;
         text-shadow: 0 0 5px #333;
         background: #cf1d25;
     }

     footer .btn-scroll-top i {
         transform: rotate(45deg);
     }

     @media screen and (max-width:980px) {
         footer .social_Links {
             display: none;
         }

         footer .sama-quick,
         footer .sama-policy {
             display: none;
         }

         .sama-footer .container:first-child {
             padding-top: 100px;
         }

         .sama-footer h4 {
             text-align: left;
             border-bottom: 1px solid #404040;
             padding-bottom: 10px;
         }

         .sama-footer .FLinks a:before {
             content: '\f061';
             font-family: 'FontAwesome';
             color: #cf1d25;
             padding-right: 3%;
         }

         .sama-footer .FLinks a {
             float: left;
             padding: 3px 0px;
             width: 100%;
             text-align: left;
         }

         .sama-footer .col-lg-3 {
             margin-bottom: 20px;
         }

         .sama-footer .sama-copyright {
             margin-top: 5%;
         }

         .sama-footer p,
         .sama-footer span {
             text-align: left;
         }

         .sama-information {
             align-items: center;
         }

         .sama-footer .sama-copyright p {
             text-align: center;
         }

         footer .iconBox {
             width: 36px;
             height: 36px;
             min-width: 36px;
             min-height: 36px;
         }

         footer .iconBox i {
             font-size: 20px;
         }
     }

     .top-btn {
         background-color: #cf1d25 !important;
         box-shadow: 0px 12px 25px rgb(0 0 0 / 27%) !important;
         all: unset;
         position: fixed;
         left: 20px;
         right: auto;
         bottom: 20px;
         cursor: pointer;
         transform: scale(1.8);
         opacity: 0;
         transition: .3s;
         padding: 3px 3px 3px 7px;
     }

     button.top-btn:before {
         content: "\f062";
         color: #fff;
         font-family: 'FontAwesome';
     }

     @media screen and (max-width:480px) {

         .TBadge strong {
             font-size: 1.5rem;
         }

         .TBadge span:first-child {
             font-size: 1rem;
             margin-bottom: -10px;
         }
     }
 </style>

 <footer class="bgSR bgMap position-relative text-center text-lg-start sama-footer">

     <div class="container position-relative">

         <div class="bg-TColor text-white TBadge py-1 px-4 flex-column text-center ">
             <span class="text-white">Pakistan's</span>
             <strong>No 1</strong>
         </div>
         <div class="row">
             <div class="col-lg-3 sama-quick">
                 <h4>Quick Links</h4>
                 <ul class="FLinks">
                     <li><a href="{{ route('productCategoryWise', 'machines') }}">Machines</a></li>
                     <li><a href="{{ route('productCategoryWise', 'processing-series') }}">Processing Line</a></li>
                     <li><a href="{{ route('productCategoryWise', 'bakery-series') }}">Bakery Series</a></li>
                     <li><a href="{{ route('productCategoryWise', 'pharmaceutical-line') }}">Pharmaceutical Line</a></li>
                     <li><a href="{{ route('productCategoryWise', 'snack-processing') }}">Snack Processing Line</a></li>
                     <li><a href="{{ route('productCategoryWise', 'accessories') }}">Accessories</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 sama-policy">
                 <h4>Policies & Others</h4>
                 <ul class="FLinks">
                     <li><a href="{{ url('blog') }}">Case Study</a></li>
                     <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                     <li><a href="{{ route('aboutUs') }}">About us</a></li>
                     <li><a href="{{ route('contactUs') }}">Contact us</a></li>
                     <li><a href="{{ route('spareParts') }}">Spare Parts</a></li>
                     <li><a href="{{ route('eCatalogue') }}">E-Catalogue</a></li>
                     <li><a href="{{ route('becomeAnAgent') }}">Become a Partner</a></li>
                 </ul>
             </div>
             <div class="col-lg-6">
                 <h4>Contact Details</h4>
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="w-100 d-flex mb-3 sama-information">

                             <span
                                 class="iconBox d-flex justify-content-center align-items-center text-white bg-TColor">
                                 <i class="fa fa-map-marker-alt"></i>
                             </span>

                             <span> <a href="https://goo.gl/maps/CUYX7Km5RiMwbDAX7"
                                     target="_blank">{!! $footer_content->f_address !!}</a></span>
                         </div>
                         <div class="w-100 d-flex mb-3  sama-information align-items-center">
                             <span
                                 class="iconBox d-flex justify-content-center align-items-center text-white bg-TColor">
                                 <i class="far fa-envelope"></i>
                             </span>
                             <span><a
                                     href="mailto:{{ $footer_content->f_email_1 }}">{{ $footer_content->f_email_1 }}</a></span>
                         </div>
                         <!--<div class="w-100 d-flex mb-3 sama-information align-items-center">-->
                         <!--  <span class="iconBox d-flex justify-content-center align-items-center text-white bg-TColor">-->
                         <!--    <i class="far fa-user"></i>-->
                         <!--  </span>-->
                         <!--  <span><a href="mailto:{{ $footer_content->f_email_2 }}">{{ $footer_content->f_email_2 }}</a></span>-->
                         <!--</div>              -->
                     </div>
                     <div class="col-lg-6 ">
                         <div class="w-100 d-flex mb-3 sama-information">
                             <span
                                 class="iconBox d-flex justify-content-center align-items-center text-white bg-TColor">
                                 <i class="fa fa-phone"></i>
                             </span>
                             <span><a
                                     href="tel:{{ $footer_content->f_phone_1 }}">{{ $footer_content->f_phone_1 }}</a>,<a
                                     href="tel:{{ $footer_content->f_phone_2 }}">{{ $footer_content->f_phone_2 }}</a>,<br><a
                                     href="tel:{{ $footer_content->f_phone_3 }}">{{ $footer_content->f_phone_3 }}</a></span>
                         </div>
                         <div class="w-100 d-flex mb-3 sama-information align-items-center">
                             <span
                                 class="iconBox d-flex justify-content-center align-items-center text-white bg-success">
                                 <i class="fa fa-whatsapp"></i>
                             </span>
                             <span><a
                                     href="https://wa.me/{{ str_replace('+', '', $footer_content->f_phone_4) }}">{{ $footer_content->f_phone_4 }}</a></span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <button class="btn-scroll-top" id="scrollToTop"><i class="fa fa-arrow-up transform-45-degree"></i></button>
     <div class="container border-top f-bottom sama-copyright">
         <div class="row">
             <div
                 class="col-lg-12 d-flex justify-content-center justify-content-lg-between align-items-center py-3 flex-column flex-lg-row">
                 <p class="mb-0">© {{ date('Y') }} Sama Engineering Ltd. All rights reserved.</p>
                 <div>
                     <div class="social_Links">
                         <a href="" target="_blank"><i class="fa fa-instagram"></i></a>
                         <a href="https://pk.linkedin.com/company/sama-engineering" target="_blank"><i
                                 class="fa fa-linkedin"></i></a>
                         <a href="https://www.youtube.com/user/SamaEng786" target="_blank"><i
                                 class="fa fa-youtube-play"></i></a>
                         <a href="https://twitter.com/SAMAENGINEERING" target="_blank"><i class="fa fa-twitter"></i></a>
                         <a href="https://www.facebook.com/sama.engineering" target="_blank"><i
                                 class="fa fa-facebook"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>


 <div class="Flyoutbtn Flyoutbtn1">
     <span class="bg-TColor text-white"><i class="fa fa-phone"></i></span>
     <div class="CFrom bg-XLGray shadow py-5 px-3">
         <i class="fa fa-envelope-o text-danger position-absolute"></i>
         <form autocomplete="off">
             @csrf
             <h4>Contact us</h4>
             <p>With the Pakistan's No. 1 packaging machines & processing systems provider.</p>

             <div class="form-floating mb-2">
                 <input type="text" class="form-control" id="cwname" name="name" placeholder="Full Name"
                     required>
                 <label for="name">Name</label>
             </div>
             <div class="form-floating mb-2">
                 <input type="text" class="form-control" id="cwcompany" name="company" placeholder="Company Name"
                     required>
                 <label for="cname">Company</label>
             </div>
             <div class="form-floating mb-2">
                 <input type="email" class="form-control" id="cwemail" name="email" placeholder="abc@domain.com"
                     required>
                 <label for="email">Email</label>
             </div>
             <div class="form-floating mb-2">
                 <input type="text" class="form-control" id="cwphone" name="phone"
                     placeholder="+92 000-0000000" required>
                 <label for="phone">Phone Number</label>
             </div>

             <!-- <div class="input-group mb-2">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}" style="width: desired_width;border-radius: 4px;border-right: 1px solid #d8d8d8;overflow: hidden;"></div>
                                </div> -->
             <div id="RecaptchaField2"></div>
             <p style="color:red;" id="captcha_error" class="captcha_error">
                 @if ($errors->has('captcha'))
                     {{ $errors->first('captcha') }}
                 @endif
             </p>


             <button type="button" class="btn w-100 rounded-0 btn-danger py-2 mt-3"
                 onClick="sendNowWidget($(this))">Send Now</button>
         </form>
     </div>
 </div>
 <div class="Flyoutbtn Flyoutbtn2">
     <span class="bg-BColor text-white"><i class="fa fa-envelope"></i></span>
     <span class="bg-BColor"><a href="mailto:{{ $footer_content->f_email_1 }}"
             class="text-white">{{ $footer_content->f_email_1 }}</a></span>
 </div>
 <div class="Flyoutbtn Flyoutbtn3">
     <span class="bg-success text-white"><i class="fa fa-whatsapp"></i></span>
     <span class="bg-success"><a href="https://wa.me/{{ str_replace('+', '', $footer_content->f_phone_4) }}"
             class="text-white">{{ $footer_content->f_phone_4 }}</a></span>
 </div>


 <script>
     $(".MachineSlider").owlCarousel({
         autoplay: true,
         loop: true,
         margin: 15,
         dots: true,
         nav: false,
         responsiveClass: true,
         responsive: {
             0: {
                 items: 2
             },
             992: {
                 items: 2
             },
             1000: {
                 items: 4
             }
         }
     });
 </script>

<script>
    $(document).ready(function() {
        $(".Flyoutbtn1").on("mouseenter", function() {
            $(this).addClass("active");
        }).on("mouseleave", function() {
            $(this).removeClass("active");
        });
    });
</script>
