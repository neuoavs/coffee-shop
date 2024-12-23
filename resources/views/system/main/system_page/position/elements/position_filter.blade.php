<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="position-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="position-filter-active" name="position-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
      <div class="col-lg-1 col-sm-6 col-12 ms-auto">
        <div class="form-group">
          <button type="submit" class="btn btn-filters ms-auto">
            <img src="{{ asset('resources/assets/system/img/icons/search-whites.svg') }}" alt="img" />
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

