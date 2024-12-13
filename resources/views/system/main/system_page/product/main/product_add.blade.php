@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Add Product</h4>
          <h6><strong>Product</strong>/Add Product</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="add-confirm" method="POST" data-model="product" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="Cà phê sữa đá">
              </div>
            </div>
            
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Provine</label>
                <select class="select" name="menu_id" id="menu_id">
                  <option disabled selected value="">Choose</option>
                  @foreach ($menus as $m)
                  <option value="{{$m->id}}">{{$m->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Product Cost</label>
                <input type="text" name="cost" placeholder="49000">
              </div>
            </div>     
            
            <div class="col-lg-12">
              <div class="form-group">
                  <label>Product Image</label>
                  <div class="image-upload">
                    <input type="file" name="image" id="image" accept="image/*">
                      <div class="image-uploads">
                          <img id="preview" 
                          src="{{asset('resources/assets/system/img/icons/upload.svg')}}" 
                          alt="img" 
                          style="max-height: 70px; width: auto;object-fit: cover;"/>
                          <h4 id="drop-image">Drag and drop a file to upload</h4>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Submit</button>
              <a href="{{URL::to('/product-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection