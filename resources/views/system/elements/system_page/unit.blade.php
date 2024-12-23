@if (Session::get('position') === 'Boss' || Session::get('position') === 'Accountant')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/un.svg')}}" alt="img"><span> Unit</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/unit-list')}}">Unit List</a></li>
            <li><a href="{{URL::to('/unit-add')}}">Add Unit</a></li>
        </ul>
    </li>
@endif