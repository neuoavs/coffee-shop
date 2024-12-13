@extends('system.main.system_page.system_layout');
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Add Branch</h4>
          <h6><strong>Branch</strong>/Add Branch</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="row" id="add-confirm"  method="POST" data-model="branch">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Branch Name</label>
                <input type="text" name="name" placeholder="Neuorol LTT">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" placeholder="23 Lý Tự Trọng">
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
              <button type="submit" class="btn btn-submit me-2">Submit</button>
              <a href="{{URL::to('/branch-list')}}" class="btn btn-cancel">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection