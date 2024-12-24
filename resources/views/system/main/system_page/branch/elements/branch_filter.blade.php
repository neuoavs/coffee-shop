<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="branch-filter" method="GET">
      {{ csrf_field() }} 
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="branch-filter-province" name="branch-filter-province">
            <option selected value="">Choose province</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

