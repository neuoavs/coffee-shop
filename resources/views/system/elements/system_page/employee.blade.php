@if (Session::get('position') === 'Boss' || Session::get('position') === 'Manager')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/emp.svg')}}" alt="img"><span> Employee</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/employee-list')}}">Employee List</a></li>
            <li><a href="{{URL::to('/employee-add')}}">Add Employee</a></li>
        </ul>
    </li>
@endif