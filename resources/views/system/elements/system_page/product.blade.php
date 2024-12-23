@if (Session::get('position') === 'Boss')
    <li class="submenu">
        <a href="javascript:void(0);"><img src="{{asset('resources/assets/system/img/icons/prd.svg')}}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{URL::to('/product-list')}}">Product List</a></li>
            <li><a href="{{URL::to('/product-add')}}">Add Product</a></li>
        </ul>
    </li>
@endif