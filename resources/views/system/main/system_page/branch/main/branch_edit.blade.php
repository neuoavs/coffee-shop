<script>
  sessionStorage.setItem("province", "{{ Session::get('province') }}");
  sessionStorage.setItem("district", "{{ Session::get('district') }}");
  sessionStorage.setItem("ward", "{{ Session::get('ward') }}");
</script>

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Edit Branch</h4>
          <h6><strong>Branch</strong>/Edit Branch</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm"  method="POST" data-model="branch" data-id="{{$branch->id}}" data-name="{{$branch->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Branch Name</label>
                <input type="text" name="name" placeholder="Neuorol LTT" value="{{$branch->name}}">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" placeholder="23 Lý Tự Trọng" value="{{$branch->address}}">
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Provine</label>
                <select class="select" name="province" id="province">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>District</label>
                <select class="select" name="district" id="district">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Ward</label>
                <select class="select" name="ward" id ="ward">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Change</button>
              <a href="{{URL::to('/branch-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- Clear toàn bộ session của branch được chuyền vào trang branch update--}}
  {{Session::put('province', null)}}
  {{Session::put('district', null)}}
  {{Session::put('ward', null)}}
@endsection

@section('script')
<script src="{{asset('resources/assets/system/js/jquery.dataTables.min.js')}}"></script>
    
<script src="{{asset('resources/assets/system/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/sweetalert.js')}}"></script>

<script src="{{asset('resources/assets/system/js/axios.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/vietnam_select/vietnam_select.js')}}"></script>
@endsection