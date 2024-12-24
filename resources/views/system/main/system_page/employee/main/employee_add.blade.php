@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/css/bootstrap-datetimepicker.min.css')}}"/>

<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Add Employee</h4>
          <h6><strong>Employee</strong>/Add Employee</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="add-confirm"  method="POST" data-model="employee">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="vkuk23@">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" placeholder="Nguyễn Thành Tiến Tùng">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Nickname</label>
                <input type="text" name="nickname" placeholder="Tùng 30">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Birthday</label>
                <div class="input-groupicon">
                  <input type="text" name="birthday" placeholder="Choose Date" class="datetimepicker">
                  <a class="addonset">  
                    <img src="{{asset('resources/assets/system/img/icons/calendars.svg')}}" alt="img" />
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Citizen Identification</label>
                <input type="text" name="citizen_identification" placeholder="04020501XXXX">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" placeholder="0356XXXXXX">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Salary Coefficient</label>
                <input type="text" name="salary_coefficient" placeholder="25000">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Position</label>
                <select name="position_id" id="position_id" class="select">
                  <option disabled selected value="">Choose</option>
                  @foreach ($positions as $p)
                    @if ($p->active)
                      <option value="{{$p->id}}">{{$p->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Submit</button>
              <a href="{{URL::to('/employee-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script') 
<script src="{{asset('resources/assets/system/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/moment.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/sweetalert.js')}}"></script>
@endsection

