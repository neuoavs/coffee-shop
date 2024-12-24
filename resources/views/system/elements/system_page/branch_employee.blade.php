@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/un.svg')}}" alt="img"><span> Branch Employee</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/branch-employee-list')}}">Branch Employee List</a></li>
            <li><a href="{{URL::to('/branch-employee-add')}}">Add Branch Employee</a></li>
        </ul>
    </li>
@endif