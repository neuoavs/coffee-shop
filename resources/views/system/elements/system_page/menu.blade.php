@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/me.svg')}}" alt="img"><span> Menu</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/menu-list')}}">Menu List</a></li>
            <li><a href="{{URL::to('/menu-add')}}">Add Menu</a></li>
        </ul>
    </li>
@endif