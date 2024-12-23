@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/branch.svg')}}" alt="img"><span> Branch</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/branch-list')}}">Branch List</a></li>
            <li><a href="{{URL::to('/branch-add')}}">Add Branch</a></li>
        </ul>
    </li>
@endif