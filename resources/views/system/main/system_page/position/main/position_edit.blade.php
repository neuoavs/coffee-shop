@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Edit Position</h4>
          <h6><strong>Position</strong>/Edit Position</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm"  method="POST" data-model="position" data-id="{{$position->id}}" data-name="{{$position->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Position Name</label>
                <input type="text" name="name" placeholder="Server" value="{{$position->name}}">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Active</label>
                <select class="select" name="active" id="active">
                  <option disabled value="">Choose</option>
                  @if ($position->active)
                    <option selected value="1">On</option>
                    <option value="0">Off</option>
                  @else
                    <option value="1">On</option>
                    <option selected value="0">Off</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Change</button>
              <a href="{{URL::to('/position-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
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
@endsection