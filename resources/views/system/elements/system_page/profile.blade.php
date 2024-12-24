<li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/prf.svg')}}" alt="img"><span>{{Session::get('nickname').' - '.Session::get('position')}}</span> <span class="menu-arrow"></span></a>
    <ul>
        <li><a href="{{URL::to('/logout')}}">Logout</a></li>
    </ul>
</li>