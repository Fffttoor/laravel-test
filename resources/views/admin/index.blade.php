@extends('layouts.admin.app')

@section('page_name'){{__('Companies')}}@endsection


@section('page_content')
<div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button"  class="btn btn-sm btn-outline-info">{{__('Edit')}}</button>
                                        <button type="button"  class="btn btn-sm btn-outline-danger">{{__('Delete')}}</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
<div class="modal" id="companyForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Company Form')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="mb-3">
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" id="email"  name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Website')}}</label>
                        <input type="text" class="form-control" id="website"  name="website">
                    </div>
                    <div class="form-group">
                        <label for="logo">{{__('Upload logotype')}}</label>
                        <input type="file" name="logo" class="form-control-file" id="logo">
                    </div>
                    @csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success mr-1 w-100" data-dismiss="modal">{{__('Save')}}</button>
                        <button type="button" class="btn btn-light w-100" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="button" class="btn btn-danger  w-100 d-none" data-dismiss="modal">{{__('Delete')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection






