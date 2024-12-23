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
          <th>Branch name</th>
          <th>Branch address</th>
          <th>Branch province</th>
          <th>Branch district</th>
          <th>Branch ward</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="branch-table" class="model-table">
      @foreach ($branches as $br)
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        
        <td>{{$br->name}}</td>
        <td>{{$br->address}}</td> 
        <td>{{$br->province}}</td>
        <td>{{$br->district}}</td>
        <td>{{$br->ward}}</td>
        <td>
          <a class="me-3" href="{{URL::to('/branch-edit'.'/'.$br->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="branch" data-id="{{$br->id}}" data-name="{{$br->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>