@if (Session::get('position') === 'Boss' || Session::get('position') === 'Accountant')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/un.svg')}}" alt="img"><span> Item</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/item-list')}}">Item List</a></li>
            <li><a href="{{URL::to('/item-add')}}">Add Item</a></li>
        </ul>
    </li>
@endif