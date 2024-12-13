@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>Product List</h4>
        <h6><strong>Product</strong>/Product List</h6>
      </div>
      <div class="page-btn">
        <a href="{{URL::to('/product-add')}}" class="btn btn-added">
          <img
            src="{{asset('resources/assets/system/img/icons/plus.svg')}}"
            class="me-1"
            alt="img"
          />Add New Product
        </a>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        {{-- Print page --}}
        @include('system.main.system_page.product.elements.product_search')
        {{-- End print page --}}

        {{-- Search page --}}
        @include('system.main.system_page.product.elements.product_filter')
        {{-- End search page --}}
        
        {{-- Table page --}}
        @include('system.main.system_page.product.elements.product_table')
        {{-- End table page --}}
      </div>
    </div>
  </div>
</div>
@endsection
