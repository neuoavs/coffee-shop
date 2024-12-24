<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="shift-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="shift-filter-active" name="shift-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
      {{-- <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="shift-filter-time-space" name="shift-filter-time-space">
            <option selected value="all">Choose time</option>
            <option value="light">Light</option>
            <option value="night">Night</option>
            <option value="full">Full</option>
          </select>
        </div>
      </div> --}}
    </form>
  </div>
</div>

