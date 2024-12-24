@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

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
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="Cà phê sữa đá">
              </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Menu</label>
                <select class="select" name="menu_id" id="menu_id">
                  <option disabled selected value="">Choose</option>
                  @foreach ($menus as $me)
                    @if ($me->active)
                    <option value="{{$me->id}}">{{$me->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Price</label>
                <select name="price" id="price" class="select">
                  <option disabled selected value="">Choose</option>
                  @for ($i = 14000; $i <= 69000; $i+=5000)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Active</label>
                <select class="select" name="active" id="active">
                  <option disabled selected value="">Choose</option>
                  <option value="1">On</option>
                  <option value="0">Off</option>
                </select>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                  <label>Product Image</label>
                  <div class="image-upload">
                    <input type="file" name="image" id="image" accept="image/*">
                      <div class="image-uploads">
                          <img id="preview" 
                          src="{{asset('resources/assets/system/img/icons/upl.svg')}}" 
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

@section('script')
<script src="{{asset('resources/assets/system/js/jquery.dataTables.min.js')}}"></script>
    
<script src="{{asset('resources/assets/system/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/sweetalert.js')}}"></script>

<script src="{{asset('resources/assets/system/js/image.js')}}"></script>
@endsection