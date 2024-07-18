$(document).ready(function () {
    $('.js-edit-company').on('click',function () {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/companies/'+id+'/edit',
            type: 'POST',
            data: {key:''},
            success: function(result) {
                if(result.view){
                    $('#companyFormEdit').find('.modal-body').html(result.view);
                    $('#companyFormEdit').modal('show');
                }
            },

        });
    });

    $('.js-edit-employee').on('click',function () {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/employees/'+id+'/edit',
            type: 'POST',
            data: {key:''},
            success: function(result) {
                if(result.view){
                    $('#employeeFormEdit').find('.modal-body').html(result.view);
                    $('#employeeFormEdit').modal('show');
                }
            },
        });
    });

    $('#companyForm').on('hidden.bs.modal',function () {
        $(this).find('form')[0].reset();
    });

    $('#companyFormEdit').on('hidden.bs.modal',function () {
        $(this).find('modal-body').html("");
    });

    $('#employeeForm').on('hidden.bs.modal',function () {
        $(this).find('form')[0].reset();
    });

    $('#employeeFormEdit').on('hidden.bs.modal',function () {
        $(this).find('modal-body').html("");
    });

    $('#companyFormEdit').on('click','.js-remove-preview',function () {
        let preview = $(this).closest('.js-logo-preview');
        preview.prev('.js-logo-upload').show();
        preview.find('img').attr('src', '');
        preview.find('span').text('');
        preview.hide();
    });
})
