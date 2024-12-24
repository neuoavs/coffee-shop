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
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Active</th>
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
        <td>{{$pr->description}}</td>
        <td>{{$pr->price}}</td>
        <td><img class = "image-sheet" src="{{ asset($pr->image) }}" alt="{{ $pr->name }}"/></td> 
        <td>
          @if ($pr->active)
            <img id = "ac-img" src="{{asset('resources/assets/system/img/icons/ac.svg')}}" alt="img" />
          @else
            <img id = "inac-img" src="{{asset('resources/assets/system/img/icons/inac.svg')}}" alt="img" />
          @endif
        </td>
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