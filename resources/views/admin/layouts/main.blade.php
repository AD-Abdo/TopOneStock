
<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="/assets/css/modern-vertical/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="/assets/icon.ico" />
  <style>
    .new-logo{
      text-decoration: none !important;
      color: #fff !important;
      font-size: 1.6em !important;
      text-align: center !important
    }
    .notification{
      position:fixed;
      bottom:0;
      left:0;
      margin-left:1rem;

    }
  </style>
  @stack('css')
</head>

<body class="rtl" oncontextmenu="return false" >
  
  <div class="container-scroller">

    @include('admin.layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
      <div class="alert alert-fill-success notification cairo text-right" style="display:none" role="alert">
    <i class="mdi mdi-alert-circle"></i> تم اضافة السهم بنجاح. 
  </div>
      @include('admin.layouts.navbar')

      <div class="main-panel">
        
        @yield('content')

        @include('admin.layouts.footer')
      
      </div>

    </div>
   

  </div>


  @if(Session::has('message'))

  <div id="notification" class="alert alert-fill-success notification cairo text-right" role="alert">
    <i class="mdi mdi-alert-circle"></i> {{Session::get('message')}} . 
  </div>
  @endif
  @if(Session::has('error'))

  <div id="notification" class="alert alert-fill-danger notification cairo text-right" role="alert">
    <i class="mdi mdi-alert-circle"></i> {{Session::get('error')}} . 
  </div>
  @endif



<script src="/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="/assets/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    
<script src="/assets/vendors/chart.js/Chart.min.js"></script>
<script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="/assets/js/off-canvas.js"></script>
<script src="/assets/js/hoverable-collapse.js"></script>
<script src="/assets/js/misc.js"></script>
<script src="/assets/js/settings.js"></script>
  <script src="/assets/js/todolist.js"></script>
  <script src="/assets/js/dashboard.js"></script>
  <script src="/assets/js/toastDemo.js"></script>

  <script>
    $(document).ready(function () {
        $("#notification").fadeOut(5800,'linear');
      });
  </script>
  <script>
        document.onkeydown = function(e) {
          if(event.keyCode == 123) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
             return false;
          }
        }
  </script>
  @stack('js')
</body>


</html>