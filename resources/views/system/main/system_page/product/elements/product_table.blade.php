<div class="table-responsive">
  <table class="table datanew">
    <thead>
      <tr>
        <th>
          <label class="checkboxs">
            <input type="checkbox" id="select-all" />
            <span class="checkmarks"></span>
          </label>
        </th>
          <th>Product name</th>
          <th>Menu name</th>
          <th>Product image</th>
          <th>Product cost</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="product-table" class="model-table">
      @foreach ($products as $pr)
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        
        <td>{{$pr->name}}</td>
        <td>{{$pr->menu->name}}</td> 
        <td><img src="{{ asset($pr->image) }}" alt="{{ $pr->name }}" style="width: 100px; height: auto;" /></td> 
        <td>{{$pr->cost}}</td>
        <td>
          <a class="me-3" href="{{URL::to('/product-edit'.'/'.$pr->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="product" data-id="{{$pr->id}}" data-name="{{$pr->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>