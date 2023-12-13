
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>شركة توب وان للأسهم السعودية | {{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="google-site-verification" content="MjZKgRXKEo2gtBWyCvFTr1TeHaVzz_vbsUXZM1QoulU" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Cairo&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/web/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/web/css/owl.theme.default.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="/web/css/styles.css" />
    <link rel="shortcut icon" href="/web/top.ico" />
    @stack('css')
  </head>
  <body oncontextmenu="return false" >
    <!-- Start Log In -->
    <div class="logIn">
      <div class="form-wrapper">
        <div class="container-fluid">
          <div class="logIn-header">
            <h3 class="text-center">تسجيل الدخول</h3>
            <i class="fa fa-times fa-2x"></i>
          </div>

          <form method="POST" action="{{ route('login') }}">
            @csrf
            @method('POST')
            
            @if($errors->any())
              <div class="form-group bg-danger pt-1 pb-1 text-light text-center">
                  الرجاء ادخال بيانات صحيحة
              </div>
            @endif
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail"
                placeholder="البــريــد الإلكترونى"
                name="email"
                value="{{ old('email') }}"
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control"
                id="exampleInputPass"
                placeholder="كــلمــة المرور"
                aria-describedby="emailHelp"
                name="password"
              />
            </div>
            <button type="submit" class="btn w-100">
              تــــــسـجيل الدخـــول
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- End Log In -->
    @include('layouts.header')
    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')
    

    



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="/web/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="/web/js/main.js"></script>
    <script>
      $(document).ready(
        function()
        {
          $("#message").delay(2500).fadeOut(500);
        }
      );
    </script>
    <!--<script>-->
    <!--    document.onkeydown = function(e) {-->
    <!--      if(event.keyCode == 123) {-->
    <!--         return false;-->
    <!--      }-->
    <!--      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {-->
    <!--         return false;-->
    <!--      }-->
    <!--      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {-->
    <!--         return false;-->
    <!--      }-->
    <!--      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {-->
    <!--         return false;-->
    <!--      }-->
    <!--      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {-->
    <!--         return false;-->
    <!--      }-->
    <!--    }-->
    <!--</script>-->
  </body>
</html>
