<div class="card" id="filter_inputs">
  <div class="card-body pb-0">
    <form class="row" id="product-filter" method="GET"  action="{{URL::to('/filter-product')}}">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="product-filter-active" name="product-filter-active">
            <option selected value="all">Choose active</option>
            <option value="1">On</option>
            <option value="0">Off</option>
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="product-filter-menu" name="product-filter-menu">
            <option selected value="">Choose menu</option>
            @foreach ($menus as $me)
            <option value="{{$me->id}}">{{$me->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12">
        <div class="form-group">
          <select class="select" id="product-filter-price" name="product-filter-price">
            <option selected value="">Price under</option>
              @for ($i = 14000; $i <= 69000; $i+=5000)
                <option value="{{$i}}">{{$i}}</option>
              @endfor
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

