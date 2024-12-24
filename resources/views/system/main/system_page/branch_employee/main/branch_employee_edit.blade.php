@extends('system.main.system_page.system_layout');

@section('style')
<link rel="stylesheet" href="{{asset('resources/assets/system/plugins/select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Edit Branch Employee</h4>
          <h6><strong>Branch Employee</strong>/Edit Branch Employee</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="edit-confirm"  method="POST" data-model="branch-employee" data-id="{{$branchEmployee->id}}" data-name="{{$branchEmployee->name}}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Nickname</label>
                <select class="select" name="employee_id" id="employee_id">
                  <option disabled value="">Choose</option>
                  @foreach ($employees as $em)
                    @if ($em === $branchEmployee->employee_id)
                      <option selected value="{{$em->id}}">{{$em->nickname}}</option>
                    @else
                      <option value="{{$em->id}}">{{$em->nickname}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label>Branch Name</label>
                <select class="select" name="branch_id" id="branch_id">
                  <option disabled value="">Choose</option>
                  @foreach ($branches as $br)
                    @if ($br === $branchEmployee->branch_id)
                      <option selected value="{{$br->id}}">{{$br->name}}</option>
                    @else
                      <option option value="{{$br->id}}">{{$br->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Active</label>
                <select class="select" name="active" id="active">
                  <option disabled value="">Choose</option>
                  @if ($branchEmployee->active)
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
              <a href="{{URL::to('/branch-employee-list')}}" class="btn btn-cancel">Back</a>
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