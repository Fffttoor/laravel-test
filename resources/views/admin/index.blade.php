@extends('layouts.admin.app')

@section('page_name'){{__('Companies')}}@endsection


@section('page_content')
<div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
                <!-- TABLE -->
                <div class="mb-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#companyForm">{{__('Create new company')}}</button></div>

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">{{__('Companies list')}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>{{__('Logo')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Website')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($companies as $company){ ?>
                                    <tr>
                                        <td>
                                            <?php if(!empty($company['logo'])){ ?>
                                            <img class="img-size-50 mr-3 img-circle img-fluid"
                                                 style="height: 50px"
                                                 src="{{'companies_logo/'.$company['logo']}}"
                                                 alt="{{__('company logo')}}">
                                            <?php }else { ?>
                                                <p>{{__('No logo')}}</p>
                                                <?php } ?>
                                        </td>
                                        <td>{{$company['name']}}</td>
                                        <td>{{$company['email']}}</td>
                                        <td>{{$company['website']}}</td>
                                        <td>
                                            <button type="button"  class="btn btn-sm btn-outline-info js-edit-company" data-id="{{$company['id']}}">{{__('Edit')}}</button>
                                            <form action="{{ route('companies.destroy', $company['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Ви впевнені, що хочете видалити цю компанію?')">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <div class="card-footer clearfix">
                        <div class="pagination my-4">
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
<div class="modal" id="companyFormEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Company Form')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<div class="modal" id="companyForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Company Form')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('companies.store')}}" class="mb-3" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="website">{{__('Website')}}</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="logo">{{__('Upload logotype')}}</label>
                        <input type="file" name="logo" class="form-control-file" id="logo">
                    </div>
                    @csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success mr-1 w-100">{{__('Save')}}</button>
                        <button type="button" class="btn btn-light w-100" data-dismiss="modal">{{__('Close')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection






