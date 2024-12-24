@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/shi.svg')}}" alt="img"><span> Shift</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/shift-list')}}">Shift List</a></li>
            <li><a href="{{URL::to('/shift-add')}}">Add Shift</a></li>
        </ul>
    </li>
@endif