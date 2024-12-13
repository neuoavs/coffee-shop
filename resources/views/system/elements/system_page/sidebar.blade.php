<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.html"><img src="{{asset('resources/assets/system/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
                </li>
                @include('system.elements.system_page.branch')
                @include('system.elements.system_page.product')
            </ul>
        </div>
    </div>
</div>