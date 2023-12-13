<!-- Start Header -->
    <header>
      <div class="container">
        <div class="content">
          <ul class="phone-email list-unstyled">
            <li>
              <a href="tel:+201552543651"
                ><i class="fa fa-phone"></i>&nbsp; 01552543651</a
              >
            </li>
            <li>
              <a href="mailto:info@topone-stock.com"
                ><i class="fa fa-envelope"></i>&nbsp;   info@topone-stock.com</a
              >
            </li>
          </ul>
          @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('user.profile') }}">الصفحة الشخصية</a>
                  <a class="dropdown-item" href="{{ route('user.profile.password') }}">تغيير كلمة المرور</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    @method('POST')
                    <button type="submit" class="dropdown-item" href="{{ route('logout') }}">تسجيل خروج</button>
                  </form>
                </div>
              </div>

          @else
            
          
            <ul class="log-sign list-unstyled">
              <li class="logInBtn">
                <i class="fas fa-sign-in-alt"></i>&nbsp; تسجيل الدخول
              </li>
              <li>-</li>
              <li>
                <a href="{{ route('register') }}"
                  ><i class="fas fa-user-plus"></i>&nbsp; تسجيل جديد
                </a>
              </li>
            </ul>
          @endauth
        </div>
      </div>
    </header>
    <!-- End Header -->