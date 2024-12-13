@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Branch List</h4>
        <h6><strong>Branch</strong>/Branch List</h6>
      </div>
      <div class="page-btn">
        <a href="{{URL::to('/branch-add')}}" class="btn btn-added">
          <img
            src="{{asset('resources/assets/system/img/icons/plus.svg')}}"
            class="me-1"
            alt="img"
          />Add New Branch
        </a>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        {{-- Print page --}}
        @include('system.main.system_page.branch.element.branch_search')
        {{-- End print page --}}

        {{-- Search page --}}
        @include('system.main.system_page.branch.element.branch_filter')
        {{-- End search page --}}
        
        {{-- Table page --}}
        @include('system.main.system_page.branch.element.branch_table')
        {{-- End table page --}}
      </div>
    </div>
  </div>
</div>
@endsection
