<div class="header">
    <div class="header-left active">
      <a href="{{URL::to('/system')}}" class="logo">
        <img src="{{asset('resources/assets/system/img/logo.png')}}" alt="" />
      </a>
      <a href="{{URL::to('/system')}}" class="logo-small">
        <img src="{{asset('resources/assets/system/img/logo-small.png')}}" alt="" />
      </a>
      <a id="toggle_btn" href="javascript:void(0);"> </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
      <span class="bar-icon">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </a>

    <ul class="nav user-menu">
      <li class="nav-item dropdown has-arrow main-drop">
        <a
          href="javascript:void(0);"
          class="dropdown-toggle nav-link userset"
          data-bs-toggle="dropdown"
        >
          <span class="user-img"
            ><img src="{{asset('resources/assets/system/img/profiles/avator1.jpg')}}" alt="" />
            <span class="status online"></span
          ></span>
        </a>
        <div class="dropdown-menu menu-drop-user">
          <div class="profilename">
            <div class="profileset">
              <span class="user-img"
                ><img src="{{asset('resources/assets/system/img/profiles/avator1.jpg')}}" alt="" />
                <span class="status online"></span
              ></span>
              <div class="profilesets">
                <h6>John Doe</h6>
                <h5>Admin</h5>
              </div>
            </div>
            <hr class="m-0" />
            <a class="dropdown-item" href="profile.html">
              <i class="me-2" data-feather="user"></i> My Profile</a
            >
            <a class="dropdown-item" href="generalsettings.html"
              ><i class="me-2" data-feather="settings"></i>Settings</a
            >
            <hr class="m-0" />
            <a class="dropdown-item logout pb-0" href="{{URL::to('/logout')}}"
              ><img
                src="{{asset('resources/assets/system/img/icons/log-out.svg')}}"
                class="me-2"
                alt="img"
              />Logout</a
            >
          </div>
        </div>
      </li>
    </ul>
</div>