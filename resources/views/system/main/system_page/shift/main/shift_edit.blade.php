<?php
  $begin_time = explode(':', $shift->begin_time);
  $end_time = explode(':', $shift->end_time);
?>
@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Edit Shift</h4>
          <h6><strong>Shift</strong>/Edit Shift</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm"  method="POST" data-model="shift" data-id="{{$shift->id}}" data-name="{{$shift->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Shift Name</label>
                <input type="text" name="name" placeholder="Light 7-12" value="{{$shift->name}}">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Active</label>
                <select class="select" name="active" id="active">
                  <option disabled value="">Choose</option>
                  @if ($shift->active)
                    <option selected value="1">On</option>
                    <option value="0">Off</option>
                  @else
                    <option value="1">On</option>
                    <option selected value="0">Off</option>
                  @endif
                </select>
              </div>
            </div>

            {{-- Begin Time --}}
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin Hour</label>
                <select class="select" name="begin_hour" id="begin_hour">
                  <option disabled value="">Choose</option>
                  @for ($i = 0; $i < 24; $i++)
                    {{$bh = sprintf('%02d', $i);}}
                    @if ($bh === $begin_time[0])
                      <option selected value="{{$bh}}">{{$bh}}</option>
                    @else
                      <option value="{{$bh}}">{{$bh}}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin minute</label>
                <select class="select" name="begin_minute" id="begin_minute">
                  <option disabled value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                  {{$bm = sprintf('%02d', $i);}}
                    @if ($bm === $begin_time[1])
                      <option selected value="{{$bm}}">{{$bm}}</option>
                    @else
                      <option value="{{$bm}}">{{$bm}}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Begin second</label>
                <select class="select" name="begin_second" id="begin_second">
                  <option disabled value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                    {{$bs = sprintf('%02d', $i);}}
                    @if ($bs === $begin_time[2])
                      <option selected value="{{$bs}}">{{$bs}}</option>
                    @else
                      <option value="{{$bs}}">{{$bs}}</option>
                    @endif
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
                  <option disabled value="">Choose</option>
                  {{$bhi = intval($begin_time[0]);}}
                  @for ($i = $bhi; $i < 60; $i++)
                    {{$eh = sprintf('%02d', $i);}}
                    @if ($eh === $end_time[0])
                      <option selected value="{{$eh}}">{{$eh}}</option>
                    @else
                      <option value="{{$eh}}">{{$eh}}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>End minute</label>
                <select class="select" name="end_minute" id="end_minute">
                  <option disabled value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                    {{$em = sprintf('%02d', $i);}}
                    @if ($em === $end_time[1])
                      <option selected value="{{$em}}">{{$em}}</option>
                    @else
                      <option value="{{$em}}">{{$em}}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>End second</label>
                <select class="select" name="end_second" id="end_second">
                  <option disabled value="">Choose</option>
                  @for ($i = 0; $i < 60; $i++)
                    {{$es = sprintf('%02d', $i);}}
                    @if ($es === $end_time[2])
                      <option selected value="{{$es}}">{{$es}}</option>
                    @else
                      <option value="{{$es}}">{{$es}}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>
            {{-- End time --}}

            <div class="col-lg-12">
              <button type="submit" class="btn btn-submit me-2">Change</button>
              <a href="{{URL::to('/shift-list')}}" class="btn btn-cancel">Back</a>
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