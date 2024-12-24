@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Add Shift</h4>
          <h6><strong>Shift</strong>/Add Shift</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="add-confirm"  method="POST" data-model="shift">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Shift Name</label>
                <input type="text" name="name" placeholder="Light 7-12">
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
            
            {{-- Begin Time --}}
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin Hour</label>
                <select class="select" name="begin_hour" id="begin_hour">
                  <option disabled selected value="">Choose</option>
                  @for ($i = 0; $i < 24; $i++)
                  {{$bh = sprintf('%02d', $i);}}
                  <option value="{{$bh}}">{{$bh}}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin minute</label>
                <select class="select" name="begin_minute" id="begin_minute">
                  <option disabled selected value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                  {{$bm = sprintf('%02d', $i);}}
                  <option value="{{$bm}}">{{$bm}}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin second</label>
                <select class="select" name="begin_second" id="begin_second">
                  <option disabled selected value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                  {{$bs = sprintf('%02d', $i);}}
                  <option value="{{$bs}}">{{$bs}}</option>
                  @endfor
                </select>
              </div>
            </div>
            {{-- Begin time --}}

            {{-- End Time --}}
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>End Hour</label>
                <select class="select" name="end_hour" id="end_hour">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>End minute</label>
                <select class="select" name="end_minute" id="end_minute">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>End second</label>
                <select class="select" name="end_second" id="end_second">
                  <option disabled selected value="">Choose</option>
                </select>
              </div>
            </div>
            {{-- End time --}}

            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Submit</button>
              <a href="{{URL::to('/shift-list')}}" class="btn btn-cancel">Back</a>
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

<script src="{{asset('resources/assets/system/js/time-shift.js')}}"></script>
@endsection

