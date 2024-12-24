<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="item-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="item-filter-active" name="item-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="item-filter-unit" name="item-filter-unit">
            <option selected value="">Choose unit</option>
            @foreach ($units as $un)
              <option value="{{$un->id}}">{{$un->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="item-filter-branch" name="item-filter-branch">
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

