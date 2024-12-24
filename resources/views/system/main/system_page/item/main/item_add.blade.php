@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Add Item</h4>
          <h6><strong>Item</strong>/Add Item</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="add-confirm"  method="POST" data-model="item">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Fresh milk">
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Amount</label>
                <input type="text" name="amount" placeholder="23">
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Unit</label>
                <select class="select" name="unit_id" id="unit_id">
                  <option disabled selected value="">Choose</option>
                  @foreach ($units as $un)
                    <option value="{{$un->id}}">{{$un->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Branch</label>
                <select class="select" name="branch_id" id="branch_id">
                  <option disabled selected value="">Choose</option>
                  @foreach ($branches as $br)
                    <option value="{{$br->id}}">{{$br->name}}</option>
                  @endforeach
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
                  <label>Image</label>
                  <div class="image-upload">
                    <input type="file" name="image" id="image" accept="image/*">
                      <div class="image-uploads">
                          <img id="preview" 
                          src="{{asset('resources/assets/system/img/icons/upl.svg')}}" 
                          alt="img"/>
                          <h4 id="drop-image">Drag and drop a file to upload</h4>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Submit</button>
              <a href="{{URL::to('/item-list')}}" class="btn btn-cancel">Back</a>
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

