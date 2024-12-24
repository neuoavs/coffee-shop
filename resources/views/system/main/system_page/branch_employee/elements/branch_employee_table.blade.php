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
          <th>Nickname</th>
          <th>Branch name</th>
          <th>Active</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="branch-employee-table" class="model-table">
      @foreach ($branchEmployee as $be)
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        <td>{{$be->employee->nickname}}</td>
        <td>{{$be->branch->name}}</td>
        <td>
          @if ($be->active)
            <img id = "ac-img" src="{{asset('resources/assets/system/img/icons/ac.svg')}}" alt="img" />
          @else
            <img id = "inac-img" src="{{asset('resources/assets/system/img/icons/inac.svg')}}" alt="img" />
          @endif
        </td>
        <td>
          <a class="me-3" href="{{URL::to('/branch-employee-edit'.'/'.$be->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="branch-employee" data-id="{{$be->id}}" data-name="{{$be->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>