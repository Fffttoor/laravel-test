@extends('layouts.admin.app')

@section('page_name'){{__('Employees')}}@endsection

@section('page_content')
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="mb-5"><button type="button" class="btn btn-success">{{__('Create new employee')}}</button></div>

            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">{{__('Employees list')}}</h3>
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
                                <th>{{__('Name')}}</th>
                                <th>{{__('Last name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone number')}}</th>
                                <th>{{__('Company Name')}}</th>
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
@endsection


