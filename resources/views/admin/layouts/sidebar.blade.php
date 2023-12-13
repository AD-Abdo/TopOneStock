<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo new-logo" href="{{ route('admin.home') }}">TopOne</a>
        <a class="sidebar-brand brand-logo-mini new-logo" href="{{ route('admin.home') }}">T</a>
      </div>
      
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                @if(Auth::user()->image != null)
                  <img class="img-xs rounded-circle " src="/user/{{ Auth::user()->image }}" alt="">
                @else
                <img class="img-xs rounded-circle " src="/assets/images/faces/face15.jpg" alt="">
                @endif
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                <span>
                  @if(Auth::user()->role == 1)
                    مدير الكيان
                  @else
                    مشرف الكيان
                  @endif
                </span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
              aria-labelledby="profile-dropdown">
              <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">إعدادت الحساب</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.profile.password') }}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">تغيير كلمة المرور</p>
                </div>
              </a>
              
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">التنقل</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('admin.home') }}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">لوحة التحكم</span>
          </a>
        </li>
        @if(Auth::user()->role == 1)
        
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('admin.share.index') }}">
            <span class="menu-icon">
              <i class="mdi mdi-google-analytics"></i>
            </span>
            <span class="menu-title">الاسهم</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('admin.package.index') }}">
            <span class="menu-icon">
              <i class="mdi mdi-ballot-outline"></i>
            </span>
            <span class="menu-title">الباقات</span>
          </a>
        </li>
        
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.customer') }}">
              <span class="menu-icon">
                <i class="mdi mdi-account-alert"></i>
              </span>
              <span class="menu-title">العملاء</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-account-supervisor"></i>
              </span>
              <span class="menu-title">المشرفين</span>
            </a>
          </li>
          @endif
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.client.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-account-alert"></i>
              </span>
              <span class="menu-title">عملاء المشرفين</span>
            </a>
          </li>
        @if(Auth::user()->role == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.user.analysis') }}">
              <span class="menu-icon">
                <i class="mdi mdi-apple-keyboard-option"></i>
              </span>
              <span class="menu-title">احصائيات المشرفين</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.participation.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-transit-connection"></i>
              </span>
              <span class="menu-title">اشتراكات الباقات</span>
            </a>
          </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('admin.inbox.index') }}">
            <span class="menu-icon">
              <i class="mdi mdi-inbox-arrow-down"></i>
            </span>
            <span class="menu-title">البريد</span>
          </a>
        </li>
        @endif
        
        
        
      </ul>
    </nav>