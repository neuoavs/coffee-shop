@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/ps.svg')}}" alt="img"><span> Position</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/position-list')}}">Position List</a></li>
            <li><a href="{{URL::to('/position-add')}}">Add Position</a></li>
        </ul>
    </li>
@endif