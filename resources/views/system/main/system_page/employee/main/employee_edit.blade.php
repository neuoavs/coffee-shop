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
          <h4>Edit Employee</h4>
          <h6><strong>Employee</strong>/Edit Employee</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm"  method="POST" data-model="employee" data-id="{{$employee->id}}" data-name="{{$employee->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="vkuk23@" value="{{$employee->password}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" placeholder="Nguyễn Thành Tiến Tùng" value="{{$employee->full_name}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Nickname</label>
                <input type="text" name="nickname" placeholder="Tùng 30" value="{{$employee->nickname}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Birthday</label>
                <div class="input-groupicon">
                  <input type="text" name="birthday" placeholder="Choose Date" class="datetimepicker" value="{{$employee->birthday}}">
                  <a class="addonset">  
                    <img src="{{asset('resources/assets/system/img/icons/calendars.svg')}}" alt="img" />
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Citizen Identification</label>
                <input type="text" name="citizen_identification" placeholder="04020501XXXX" value="{{$employee->citizen_identification}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" placeholder="0356XXXXXX" value="{{$employee->phone_number}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Salary Coefficient</label>
                <input type="text" name="salary_coefficient" placeholder="25000" value="{{$employee->salary_coefficient}}">
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Position</label>
                <select name="position_id" id="position_id" class="select">
                  <option disabled value="">Choose</option>
                  @foreach ($positions as $p)
                    @if ($p->active)
                      @if ($p->id === $employee->position->id)
                        <option selected value="{{$p->id}}">{{$p->name}}</option>
                      @else
                        <option value="{{$p->id}}">{{$p->name}}</option>
                      @endif
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Change</button>
              <a href="{{URL::to('/employee-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{asset('resources/assets/system/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/moment.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('resources/assets/system/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('resources/assets/system/js/sweetalert.js')}}"></script>
@endsection