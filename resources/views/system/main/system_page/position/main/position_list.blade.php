@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Position List</h4>
        <h6><strong>Position</strong>/Position List</h6>
      </div>
      <div class="page-btn">
        <a href="{{URL::to('/position-add')}}" class="btn btn-added">
          <img
            src="{{asset('resources/assets/system/img/icons/plus.svg')}}"
            class="me-1"
            alt="img"
          />Add New Position
        </a>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        {{-- Print page --}}
        @include('system.main.system_page.position.elements.position_search')
        {{-- End print page --}}

        {{-- Search page --}}
        @include('system.main.system_page.position.elements.position_filter')
        {{-- End search page --}}
        
        {{-- Table page --}}
        @include('system.main.system_page.position.elements.position_table')
        {{-- End table page --}}
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('resources/assets/system/js/jquery.dataTables.min.js')}}"></script>
    
<script src="{{asset('resources/assets/system/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/sweetalert.js')}}"></script>

<script src="{{asset('resources/assets/system/js/axios.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/position-filter.js')}}"></script>
@endsection