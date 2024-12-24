<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="employee-filter" method="GET">
      {{ csrf_field() }} 
      {{-- <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="employee-filter-position" name="employee-filter-position">
            <option selected value="">Choose position</option>
            <?php $po = Session::get('position');?>
            @foreach ($positions as $p)
              @if ($p->active)
                @if ($po === "Boss")

                  @if ($p->name != $po)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                  @endif
                @else
                  <option value="{{$p->id}}">{{$p->name}}</option>
                @endif
              @endif
            @endforeach
          </select>
        </div>
      </div> --}}
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="employee-filter-salary-coefficient" name="employee-filter-salary-coefficient">
            <option selected value="">Salary Coefficient under</option>
            @for ($i = 20000; $i <= 50000; $i+=10000)
              <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

