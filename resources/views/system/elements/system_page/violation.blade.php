@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/vio.svg')}}" alt="img"><span> Violation</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/violation-list')}}">Violation List</a></li>
            <li><a href="{{URL::to('/violation-add')}}">Add Violation</a></li>
        </ul>
    </li>
@endif