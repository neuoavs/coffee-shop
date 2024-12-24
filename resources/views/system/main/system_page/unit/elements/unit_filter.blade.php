<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="unit-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="unit-filter-active" name="unit-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

