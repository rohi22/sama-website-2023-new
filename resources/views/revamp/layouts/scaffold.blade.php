<!doctype html>
<html lang="en">
  <head>
      
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="canonical" href="{{url()->current()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=robots content="index, follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{asset('uploads/logos/'.$logos->favicon_logo)}}">
    <title>@stack('title') Sama Engineering - All Kinds of Industrial Processing & Packaging Machines</title>
    @include('revamp.partials.style')
    @stack('styles')
    @yield('og_page_wise')
    @yield('og_product_wise')
    @yield('twitter')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63941515daff0e1306dbd7d9/1gjt74o8v';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <style>
        .getQuote{
            position:fixed;
            bottom:15%;
            right:10px;
            z-index:999;
            padding:10px 15px;
            border-radius:20px;
            background-color:#cf1d25;
            box-shadow: rgb(0 0 0 / 20%) 0px 4px 12px 0px;
            transition:all 0.3s;
            cursor:pointer;
        }
        .getQuote span{
            color:white;
            font-size:16px;
            font-weight:600;
        }
        .getQuote:hover{
            box-shadow: rgb(0 0 0 / 35%) 0px 8px 18px 0px;
        }
        .getQuoteForm{
             z-index:999;
             display:none;
            position:fixed;
            bottom:20%;
            right:25px;
          
            background-color:white;
            box-shadow: rgb(0 0 0 / 35%) 0px 8px 18px 0px;
            border-radius:20px;
        }
        .getQuoteFormInner{
         padding:0 10px 10px 10px;
            
        }
        .quote-form-input{
            font-size: 1rem;
            padding: .6rem 1rem .6rem 1.5rem;
            margin: 1rem 0;
            border: .1rem solid #afafaf;
            width: 25rem;
            font-weight: 500;
            border: .1rem solid #afafaf;
            width: 25rem;
        }
        .quote-form-btn{
           
             font-size: 1rem;
            font-weight: 500;
            width: 100%;
            cursor: pointer;
            background-color: #cf1d25 !important;
            color: #fff;
            transition: .5s all ease;
            border: 0;
            font-family: 'Source Sans Pro',sans-serif;
            transition: 300ms ease-out;
        }
        .showFrm{
            display:block;
        }
        .quote-form-input:focus{
            transition: .5s all ease;
             transition: 300ms ease-out;
            outline-color:#cf1d25;
        }
        .quoteHeading{
            border-top-right-radius:20px;
            border-top-left-radius:20px;
            background-color: #cf1d25 !important;
            color: #fff;
            padding:8px 6px;
        }
    </style>
  </head>
  <body>
        <div class="getQuote">
            <span>Get a Quote</span>
        </div>
        <div id="openQuoteFrm" class="getQuoteForm animated fadeInDown">
            <div class="quoteHeading">
                <h2 class="text-center font-weight-bold" >Get a Quote</h2>
            </div>
            <form class="getQuoteFormInner" id="quoteForm"> @csrf
            
                {{--
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                --}}
            
                <div class="m-2">
                    <textarea  height="100" width="100" class="quote-form-input" placeholder="Message" name="q_message" id="q-message"></textarea>
                </div>
                <div class="m-2"><input class="quote-form-input" type="email" placeholder="Email" name="q_email" id="q-email"></div>
                <div class="m-2"><input class="quote-form-input" type="text" placeholder="Mob/Whatsapp" name="q_num" id="q-num"></div>
                <div class="m-2"><input class="quote-form-btn btn save-quote" id="openQuotebtn" type="button" value="Send" onClick="quoteForm($(this))"></div>
            </form>
        </div>

    @include('revamp.partials.header')
    @yield('content')
    @include('revamp.partials.footer')
    @include('revamp.partials.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has('success'))
        <script>
            $.notify("{{Session::get('success')}}", "success");
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            $.notify("{{Session::get('error')}}", "error");
        </script>
    @endif
    <script>
        $(document).ready(function(){
            $('.getQuote').click(()=>{
                $('#openQuoteFrm').toggleClass("showFrm")
            })
        });
        function sendNowWidget(elm){
        
            var name = $("#cwname").val();
            var company = $("#cwcompany").val();
            var email = $("#cwemail").val();
            var phone = $("#cwphone").val();
            
            if(name != "" || company != "" || email != "" || phone != ""){
                
                    $("#cwname").val('');
                    $("#cwcompany").val('');
                    $("#cwemail").val('');
                    $("#cwphone").val('');
                    
                    $.ajax({
                        type : "GET",
                        url  : "{{route('contactUsWidget')}}",
                        data : {
                           'name' : name,
                           'company' : company,
                           'phone' : phone,
                           'email' : email,
                        },
                        success : function(res){
                            if(res.success == true){
                                $.notify("Thank You, We'll Contact you","success");
                            }
                            else{
                                $.notify("Something Went Wrong","error");
                            }
                        },
                        error : function(res){
                            $.notify("Something Went Wrong","error");
                        }
                    });
            }
            else{
                 $.notify("All fields are required", "error");
            }
            
            
        }
        
        function quoteForm(elm){
            var message = $("#q-message").val();
            var email = $("#q-email").val();
            var number = $("#q-num").val();
            
            if(message != "" && email != "" && number != ""){
                
                if( !validateEmail(email)) {
                    $.notify('Email address is not valid','error');
                }
                else{
                    $.ajax({
                        type : "POST",
                        url  : "{{url('save-quote')}}",
                        data : {
                            '_token' : "{{csrf_token()}}",
                            'q_message' : message,
                            'q_email' : email,
                            'q_num' : number,
                        },
                        success : function(res){
                            if(res.status == 'failed'){
                                $.notify(res.msg,'error');
                            }
                            else if(res.status == 'success'){
                                $("#q-message").val('');
                                $("#q-email").val('');
                                $("#q-num").val('');
                                $.notify(res.msg,'success');
                            }
                        },
                        error : function(res){
                            $.notify('Something Went Wrong','error');
                        }
                    });
                }
                
            }
            else{
                $.notify('All Fields required','error');
            }
            
        }
        
         function validateEmail($email) {
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          return emailReg.test( $email );
        }
    </script>
    @stack('scripts')
  </body>
</html>