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
          <th>ID</th>
          <th>Nickname</th>
          <th>Citizen identification</th>
          <th>Phone number</th>
          <th>Salary coefficient</th>
          <th>Position</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="employee-table" class="model-table">
      <?php $nm = Session::get('nickname');?>
      @foreach ($employees as $em)
        <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox" />
            <span class="checkmarks"></span>
          </label>
        </td>
        
        <td>{{$em->id}}</td>
        <td>{{$em->nickname}}</td>
        <td>{{$em->citizen_identification}}</td>
        <td>{{$em->phone_number}}</td>
        <td>{{$em->salary_coefficient}}</td>
        <td>{{$em->position->name}}</td>
        <td>
          <a class="me-3" href="{{URL::to('/employee-edit'.'/'.$em->id)}}">
            <img id = "edit-img" src="{{asset('resources/assets/system/img/icons/edit.svg')}}" alt="img" />
          </a>
          <a class="me-3 delete-confirm" href="javascript:void(0);" data-model="employee" data-id="{{$em->id}}" data-name="{{$em->name}}">
            <img id = "delete-img" src="{{asset('resources/assets/system/img/icons/delete.svg')}}" alt="img" />
          </a>
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>