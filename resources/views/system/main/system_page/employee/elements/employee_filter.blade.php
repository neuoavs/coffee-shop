<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="employee-filter" method="GET"  action="{{URL::to('/filter-employee')}}">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token()}}" />
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="employee-filter-menu" name="employee-filter-menu">
            <option selected value="">Choose menu</option>
            {{-- @foreach ($menus as $m)
            <option value="{{$m->id}}">{{$m->name}}</option>
            @endforeach --}}
          </select>

          
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="employee-filter-cost" name="employee-filter-cost">
            <option selected value="">Choose cost</option>
            {{-- <option selected value="20000">Under 20000</option>
            <option selected value="30000">Under 30000</option>
            <option selected value="40000">Under 40000</option>
            <option selected value="50000">Under 50000</option>
            <option selected value="60000">Under 60000</option>
            <option selected value="70000">Under 70000</option>
            <option selected value="80000">Under 80000</option> --}}
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

