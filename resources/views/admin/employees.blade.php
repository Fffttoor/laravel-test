@extends('layouts.admin.app')

@section('page_name'){{__('Employees')}}@endsection

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
            <!-- TABLE: LATEST ORDERS -->
            <div class="mb-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#employeeForm">{{__('Create new employee')}}</button></div>

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
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($employees as $employee){ ?>
                            <tr>
                                <td>{{$employee['name']}}</td>
                                <td>{{$employee['lastname']}}</td>
                                <td>{{$employee['email']}}</td>
                                <td>{{$employee['phone']}}</td>
                                <td>{{$companies_collection->where('id', $employee['company_id'])->pluck('name')->first()}}</td>
                                <td>
                                    <button type="button"  class="btn btn-sm btn-outline-info js-edit-employee" data-id="{{$employee['id']}}">{{__('Edit')}}</button>
                                    <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
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
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <div class="modal" id="employeeFormEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Employee Form')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="employeeForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Employee Form')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('employees.store')}}" class="mb-3" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">{{__('Lastname')}}</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="phone">{{__('Phone Number')}}</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="company_id">{{__('Company')}}</label>
                            <select class="form-control" id="company_id" name="company_id" required>
                                <option disabled selected>{{__('Select company')}}</option>
                                @foreach($companies as $company)
                                    <option value="{{$company['id']}}">{{$company['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success mr-1 w-100" >{{__('Save')}}</button>
                            <button type="button" class="btn btn-light w-100" data-dismiss="modal">{{__('Close')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


