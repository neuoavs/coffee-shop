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
          <th>Name</th>
          <th>Amount</th>
          <th>Unit</th>
          <th>Image</th>
          <th>Branch</th>
          <th>Active</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="item-table" class="model-table">
      @foreach ($items as $it)
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        <td>{{$it->name}}</td>
        <td>{{$it->amount}}</td>
        <td>
        <?php
          try {
            echo $it->unit->name;
          } catch (\Exception $th) {
            
          }
        ?>
        </td>
        <td><img class = "image-sheet" src="{{ asset($it->image) }}" alt="{{ $it->name }}"/></td> 
        <td>{{$it->branch->name}}</td>
        <td>
          @if ($it->active)
            <img id = "ac-img" src="{{asset('resources/assets/system/img/icons/ac.svg')}}" alt="img" />
          @else
            <img id = "inac-img" src="{{asset('resources/assets/system/img/icons/inac.svg')}}" alt="img" />
          @endif
        </td>
        <td>
          <a class="me-3" href="{{URL::to('/item-edit'.'/'.$it->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="item" data-id="{{$it->id}}" data-name="{{$it->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>