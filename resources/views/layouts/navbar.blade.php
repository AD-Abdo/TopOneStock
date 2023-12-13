<!-- Start Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/web/imgs/top.png" width="95" height="75" alt="TopOne" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ $item[0] }}">
              <a class="nav-link text-uppercase" href="{{ route('home') }}"
                >الرئيسيــــــــة</a
              >
            </li>
            <li class="nav-item {{ $item[1] }}">
              <a class="nav-link text-uppercase" href="{{ route('packages') }}"
                >باقات توب وان</a
              >
            </li>
            <li class="nav-item {{ $item[2] }}">
              <a class="nav-link text-uppercase" href="{{ route('tawsiat') }}"
                >معدل الأداء</a
              >
            </li>
            <li class="nav-item {{ $item[3] }}">
              <a class="nav-link text-uppercase" href="{{ route('contact') }}"
                >تواصل معنا</a
              >
            </li>
            <li class="nav-item {{ $item[4] }}">
              <a class="nav-link text-uppercase" href="{{ route('about') }}">من نحن</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar  -->