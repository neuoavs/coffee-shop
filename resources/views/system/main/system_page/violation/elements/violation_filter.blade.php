<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="violation-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="violation-filter-fine-amount" name="violation-filter-fine-amount">
            <option selected value="all">Fine amount under</option>
            @for ($i = 20000; $i <= 100000; $i+=20000)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="violation-filter-active" name="violation-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

