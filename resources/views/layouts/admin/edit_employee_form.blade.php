<form method="POST" action="{{route('employees.update',$employee['id'])}}" class="mb-3" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">{{__('Name')}}</label>
        <input type="text" class="form-control" id="name" name="name" required value = "{{$employee['name']}}">
    </div>
    <div class="form-group">
        <label for="lastname">{{__('Lastname')}}</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required value = "{{$employee['lastname']}}">
    </div>
    <div class="form-group">
        <label for="email">{{__('Email')}}</label>
        <input type="email" class="form-control" id="email"  name="email" required value = "{{$employee['email']}}">
    </div>
    <div class="form-group">
        <label for="phone">{{__('Phone number')}}</label>
        <input type="text" class="form-control" id="phone"  name="phone" value = "{{$employee['phone']}}">
    </div>
    <div class="form-group">
        <label for="company_id">{{__('Company')}}</label>
        <select class="form-control" id="company_id" name="company_id" required>
            <option disabled selected>{{__('Select company')}}</option>
            @foreach($companies as $company)
                <option @if($company['id']==$employee['company_id']) selected @endif value="{{$company['id']}}">{{$company['name']}}</option>
            @endforeach
        </select>
    </div>

    @method('PUT')
    @csrf
    <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-success mr-1 w-100">{{__('Save')}}</button>
        <button type="button" class="btn btn-light w-100" data-dismiss="modal">{{__('Close')}}</button>
    </div>
</form>
