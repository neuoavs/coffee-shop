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
          {{-- <th>Employee name</th>
          <th>Menu name</th>
          <th>employee image</th>
          <th>employee cost</th>
          <th>Action</th> --}}
          <th>Full name</th>
          <th>Nick name</th>
          <th>Position</th>
          <th>Citizen ID</th>
          <th>Phone number</th>
          <th>Salary coefficient</th>
          <th></th>

      </tr>
    </thead>
    <tbody id="employee-table" class="model-table">
      {{-- @foreach ($employees as $pr)
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
          <a class="me-3" href="{{URL::to('/employee-edit'.'/'.$pr->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="employee" data-id="{{$pr->id}}" data-name="{{$pr->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach --}}
    </tbody>
  </table>
</div>