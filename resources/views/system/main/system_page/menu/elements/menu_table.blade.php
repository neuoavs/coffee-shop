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
          <th>Menu name</th>
          <th>Active</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="menu-table" class="model-table">
      @foreach ($menus as $me)
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        
        <td>{{$me->name}}</td>
        <td>
          @if ($me->active)
            <img id = "ac-img" src="{{asset('resources/assets/system/img/icons/ac.svg')}}" alt="img" />
          @else
            <img id = "inac-img" src="{{asset('resources/assets/system/img/icons/inac.svg')}}" alt="img" />
          @endif
        </td>
        <td>
          <a class="me-3" href="{{URL::to('/menu-edit'.'/'.$me->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="menu" data-id="{{$me->id}}" data-name="{{$me->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>