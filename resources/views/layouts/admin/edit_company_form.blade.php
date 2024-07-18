<form method="POST" action="{{route('companies.update',$company['id'])}}" class="mb-3" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">{{__('Name')}}</label>
        <input type="text" class="form-control" id="name" name="name" required value = "{{$company['name']}}">
    </div>
    <div class="form-group">
        <label for="email">{{__('Email')}}</label>
        <input type="email" class="form-control" id="email"  name="email" required value = "{{$company['email']}}">
    </div>
    <div class="form-group">
        <label for="website">{{__('Website')}}</label>
        <input type="text" class="form-control" id="website"  name="website" value = "{{$company['website']}}">
    </div>
    @if(!empty($company['logo']))
        <div class="form-group js-logo-upload" style="display: none">
            <label for="logo">{{__('Upload logotype')}}</label>
            <input type="file" name="logo" class="form-control-file" id="logo">
        </div>
        <div class="form-group js-logo-preview">
            <img class="img-size-50 mr-3 img-circle img-fluid"
                 style="height: 50px"
                 src="{{'companies_logo/'.$company['logo']}}"
                 alt="{{__('company logo')}}">
            <span class="info-box-text">{{$company['logo']}}</span>
            <button type="button" class="close js-remove-preview">&times;</button>
        </div>

    @else
        <div class="form-group js-logo-upload">
            <label for="logo">{{__('Upload logotype')}}</label>
            <input type="file" name="logo" class="form-control-file" id="logo">
        </div>
    @endif
    @method('PUT')
    @csrf
    <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-success mr-1 w-100">{{__('Save')}}</button>
        <button type="button" class="btn btn-light w-100" data-dismiss="modal">{{__('Close')}}</button>
    </div>
</form>
