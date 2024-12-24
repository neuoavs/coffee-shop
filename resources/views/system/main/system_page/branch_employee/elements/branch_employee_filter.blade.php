<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="branch-employee-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="branch-employee-filter-active" name="branch-employee-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
        
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="branch-employee-filter-branch" name="branch-employee-filter-branch">
            <option selected value="">Choose branch</option>
            @foreach ($branches as $b)
              <option value="{{$b->id}}">{{$b->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

