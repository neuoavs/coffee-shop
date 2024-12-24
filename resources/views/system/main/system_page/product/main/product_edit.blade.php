@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Edit Product</h4>
          <h6><strong>Product</strong>/Edit Product</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm" method="POST" data-model="product" enctype="multipart/form-data" data-id="{{$product->id}}" data-name="{{$product->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="Cà phê sữa đá" value="{{$product->name}}">
              </div>
            </div>
            
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Provine</label>
                <select class="select" name="menu_id" id="menu_id">
                  <option disabled value="">Choose</option>
                  @foreach ($menus as $m)
                  @if ($m->id === $product->menu->id)
                  <option value="{{$m->id}}" selected>{{$m->name}}</option>
                  @else
                  <option value="{{$m->id}}">{{$m->name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Product Cost</label>
                <input type="text" name="cost" placeholder="49000" value="{{$product->cost}}">
              </div>
            </div>     
            
            <div class="col-lg-12">
              <div class="form-group">
                  <label>Product Image</label>
                  <div class="image-upload">
                    <input type="file" name="image" id="image" accept="image/*">
                      <div class="image-uploads">
                          <img id="preview" 
                          src="{{asset($product->image)}}" 
                          alt="img" 
                          style="max-height: 70px; width: auto;object-fit: cover;"/>
                          <h4 id="drop-image"></h4>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Change</button>
              <a href="{{URL::to('/product-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection