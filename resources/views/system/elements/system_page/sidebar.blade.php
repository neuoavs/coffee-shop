<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.html"><img src="{{asset('resources/assets/system/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
                </li>
                @include('system.elements.system_page.branch')
                @include('system.elements.system_page.position')
                @include('system.elements.system_page.unit')
                @include('system.elements.system_page.menu')
                @include('system.elements.system_page.violation')
                @include('system.elements.system_page.shift')
                @include('system.elements.system_page.employee')
                @include('system.elements.system_page.product')
                @include('system.elements.system_page.branch_employee')
                @include('system.elements.system_page.profile')
            </ul>
        </div>
    </div>
</div>